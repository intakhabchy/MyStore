<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ProductByCaegoryPage(){
        return view('pages.product-by-category');
    }
    
    public function CategoryList(){
        $data = Category::all();
        return ResponseHelper::ResMsg('success',$data,200);
    }
}
