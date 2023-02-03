<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\UserProduct;

class UserProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = DB::table('users')
                     ->join('user_product','users.id','user_product.user_id')
                     ->whereNull('users.is_admin')
                     ->select('user_product.user_id');
        $users = User::whereIn('id' , $query)
                      ->orderBy('users.id' , 'asc')
                      ->paginate(4);
        return view('users_products' , compact('users'));
    }

    public function getUserProducts($id){
        $user = User::find($id);
        $products = Product::join('user_product' , 'products.id' , 'user_product.product_id')
                    ->where('user_product.user_id' , $id)
                    ->select('products.*')
                    ->orderBy('products.id' , 'asc')
                    ->paginate(2);
        return view('user_products' , compact('user','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
        $products_ids = $request->products;
        foreach ($products_ids as $product_id) {
            $user_product = new UserProduct();
            $user_product->product_id = $product_id;
            $user_product->user_id = $id;
            $user_product->save();
        }
        return redirect('/edit_user/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function api_getUserProducts($id){
        $user = User::find($id);
        $products = Product::join('user_product' , 'products.id' , 'user_product.product_id')
                    ->where('user_product.user_id' , $id)
                    ->select('products.*')
                    ->orderBy('products.id' , 'asc')
                    ->paginate(2);
        if(!empty($products)){
            return response()->json([
                'status' => 200,
                'data' => $products
            ]);
        }elseif(empty($products)){
            return response()->json([
                'status' => 200,
                'message' => 'Empty until now.'
            ]);
        }elseif(empty($user)){
            return response()->json([
                'status' => 400,
                'message' => 'User Not Found'
            ]);
        }
        
    }


    public function api_store(Request $request , $id)
    {
        $user = User::find($id);
        if(!empty($user)){
            $products_ids = $request->products;
            foreach ($products_ids as $product_id) {
                    $user_product = new UserProduct();
                    $user_product->product_id = $product_id;
                    $user_product->user_id = $id;
                    $user_product->save();
             }
             return response()->json([
                'status' => 200,
                'message' => 'Assign Products to User'
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'User Not Found'
            ]);
        }
    }
}
