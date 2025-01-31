<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\DB;

class JWTToken{
    public static function CreateToken($userEmail,$id){
        $key = env('JWT_KEY');

        $payload = [
            'iss'=>'mystore_token',
            'iat'=>time(),
            'exp'=>time()+(60*60),
            'userEmail'=>$userEmail,
            'id'=>$id
        ];

        return JWT::encode($payload,$key,'HS256');
    }

    public static function VerifyToken($token){

        try{
            $key = env('JWT_KEY');

            DB::insert('INSERT INTO token_log_helper (token,date_time) VALUES (?,?)', [$token,date('Y-m-d H:i:s')]);
            
            $decode = JWT::decode($token, new Key($key,'HS256'));
    
            return $decode;
        }
        catch(Exception $e){
            return 'unauthorized';
        }        
    }
}