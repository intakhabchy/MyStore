<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductList(){
        $data = Product::with(['brand','category'])->get();
        return ResponseHelper::ResMsg('status',$data,200);
    }
}
