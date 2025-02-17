<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function ProductByBrandPage(){
        return view('pages.product-by-brand');
    }

    public function BrandList(){
        $data = Brand::all(); 
        return ResponseHelper::ResMsg('success',$data,200);
    }
}
