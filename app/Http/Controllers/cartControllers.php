<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;

use Illuminate\Support\Facades\DB;

use App\Models\Customer;
use App\Models\Product;

class cartControllers extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


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
        //





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

        $c_product = Cart::find($id);

        $c_product ->c_quantity = $request->quantity;

 $product = Product::All()->where('id',$c_product->product_id)->first();

 $c_product->total =  $request->quantity *  $product->prodprice;


        $c_product ->save();



        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        DB::table('carts')->where('id',$id  )->delete();
        return back()->with('product_added','Product has been deleted successfully');

    }




    public function addtocart(Request $request , $id){

        // $customer = Customer::find($request->session()->get('id'));
        if ($request->session()->has('id') && $request->session()->has('customer') ){



        $cart = new cart();

        $validatedData = $request->validate([

            'quantity' => 'required'
       ]);

        $cart->product_id = $request->id;

        $cart->customer_id = $request->session()->get('id');




        $cart->c_quantity =  $request->quantity;

        $product = Product::All()->where('id',$request->id)->first();

        $cart->total =  $request->quantity *  $product->prodprice;





            $cart->save();

        }else{

            return redirect('/login');

        }






        // $quantity = Product::find($id)->quantity;





        return redirect('cartPage');
    }

    // public function  cartPage(Request $request){

    //     $products = cart::All()->where('customer_id',$request->session()->get('id'));



    //   }
    // public function  cartPage(Request $request){

    //     $products = DB::table('admins')

    //         ->join('products','admins.id','=','products.admin_id')

    //         ->select('admins.name','products.prodname','products.prodpicture','products.prodprice')

    //         ->get();

    //     return  $products;
    // }
      public function  cartPage(Request $request){

        $products = DB::table('products')

            ->join('carts','products.id','=','carts.product_id')

            ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity' , 'carts.c_quantity' ,'carts.id' ,'carts.total' )

            ->where('carts.customer_id','=', $request->session()->get('id'))

            ->where('carts.ordered','=', 0)


            ->get();

            // $count = $products->count();

            // session()->put('cart', $count);

        // return $products;

        // $balance = DB::table('products')->where('id', 35)->sum('prodprice');


        $total = DB::table('products')

        ->join('carts','products.id','=','carts.product_id')

        ->where('carts.customer_id','=', $request->session()->get('id'))

        ->where('carts.ordered','=', 0)

        ->sum('total');





if ($request->session()->has('id') && $request->session()->has('customer') ){

          return view('cart.cart',['products' => $products, 'total' =>  $total  ]);

    } else {

         return redirect('/login');
    }
}









}
