<?php

namespace App\Http\Middleware;

use App\Helper\JWTTOKEN;
use Closure;
use Illuminate\Http\Request;
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
        $token=$request->cookie('tuktukToken');
        $result= JWTTOKEN::VarifyToken($token);

        if($result=="unauthorized"){
        return response()->json([
            'status'=>'Failed',
            'Message'=>'Unauthorized'
        ]);

        }
        else{
            $request->headers->set('email',$result);
            return $next($request);

        }
       

    }
}
