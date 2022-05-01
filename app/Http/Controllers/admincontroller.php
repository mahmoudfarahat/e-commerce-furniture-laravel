<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;

use Excel;
use PDF;

class admincontroller extends Controller
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
        return view('admin.signup');
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

        $op =   User::create($data);

        $message = "Error Try Again";

        if($op){
            $message = "Data Inserted";


        }


        session()->flash('message',$message);

        return redirect(url('/adminlogin'));
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


    public function adminlogin(){
        return view('admin.signin');
    }


    public function logout(Request $request){

        $request->session()->flush();
        auth()->logout();





        return redirect('/login');
     }

//     public function adminloginlogic(Request $request){

//         $validatedData = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required|min:6'
//         ]);
//         $email = $request->input('email');
//         $password = $request ->input('password');
//         return 'Email' .$email .'Password : ' .$password;

// }

public function adminloginlogic(Request $request){
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



    //    if(auth()->attempt($data,$remember)){

    //      $userdata = User::All()->where('email',$request->email)->first();

    //      session()->put('admin', 'admin');

    //      $request->session()->put('id', $userdata->id);




    //        return redirect('/adminprofile');

    //    }else{
    //        return redirect('/adminlogin');
    //    }


       if(auth()->guard('customers')->attempt($data,$remember)){

        $userdata = Customer::All()->where('email',$request->email)->first();


        // return $userdata;
        $request->session()->put('id', $userdata->id);
        if ($userdata->role = 1)
        {
        session()->put('admin', 'admin');

        }else{
            session()->put('customer', 'customer');

        }

        return redirect('/dashboard/orders');


      }else{
        return redirect('/adminlogin');
      }
  }









    public function addRole()
    {
        $roles = [
            ["name" => "superAdmin" ],
            ["name" => "admin" ]
        ];

        Role::insert($roles);
        return "Roles are Created successfully";
    }

    public function adduser()
    {
        $user = new User();
        $user->name = "aaaaaaaa";
        $user->email = "mahaaaaamoud";
        $user->password = "maaahmoud";

        $user->save();

        $rodeids = [1,2];
        $user->roles()->attach($rodeids);
        return "Recod thas been ";
    }


    // public function getAllRolesByuser()
    // {
    //    $user = User::find(5);
    //    $roles = $user->roles;
    //    return $roles;
    // }


    // public function importForm(){
    //     return view('import-form');
    // }


    // public function import(Request $request){
    //     Excel::import(new UserImport, $request->file ,\Maatwebsite\Excel\Excel::XLSX);
    //     return "Record are imported successfully";
    // }

    // public function exportoo( ){
    //     return  Excel::download(new UserExport, 'file.xlsx');

    // }

    // public function downlaodpdf(){
    //     $users = User::all();
    //     $pdf = PDF::loadView('pdf',compact('users'));
    //     return $pdf->downlaod('usesrs.pdf');
    // }



}
