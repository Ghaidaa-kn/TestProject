<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\DB;
use Illuminate\support\facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProduct;
use App\Models\Product;
use App\Models\RequestRegister;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('is_admin' , NULL)
                 ->orderBy('id' , 'asc')->paginate(5);
        return view('users' , compact('users'));
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
    public function store($id)
    {
        $req = RequestRegister::find($id);
        if($req->email){
            $is_exist = User::where('email' , $req->email)->get()->first();
            if(!empty($is_exist)){
                return redirect()->back()->withErrors(['error' => 'Email already exist !']);
            }
        }
        if($req->phone){
            $is_exist = User::where('phone' , $req->phone)->get()->first();
            if(!empty($is_exist)){
                return redirect()->back()->withErrors(['error' => 'Phone already exist !']);
            }
        }
        $user = new User();
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email? $req->email : null;
        $user->phone = $req->phone? $req->phone : null;
        $user->password = $req->password;
        $user->is_admin = null;
        $user->save();
        RequestRegister::destroy($id);
        return redirect('/users_requests');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user_profile' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id' , $id)->get()->first();
        $query = DB::table('products')
                     ->join('user_product','products.id','user_product.product_id')
                     ->where('user_product.user_id' , $id)
                     ->select('products.id');
        $can_assign = Product::whereNotIn('id' , $query)
                      ->orderBy('products.id' , 'asc')
                      ->get();
        return view('user' , compact('user' , 'can_assign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $this->validate($req,[
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        DB::update('update users set first_name = ? , last_name = ? , email = ? , phone = ? where id = ?',[$req->first_name ,$req->last_name ,$req->email ,
            $req->phone ,$id]);

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $related = DB::table('users')->join('user_product' , 'users.id',
                   'user_product.user_id')->select('user_product.id')
                    ->where('user_product.user_id' , $id)->get();
        foreach ($related as $one) {
            UserProduct::destroy($one->id);
        }
        User::destroy($id);
        return redirect('/users');
    }

    public function login(Request $req , $type){

        $user = ($type == 'email')? User::where('email' , $req->email)->first() : 
                                    User::where('phone' , $req->phone)->first();
        if( !$user || !Hash::check($req->password , $user->password)){
            if($type == 'email'){
              return redirect('/email_login')->with('error','somethig error , please check!');
            }else{
             return redirect('/phone_login')->with('error','somethig error , please check!');
            }
        }elseif($user->email == 'admin@gmail.com' && Hash::check($req->password ,
         $user->password)) {
            $req->session()->put('user' , $user);
            $req->session()->put('role' , 'admin');
            return redirect('/products');
        }else{
            $req->session()->put('user' , $user);
            $req->session()->put('role' , 'user');
            return redirect('/user_app/'.$user->id);
        }
    }

    public function change_password(Request $req){
        $old = Session::get('user')['password'];
        $id = Session::get('user')['id'];
        if(Hash::check($req->old , $old)){
            if($req->new == $req->new_check){
                DB::update('update users set password = ? where id = ?',
                [Hash::make($req->new) ,$id]);
                return redirect('/user_app/'.$id);
            }else{
                return redirect()->back()->withErrors(['error' => 'No match between new passwords']);
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Old Password isn\'t correct']);
        }

    }

    public function api_store($id)
    {
        $req = RequestRegister::find($id);
        if($req->email){
            $is_exist = User::where('email' , $req->email)->get()->first();
            if(!empty($is_exist)){
                return redirect()->back()->withErrors(['error' => 'Email already exist !']);
            }
        }
        if($req->phone){
            $is_exist = User::where('phone' , $req->phone)->get()->first();
            if(!empty($is_exist)){
                return redirect()->back()->withErrors(['error' => 'Phone already exist !']);
            }
        }
        $user = new User();
        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email? $req->email : null;
        $user->phone = $req->phone? $req->phone : null;
        $user->password = $req->password;
        $user->is_admin = null;
        $user->save();
        RequestRegister::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'added to users'
        ]);
    }

    public function api_login(Request $req , $type){

        $user = ($type == 'email')? User::where('email' , $req->email)->first() : 
                                    User::where('phone' , $req->phone)->first();
        if( !$user || !Hash::check($req->password , $user->password)){
            if($type == 'email'){
              return redirect('/email_login')->with('error','somethig error , please check!');
            }else{
             return redirect('/phone_login')->with('error','somethig error , please check!');
            }
        }elseif($user->email == 'admin@gmail.com' && Hash::check($req->password ,
         $user->password)) {
            return response()->json([
            'status' => 200,
            'message' => 'Logged in successfully . Admin account',
            'data' => $user
            ]);
        }else{
            return response()->json([
            'status' => 200,
            'message' => 'Logged in successfully . User account',
            'data' => $user
            ]);
        }
    }

    public function api_edit($id)
    {
        $user = User::where('id' , $id)->get()->first();
        if(!empty($user)){
            return response()->json([
                'status' => 200,
                'data' => $user
            ]);
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'Not found'
            ]);
        }
    }

    public function api_update(Request $req, $id)
    {
        $this->validate($req,[
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        DB::update('update users set first_name = ? , last_name = ? , email = ? , phone = ? where id = ?',[$req->first_name ,$req->last_name ,$req->email ,
            $req->phone ,$id]);

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully'
        ]);
    }

    public function api_change_password(Request $req , $id){
        // $old = Session::get('user')['password'];
        // $id = Session::get('user')['id'];
        $user = User::find($id);
        if(Hash::check($req->old , $user->password)){
            if($req->new == $req->new_check){
                DB::update('update users set password = ? where id = ?',
                [Hash::make($req->new) ,$id]);
                return response()->json([
                    'status' => 200,
                    'message' => 'password updated successfully'
                ]);
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => 'No match between new password and check it'
                ]);
            }
        }else{
            return response()->json([
                    'status' => 400,
                    'message' => 'Error in Old password'
                ]);
        }

    }


    public function api_destroy($id)
    {
        $user = User::find($id);
        if(!empty($user)){
           $related = DB::table('users')->join('user_product' , 'users.id',
                   'user_product.user_id')->select('user_product.id')
                    ->where('user_product.user_id' , $id)->get();
            foreach ($related as $one) {
                UserProduct::destroy($one->id);
            }
            User::destroy($id);
            return response()->json([
                'status' => 200,
                'message' => 'User delete successfully'
            ]); 
        }else{
            return response()->json([
                'status' => 400,
                'message' => 'User not found'
            ]); 
        }
        
    }
}
