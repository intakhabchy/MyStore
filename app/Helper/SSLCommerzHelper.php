<?php

namespace App\Helper;

use App\Models\Sslcommerz;
use Illuminate\Support\Facades\Http;

class SSLCommerzHelper{

    public static function InitiatePayment($profile,$payable,$tran_id,$user_email){
        $ssl = Sslcommerz::first();

        $response = Http::asForm()->post($ssl->init_url,[
            'store_id'=>$ssl->store_id,
            'store_passwd'=>$ssl->store_password,
            'total_amount'=>$payable,
            'currency'=>$ssl->currency,
            'tran_id'=>$tran_id,
            'success_url'=>"$ssl->success_url?tran_id=$tran_id",
            'fail_url'=>"$ssl->fail_url?tran_id=$tran_id",
            'cancel_url'=>"$ssl->cancel_url?tran_id=$tran_id",
            'ipn_url'=>$ssl->ipn_url,
            'cus_name'=>$profile->customer_name,
            'cus_email'=>$user_email,
            'cus_add1'=>$profile->customer_address,
            'cus_add2'=>$profile->customer_phone,
            'cus_city'=>"Dhaka",
            'cus_state'=>"Dhaka",
            'cus_postcode'=>"4000",
            'customer_country'=>"Bangladesh",
            'customer_phone'=>$profile->customer_phone,
            'customer_fax'=>$profile->customer_phone,
            'shipping_method'=>"YES",
            'ship_name'=>$profile->customer_name,
            'ship_add1'=>$profile->shipping_address,
            'ship_add2'=>$profile->shipping_address,
            'ship_city'=>"Dhaka",
            'ship_state'=>"Dhaka",
            'ship_country'=>"Bangladesh",
            "ship_postcode"=>"4000",
            'product_name'=>"My Store Product",
            'product_category'=>"My Store Category",
            'product_profile'=>"My Store Profile",
            'product_amount'=>$payable
        ]);
        return $response->json('desc');
    }
}