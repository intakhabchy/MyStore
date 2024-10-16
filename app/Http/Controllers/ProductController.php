<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductCart;
use App\Models\ProductSlider;
use App\Models\ProductWishlist;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductList(){
        $data = Product::with(['brand','category'])->get();
        return ResponseHelper::ResMsg('status',$data,200);
    }

    public function ProductByCategory(Request $request){
        $categoryId = $request->id;
        $data = Product::where('category_id','=',$categoryId)->with(['brand','category'])->get();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function ProductByBrand(Request $request){
        $brandId = $request->id;
        $data = Product::where('brand_id','=',$brandId)->with(['brand','category'])->get();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function ProductDetailById(Request $request){
        $productId = $request->id;
        $data = Product::where('id','=',$productId)->with(['brand','category','product_detail']) ->get();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function ProductSlider(){
        $data = ProductSlider::all();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function AddProductToCart(Request $request){
        
        $userId = $request->header('id');
        $productId = $request->input('product_id');
        $size = $request->input('size');
        $color = $request->input('color');
        $qty = $request->input('qty');

        $unitPrice = 0;

        $productData = Product::where('id','=',$productId)->get();
        
        if($productData[0]['discount']==1){
            $unitPrice = $productData[0]['discount_price'];
        }
        else{
            $unitPrice = $productData[0]['price'];
        }

        $totalPrice = $qty*$unitPrice;

        $data = ProductCart::updateOrCreate(
            ['user_id'=>$userId,'product_id'=>$productId],
            [
                'user_id'=>$userId,
                'product_id'=>$productId,
                'qty'=>$qty,
                'size'=>$size,
                'color'=>$color,
                'price'=>$totalPrice
            ]
        );

        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function CartList(Request $request){
        $userId = $request->header('id');
        $data = ProductCart::where('user_id','=',$userId)->with('product')->get(); // with used to get data from product table
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function DeleteCartList(Request $request){
        $userId = $request->header('id');
        $productId = $request->product_id;
        $data = ProductCart::where('user_id','=',$userId)->where('product_id','=',$productId)->delete();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function CreateWishList(Request $request){
        $userId = $request->header('id');
        $data = ProductWishlist::updateOrCreate([
            'product_id'=>$request->product_id,
            'user_id'=>$userId
        ]);
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function ProductWishList(Request $request){
        $userId = $request->header('id');
        $data = ProductWishlist::where('user_id','=',$userId)->with('product')->get();
        return ResponseHelper::ResMsg('success',$data,200);
    }

    public function RemoveWishList(Request $request){
        $userId = $request->header('id');
        $data = ProductWishlist::where(['user_id'=>$userId,'product_id'=>$request->product_id])->delete();
        return ResponseHelper::ResMsg('success',$data,200);
    }
}
