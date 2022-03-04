<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(Request $request)
    {

        if ($request->session()->has('id') && $request->session()->has('customer')) {

            $product = Product::All()->where('id', request('id'))->first();

            return view('order.singleOrder', compact('product'));

        } else {

            return redirect('/login');
        }
    }

    public function store(Request $request)
    {

        // $cartorder = Cart::where('product_id', $request->product_id)->first();

        // $cartorder->ordered = 1;

        // $cartorder->save();

        $validatedData = $request->validate([
            'quantities' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',

        ]);

        if ($request->session()->has('id') && $request->session()->has('customer')) {
            $cart = new cart();

            $validatedData = $request->validate([

                'quantities' => 'required',
            ]);

            $cart->product_id = $request->id;
            $cart->customer_id = $request->session()->get('id');
            $cart->c_quantity = $request->quantities;
            $cart->ordered = 1;

            $product = Product::All()->where('id', request('id'))->first();

            $cart->total = $request->quantities * $product->prodprice;

            $order = new order();

            $order->quantities = $request->quantities;

            $order->phone = $request->phone;

            $order->country = $request->country;

            $order->city = $request->country;

            $order->street = $request->country;

            return 5;

            $order->customer_id = $request->session()->get('id');

            $order->save();

            $cart->order_id = $order->id;

            $cart->save();
            $product = Product::All()->where('id', $request->product_id)->first();

            if ($product->quantity >= $request->quantities) {

                $product->quantity = $product->quantity - $request->quantities;

                $product->save();

                return back()->with('order_added', 'Order has successfully Sent');

            } else {

                return back()->with('reject', 'Sorry your amount is not Availble');
            }
        } else {

            return redirect('/login');

        }

// return back()->with('order_added','Order has successfully Sent');

    }
    public function orderCart(Request $request)
    {

        // $cartItem = Cart::all()->where('customer_id',$request->session()->get('id'));

        // // foreach($cartItem as $item){

        // //     return $item;
        // // }

        // return  $cartItem;

        return view('order.order');

    }

    public function makeOrder(Request $request)
    {

        // return $request->delivery;

        //  return $products;

        $order = new order();

        $validatedData = $request->validate([

            // 'quantities' => 'required'

        ]);

        $order->quantities = 1;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->street = $request->street;
        $order->phone = $request->phone;
        $order->status = 'Bending';
        $order->customer_id = $request->session()->get('id');
        $order->payment = $request->payment;
        $order->delivery = $request->delivery;

        $order->total = DB::table('products')

            ->join('carts', 'products.id', '=', 'carts.product_id')

            ->where('carts.customer_id', '=', $request->session()->get('id'))

            ->where('carts.order_id', '=', $order->id)

            ->sum('total');

        $order->save();

//  $request->session()->put('order', $order->id);

        $products = DB::table('products')

            ->join('carts', 'products.id', '=', 'carts.product_id')

            ->select('carts.customer_id', 'products.prodname', 'products.prodpicture', 'products.prodprice', 'products.quantity', 'carts.c_quantity', 'carts.id', 'carts.total')

            ->where('carts.customer_id', '=', $request->session()->get('id'))

            ->where('carts.ordered', '=', 0)

            ->get();

        foreach ($products as $product) {

            DB::table('carts')

                ->where('carts.customer_id', '=', $request->session()->get('id'))

                ->where('carts.ordered', '=', 0)

                ->update(['carts.ordered' => 1, 'carts.order_id' => $order->id]);
        }

        return redirect(url('myorder'));

    }

    public function customerorders($id, Request $request)
    {

        if ($request->session()->has('id') && $request->session()->has('admin')) {

            $products = DB::table('products')

                ->join('carts', 'products.id', '=', 'carts.product_id')

                ->select('carts.customer_id', 'products.prodname', 'products.prodpicture', 'products.prodprice', 'products.quantity', 'carts.c_quantity', 'carts.id', 'carts.total')

                ->where('carts.order_id', '=', $id)

                ->get();

// return $products;

// $order = Cart::where('order_id',$id)->first();

// return $total;

            $order = Order::where('id', $id)->first();

// return $order;
            $customer = Customer::where('id', $order->customer_id)->first();

// return $customer;

            return view('order.customerOrders', compact('products', 'order', 'customer'));
        } else {
            return redirect('adminlogin');
        }
    }

    public function myorder(Request $request)
    {

        if ($request->session()->has('id') && $request->session()->has('customer')) {
            $order = Order::All()->where('customer_id', $request->session()->get('id'))->where('status', "Bending");

            $onDeliveryOrder = Order::All()->where('customer_id', $request->session()->get('id'))->where('status', 'On Delivery');

            $finishedOrder = Order::All()->where('customer_id', $request->session()->get('id'))->where('status', "Done");

            $canceled = Order::All()->where('customer_id', $request->session()->get('id'))->where('status', "canceled");

            $onDeliveryOrderCount = $onDeliveryOrder->count();

            $finishedOrderCount = $finishedOrder->count();

            $canceledcount = $canceled->count();

            $onProcesscount = $order->count();

//   $total = DB::table('orders')

//   ->join('carts','orders.id','=','carts.order_id')

//   // ->where('carts.customer_id','=', $request->session()->get('id'))

//   ->where('orders.id','=', $id)

//   ->sum('total');

            return view('customers.myorders', compact('order', 'onDeliveryOrder', 'onDeliveryOrderCount',
                'finishedOrderCount', 'finishedOrder', 'canceled', 'canceledcount', 'onProcesscount'));
        } else {

            return redirect('login');
        }

    }

    public function deliverOrder($id)
    {

        $order = order::where('id', $id)->first();

        //  DB::table('order')

        //  ->where('order.id','=', $id)

        //          ->update(['order' => 1 ,'carts.order_id' => $order->id  ]);

        $order->status = 'On Delivery';

        $order->update();

        return back();
    }

    public function delivered($id)
    {

        $order = order::where('id', $id)->first();

        $order->status = 'Done';

        $order->update();

        return back();
    }

    public function cancelOrder($id)
    {

        $order = order::where('id', $id)->first();

        $order->status = "canceled";

//    $order->onDelivery = 0 ;

        $order->update();

        return back();
    }

    public function update(Request $request, $id)
    {
        //

        $c_product = Cart::find($id);

        $c_product->c_quantity = $request->quantity;

        $product = Product::All()->where('id', $c_product->product_id)->first();

        $c_product->total = $request->quantity * $product->prodprice;

        $c_product->save();

        return back();

    }

}
