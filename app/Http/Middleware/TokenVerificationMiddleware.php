<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // $token = $request->header('token');
        $token = $request->cookie('token');
        Log::info('Received Token in Middleware:', ['token' => $token]);
        DB::insert('INSERT INTO token_log_middleware (token,date_time) VALUES (?,?)', [$token,date('Y-m-d H:i:s')]);

        $result = JWTToken::VerifyToken($token);

        if($result == "unauthorized"){
            return response()->json(['status'=>'failed','message'=>'unauthorized'],401);
        }
        else{
            $request->headers->set('id',$result->id);
            $request->headers->set('email',$result->userEmail);

            return $next($request);
        }
    }
}
