<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class myorders extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , Request $request)
    {
        //
        $products = DB::table('products')

        ->join('carts','products.id','=','carts.product_id')

        ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity' , 'carts.c_quantity' ,'carts.id' ,'carts.total' )



        ->where('carts.order_id','=', $id)


        ->get();

        $total = DB::table('orders')

        ->join('carts','orders.id','=','carts.order_id')

        // ->where('carts.customer_id','=', $request->session()->get('id'))

        ->where('orders.id','=', $id)

        ->sum('total');

       

        return view('customers.singleorder' , compact('products' , 'total'));
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

        DB::table('orders')->where('id',$id)->delete();
        return back()->with('product_added','Product has been deleted successfully');
    }





}
