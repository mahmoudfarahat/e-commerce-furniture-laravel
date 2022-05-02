<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    //

    public function showCategories()
    {
        $categories = Category::paginate(8);

        return view('admin.categories', compact('categories'));

    }

    public function showProducts()
    {
        $products = Product::with('category')->get();
        // $products = Product::find(1)->category;
        // $products = Product::find(2)->category()->first();
         
        return view('admin.products', compact('products'));

    }

    public function showPrders(Request $request)
    {

        if ($request->session()->has('id') && $request->session()->has('admin')) {

            $products = Product::All();

            $orders = DB::table('customers')

                ->join('orders', 'customers.id', '=', 'orders.customer_id')

                ->select('customers.name', 'orders.country', 'orders.city', 'orders.street', 'orders.id',
                    'orders.delivery', 'orders.updated_at', 'orders.created_at', 'orders.status', 'orders.total')

                ->get();

            $ordercount = $orders->count();

            $bendingcount = $orders->where('status', '=', 'Bending')->count();

            $ondeliveryconut = $orders->where('status', '=', 'On Delivery')->count();
            $doneconut = $orders->where('status', '=', 'Done')->count();

            // return $products;
            // return $order;
            return view('admin.orders', ['products' => $products, 'order' => $orders, 'ordercount' => $ordercount, 'bendingcount' => $bendingcount, 'ondeliveryconut' => $ondeliveryconut, 'doneconut' => $doneconut]);
        } else {

            return view('admin.signin');
        }

    }

}
