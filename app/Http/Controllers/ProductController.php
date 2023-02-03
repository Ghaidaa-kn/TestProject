<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id' , 'asc')->paginate(5);
        return view('products' , compact('products'));
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
    public function store(Request $req)
    {
        $this->validate($req,[
            'product_name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'product' . '_' . time() .'.'. $ext;
            $file->storeAs('public/img' , $filename);     
        }

        $product = new Product();
        $product->product_name = $req->product_name;
        $product->description = $req->description;
        $product->image = $filename;
        $product->save();
        return redirect('/add_product_view');
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
        $product = Product::where('id' , $id)->get()->first();
        return view('product' , compact('product'));
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
        $related = DB::table('products')->join('user_product' , 'products.id',
                   'user_product.product_id')->select('user_product.id')
                    ->where('user_product.product_id' , $id)->get();
        foreach ($related as $one) {
            UserProduct::destroy($one->id);
        }
        $p = Product::find($id);
        unlink(public_path().'/storage/img/'.$p->image);
        Product::destroy($id);
        return redirect('/products');
    }



    public function api_store(Request $req)
    {
        $this->validate($req,[
            'product_name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if($req->hasFile('image')){
            $file = $req->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'product' . '_' . time() .'.'. $ext;
            $file->storeAs('public/img' , $filename);     
        }

        $product = new Product();
        $product->product_name = $req->product_name;
        $product->description = $req->description;
        $product->image = $filename;
        $product->save();
        return response()->json([
            'status' => 200,
            'message' => 'Product added successfully'
        ]);
    }

    public function api_destroy($id)
    {
        $product = Product::find($id);
        if(!empty($product)){
            $related = DB::table('products')->join('user_product' , 'products.id',
                   'user_product.product_id')->select('user_product.id')
                    ->where('user_product.product_id' , $id)->get();
            foreach ($related as $one) {
                UserProduct::destroy($one->id);
            }
            $p = Product::find($id);
            unlink(public_path().'/storage/img/'.$p->image);
            Product::destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'Product removed successfully'
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Product not found'
            ]);
        }
        
    }

    public function api_edit($id)
    {
        $product = Product::where('id' , $id)->get()->first();
        if(!empty($product)){
            return response()->json([
                'status' => 200,
                'data' => $product
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Not found'
            ]);
        }
        
    }

    public function api_index()
    {
        $products = Product::orderBy('id' , 'asc')->paginate(5);
        return response()->json([
            'status' => 200,
            'data' => $products
        ]);
    }
}
