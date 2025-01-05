<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function Policy(){
        return view('pages.policy-page');
    }

    public function PolicyByType(Request $request){
        $type = $request->type;
        $data = Policy::where('type','=',$type)->get();
        return ResponseHelper::ResMsg('success',$data,200);
    }
}
