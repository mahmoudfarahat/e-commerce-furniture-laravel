<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;
class customerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customers.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate($request,[
            "name"     => "required|min:3",
            "email"    => "required|email",
            "password" => "required|min:5|max:10"
         ]) ;

        $data['password'] = bcrypt($data['password']);

        $op =   Customer::create($data);

        $message = "Error Try Again";

        if($op){
            $message = "Data Inserted";


        }


        session()->flash('message',$message);

        return redirect(url('/'));
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

    public function login(){
        return view('customers.login');
    }
    public function customerloginlogic(Request $request){
        // code

         $data = $this->validate($request,[

             'email'    => 'required|email',
             'password' => 'required|min:6'
         ]);

     // true || false

        $remember = false;

         if($request->rememberMe){
             $remember = true;
         }



           if(auth()->guard('customers')->attempt($data,$remember)){

             $userdata = Customer::All()->where('email',$request->email)->first();

             $request->session()->put('id', $userdata->id);

             session()->put('customer', 'customer');

            //  $products = DB::table('products')

            //  ->join('carts','products.id','=','carts.product_id')

            //  ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity')

            //  ->where('carts.customer_id','=', $request->session()->get('id'))

            //  ->get();

            //  $count = $products->count();

            //  session()->put('cart', $count);

               return redirect('/customer');

           }else{
               return redirect('/login');
           }


      }

 public function  logout(Request $request){


    $request->session()->flush();
    auth()->guard('customers')->logout();





    return redirect('/login');
 }



}
