<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Laravue\JsonResponse;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\JsonResponse as HttpJsonResponse;

class AuthController extends Controller
{
    //
    // public function login(Request $req)
    // {
    //     $credentials = $req->only('email', 'password');
    //     if(Auth::attempt($credentials))
    //     {
    //         return response()->json([
    //             "success"=>true,
    //             "data"=> new UserResource($req->user()),
    //             "error"=>""
    //         ]);
    //     }
    //     else {
    //         return response()->json(["data"=>"Not Login"]);
    //     }
    // }
}
