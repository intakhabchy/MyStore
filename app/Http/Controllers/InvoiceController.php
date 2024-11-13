<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Helper\SSLCommerzHelper;
use App\Models\CustomerProfile;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\ProductCart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    function InvoiceCreate(Request $request){
        DB::beginTransaction();

        try{
            $user_id = $request->header('id');
            $user_email = $request->header('email');

            $tran_id = uniqid();
            $delivery_status = "Pending";
            $payment_status = "Pending";

            $profile = CustomerProfile::where('user_id','=',$user_id)->first();
            $customer_details = "Name: ".$profile->customer_name.", Address: ".$profile->customer_address.", Phone: ".$profile->customer_phone;
            $ship_details = "Name: ".$profile->customer_name.", Address: ".$profile->shipping_address.", Phone: ".$profile->shipping_phone;

            // Payable Amount
            $total = 0;
            $cartList = ProductCart::where('user_id','=',$user_id)->get();

            foreach($cartList as $cl){
                $price = $cl->price;
                $qty = $cl->qty;

                $qtyPrice = $qty*$price;

                $total += $total + $qtyPrice;
            }

            $vat = ($total*5)/100;

            $payable = $total+$vat;

            $invoice = Invoice::create([
                'total'=>$total,
                'vat'=>$vat,
                'payable'=>$payable,
                'customer_details'=>$customer_details,
                'ship_details'=>$ship_details,
                'tran_id'=>$tran_id,
                'delivery_status'=>$delivery_status,
                'payment_status'=>$payment_status,
                'user_id'=>$user_id
            ]);

            $invoiceId = $invoice->id;

            foreach($cartList as $cl){
                InvoiceDetail::create([
                    'invoice'=>$invoiceId,
                    'product_id'=>$cl->product_id,
                    'user_id'=>$user_id,
                    'qty'=>$cl->qty,
                    'sale_price'=>$cl->price
                ]);
            }

            // start from 10:10, first try with post for testing the code above
            $paymentMethod = SSLCommerzHelper::InitiatePayment($profile,$payable,$tran_id,$user_email);

            DB::commit();

            return ResponseHelper::ResMsg('success',['paymentMethod'=>$paymentMethod,'payable'=>$payable,'vat'=>$vat,'total'=>$total],200);

            // start from 18:00
        }
        catch(Exception $e){
            DB::rollBack();
            return ResponseHelper::ResMsg('fail',$e,200);
        }
    }
}
