<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request )
    {

// if (  auth()  ){
//     $products = DB::table('products')

//     ->join('carts','products.id','=','carts.product_id')

//     ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity')

//     ->where('carts.customer_id','=',$request->session()->get('id') )

//     ->get();

//     $count = $products->count();

//     view()->share('count', $count);



// }






    }



}
