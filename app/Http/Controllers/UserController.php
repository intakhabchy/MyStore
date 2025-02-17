<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function LoginPage(){
        return view('pages.login-page');
    }

    public function RegistrationPage(){
        return view('pages.registration-page');
    }
    
    public function UserRegistration(Request $request){
        try{
            $user = User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>$request->input('password')
            ]);
    
            $userId = $user->id;
    
            $customerProfile = CustomerProfile::create([
                'user_id'=>$userId,
                'customer_name'=>$request->input('name'),
                'gender'=>$request->input('gender'),
                'customer_address'=>$request->input('customer_address'),
                'customer_phone'=>$request->input('customer_phone'),
                'shipping_address'=>$request->input('shipping_address'),
                'shipping_phone'=>$request->input('shipping_phone'),
                'date_of_birth'=>$request->input('date_of_birth'),
            ]);

            $data = ['name'=>$request->input('name'),'email'=>$request->input('email')];

            return ResponseHelper::ResMsg("Success",$data,201);
        }
        catch(Exception $e){
            $data = ['name'=>"",'email'=>""];
            return ResponseHelper::ResMsg($e->getMessage(),$data,400);
        }
    }

    public function UserLogin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email','=',$email)->get();

        if(count($user)>0){
            if(Hash::check($request->input('password'),$user[0]['password'])){
                $token = JWTToken::CreateToken($email,$user[0]['id']);

                DB::insert('INSERT INTO token_log_controller (token,date_time) VALUES (?,?)', [$token,date('Y-m-d H:i:s')]);

                return response()->json([
                    'status'=>'successs',
                    'message'=>'User Login Successful',
                    'token'=>$token
                ],200)->cookie('token', $token, 60);
            }
            else{
                return response()->json(['status'=>'failed','message'=>'Login Failed'],400);
            }
        }
        else{
            return response()->json(['status'=>'unauthorized','message'=>'Unauthorized Email'],400);
        }
    }

    public function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }

    public function UserProfile(){
        return view('pages.profile-page');
    }
}
