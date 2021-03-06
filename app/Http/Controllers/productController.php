<?php

namespace App\Http\Controllers;

use App\Mail\Sendemail;
use App\Models\Product;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use PDF;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate(8);

        $categories = Category::all();

        return view('product.products', compact('products' ,'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        //
        if ($request->session()->has('id') && $request->session()->has('admin')) {

            $categories = Category::all();
            return view('product.add-product', compact('categories'));
        } else {
            return redirect('/adminlogin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new product();

        $validatedData = $request->validate([
            'prodname' => 'required|min:6',
            'prodprice' => 'required|min:2',
            'quantity' => 'required',
            'imglink' => 'required',
        ]);

        // if($request->hasfile('prodpicture'))
        // {
        //     $file = $request->file('prodpicture');
        //     $extention = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extention;
        //     $file->move('uploads/products/', $filename);
        //     $product->prodpicture = $filename;
        // }

        $product->prodpicture = $request->imglink;
        $product->prodname = $request->prodname;

        $product->prodprice = $request->prodprice;

        $product->quantity = $request->quantity;


        $product->Cartegory_id = $request->category_id;



        // $user->products()->save($product);
        // products()->save($product);
        $product->save();
        return redirect('/dashboard/products')->with('product_added', 'product has been added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // link = just controller name / id

        $product = DB::table('products')->where('id', $id)->first();

        return view('product.single-product', compact('product'));
    }

    public function getProductsbyID()
    {
        // link = just controller name / id

        $products = User::find(2)->products;
        return $products;
        // $products = Product::all();
        //    return view('product.products' , compact('products'));
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
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.edit-product', compact('product'));
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

        $product = Product::find($id);

        $validatedData = $request->validate([
            'prodname' => 'required|min:6',
            'prodprice' => 'required|min:2',
            'quantity' => 'required',
        ]);
        $product->prodname = $request->prodname;

        $product->prodprice = $request->prodprice;

        $product->quantity = $request->quantity;

        if ($request->hasfile('prodpicture')) {
            $destination = 'uploads/products/' . $product->prodpicture;

            if (File::exists($destination)) {
                File::delete($destination);

            }
            $file = $request->file('prodpicture');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $product->prodpicture = $filename;
        }

        $product->update();

        return back()->with('post_updated', 'Post has been updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('products')->where('id', $id)->delete();
        return back()->with('product_added', 'Product has been deleted successfully');

    }

    public function innerJoinCaluse()
    {

        $request = DB::table('admins')
            ->join('products', 'admins.id', '=', 'products.admin_id')
            ->select('admins.name', 'products.prodname', 'products.prodpicture', 'products.prodprice')
            ->get();
        return $request;
    }

    public function leftJoinClause()
    {

        $result = DB::table('admins')
            ->leftJoin('products', 'admins.id', '=', 'products.admin_id')
            ->get();
        return $result;
    }

    public function rightJoinClause()
    {

        $result = DB::table('admins')
            ->rightJoin('products', 'admins.id', '=', 'products.admin_id')
            ->get();
        return $result;
    }
    public function multidelete(Request $request)
    {
if(request('id')){
    Product::destroy(request('id'));

    return back()->with('produts_deleted', 'products has been deleted successfully');
}

return back()->with('produts_deleted', 'Select products to be deleted');

    }

    // public function uploadimage()
    // {

    //     $request->file->store('public');
    //     return "uploaded";

    // }

    // public function sendEmail()
    // {
    //     $details =[

    //         'title' =>'Mail from Mahmoud Farahat',
    //         'body'  => 'this is me '

    //     ];

    //     $op = Mail::to('sh.elbalahy@gmail.com')->send(new TestMail($details));

    //     if($op){
    //         return "Email send";

    //     }else{
    //         return "Try again";
    //     }
    // }

    public function Sendemail()
    {
        # code...
        $details = [
            'title' => 'from',
            'body' => 'toooo',
        ];
        Mail::to('mahmoud.farahat.it@gmail.com')->send(new Sendemail($details));
        return 'done';
    }

    public function downlaodpdf()
    {

        $products = Product::all();

        $pdf = PDF::loadView('product.products', compact('products'));

        return $pdf->download('usesrs.pdf');
        // ???????? paginate ??????????
    }

    public function autocomplete(Request $request)
    {

        // $data = Product::select("prodname")
        // ->where("prodname","LIKE","%{$request->terms}%")
        // ->get();

        // return response()->json($data);
        return Product::select('prodname')
            ->where('prodname', 'like', "%{$request->term}%")
            ->pluck('prodname');

    }

}
