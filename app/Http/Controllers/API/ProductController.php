<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Product;
use App\ProductType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ProductResource::withoutWrapping();
        return response()->json(new JsonResponse([
            "Product"=> ProductResource::collection(Product::all()),
        ]));
    }
    //controller
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->ValidData($request))
        {
                if($request->type_id == 1)
                Product::create([
                    "type_id" =>1,
                    "store_id" => $request->store_id,
                    "product_name" => $request->product_name,
                    "desc" => $request->desc,
                    "price" => $request->price,
                    "made_in" => $request->made_in,
                    "sugar_percent" => $request->sugar_percent
                ]);
                else if($request->type_id == 2) {
                    Product::create([
                        "type_id" =>2,
                        "store_id" => $request->store_id,
                        "product_name" => $request->product_name,
                        "desc" => $request->desc,
                        "price" => $request->price,
                        "made_in" => $request->made_in,
                        "material" => $request->material
                    ]);
                }
                return response()->json(["message"=>"Create Successfully"])->status(200);
        }
        return response()->json(["message"=>"Create Faild"])->status(501);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        ProductResource::withoutWrapping();
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($this->ValidData($request))
        {
            $product->product_name = $request->product_name;
            $product->desc = $request->desc;
            $product->price = $request->price;
            $product->made_in = $request->made_in;
            if($product->type_id==1)
            {
                $product->sugar_percent = $request->sugar_percent;
            }
            else $product->material = $request->material;
            if($product->save()) return response()->json(["message"=>"Update successfullt product ".$product->product_name])->status(200);
            else response()->json(["message"=>"Update Error"])->status(501);
        } else response()->json(["message"=>"Invalid Data"])->status(501);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete())
        return response()->json(["message"=>"delete successfully the product has name ".$product->product_name]);
        else return response()->json(["message"=>"delete error"])->status(501);
    }

    public function GetByType($type)
    {
        ProductResource::withoutWrapping();
        return response()->json(new JsonResponse([
            ProductResource::collection(Product::all()->where('type_id',$type))
        ]));
    }

    private function ValidData(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'type_id' => 'required|regex:/^[0-9 ]+$/',
            'store_id' => 'required|regex:/^[0-9 ]+$/',
            "product_name" => 'string|required|max:255',
            "desc" => 'string|required|max:1000',
            "price" => 'required',
            "made_in" => 'required|max:255',
            "sugar_percent" => 'regex:/^[0-9 ]+$/',
            "material" => 'string|max:255'
        ]);
        if($validator->fails())
        {
            return true;
        }
        else return false;
    }
}
