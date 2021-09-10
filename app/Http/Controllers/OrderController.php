<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Customer;
class OrderController extends Controller
{
    //
    public function index(Request $request){

        if ($request->session()->has('id') && $request->session()->has('customer') ){

        $product = Product::All()->where('id',request('id'))->first();

        return view('order.singleOrder', compact('product') );

        }else{

            return redirect('/login');
        }
    }

    public function store(Request $request   ){



        // $cartorder = Cart::where('product_id', $request->product_id)->first();

        // $cartorder->ordered = 1;

        // $cartorder->save();





        $validatedData = $request->validate([
            'quantities' => 'required',
            'phone' => 'required',
             'country' => 'required',
             'city' => 'required',
             'street' => 'required'


        ]);

        if ($request->session()->has('id') && $request->session()->has('customer') ){
            $cart = new cart();

            $validatedData = $request->validate([

                'quantities' => 'required'
           ]);

            $cart->product_id = $request->id;
            $cart->customer_id = $request->session()->get('id');
            $cart->c_quantity =  $request->quantities;
            $cart->ordered = 1;
            $product = Product::All()->where('id', request('id'))->first();




            $cart->total =  $request->quantity *  $product->prodprice;





                $cart->save();



            $order = new order();

            $order->quantities = $request->quantities;

            $order->phone = $request->phone;

            $order->country = $request->country;

            $order->city = $request->country;

            $order->street = $request->country;

            $order->product_id = $request->product_id;

            $order->customer_id = $request->session()->get('id');




            $order->save();


            $product = Product::All()->where('id',$request->product_id)->first();

            if ( $product->quantity >=  $request->quantities ){

                $product->quantity = $product->quantity - $request->quantities;

                    $product->save();

                    return back()->with('order_added','Order has successfully Sent');

            }else{

                return back()->with('reject','Sorry your amount is not Availble');
            }
            }else{

                return redirect('/login');

            }










// return back()->with('order_added','Order has successfully Sent');







    }
    public function orderCart(Request $request   ){

        // $cartItem = Cart::all()->where('customer_id',$request->session()->get('id'));

        // // foreach($cartItem as $item){

        // //     return $item;
        // // }

        // return  $cartItem;

     return view('order.order');


    }


    public function makeOrder(Request $request) {






        //  return $products;


        $order = new order();

        $validatedData = $request->validate([

            // 'quantities' => 'required'

       ]);

        $order->quantities = 1;
        $order->country = $request->country;
        $order->city =  $request->city;
        $order->street = $request->street;
        $order->phone = $request->phone;
        $order->customer_id = $request->session()->get('id');

 $order->save();

//  $request->session()->put('order', $order->id);


 $products = DB::table('products')

        ->join('carts','products.id','=','carts.product_id')

        ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity' , 'carts.c_quantity' ,'carts.id' ,'carts.total' )

        ->where('carts.customer_id','=', $request->session()->get('id'))

        ->where('carts.ordered','=', 0)


        ->get();

          foreach ($products  as $product){

            DB::table('carts')

            ->where('carts.customer_id','=', $request->session()->get('id'))

            ->where('carts.ordered','=', 0)

                    ->update(['carts.ordered' => 1 ,'carts.order_id' => $order->id  ]);
        }




        return redirect(url('myorder'));

    }


    public function customerorders($id){

        $products = DB::table('products')

        ->join('carts','products.id','=','carts.product_id')

        ->select('carts.customer_id','products.prodname','products.prodpicture','products.prodprice','products.quantity' , 'carts.c_quantity' ,'carts.id' ,'carts.total' )



        ->where('carts.order_id','=', $id)


        ->get();


// return $products;






$order = Order::where('id',$id)->first();

// return $order;
$customer = Customer::where('id',  $order->customer_id )->first();

// return $customer;


        return view('order.customerOrders', compact('products' , 'order' , 'customer'   ));
    }




    public function myorder(Request $request){

        if ($request->session()->has('id') && $request->session()->has('customer') ){
        $order = Order::All()->where('customer_id',$request->session()->get('id') ) ;

// return $order;


  $onDeliveryOrder = Order::All()->where('customer_id',$request->session()->get('id') )->where('finished',0);
  $finishedOrder = Order::All()->where('customer_id',$request->session()->get('id') )->where('finished',1);


  $onDeliveryOrderCount = $onDeliveryOrder->count();

  $finishedOrderCount = $finishedOrder->count();

        return view('customers.myorders', compact(   'order' , 'onDeliveryOrderCount' ,'finishedOrderCount'    )  );
    }else{

        return redirect('login');
    }


    }

}
