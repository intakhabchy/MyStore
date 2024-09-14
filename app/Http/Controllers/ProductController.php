<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use App\Models\ProductSlider;
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
}
