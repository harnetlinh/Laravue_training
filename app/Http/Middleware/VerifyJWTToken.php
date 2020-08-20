<?php
namespace App\Http\Middleware;
use Closure;
use Exception;
use JWTAuth;
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
            $user =  JWTAuth::parseToken()->authenticate();
            error_log($user); 
        } catch (Exception $e)  {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['status' => 'Invalid Token']);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return response()->json(['status' => 'Token is Expired']);
            }else{
                return response()->json(['status' => 'No Token']);
             }
        }
        $request->merge(["user"=>$user]);
        return $next($request);
    }
}
