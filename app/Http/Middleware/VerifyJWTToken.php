<?php
namespace App\Http\Middleware;
use Closure;
use JWTAuth;
use JWT;
use JWTException;
class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
            //error_log($user); 
        } catch (\Throwable $th)  {
            if ($th instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Token is Invalid']);
            }else if ($th instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'Authorization Token not found']);
             }
        }
        return $next($request);
    }
}
