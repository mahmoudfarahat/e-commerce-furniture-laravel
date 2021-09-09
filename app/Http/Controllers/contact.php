<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacts;

class contact extends Controller
{
    //

    public  function store(Request $request){


        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
             'email' => 'required|email',
        ]);

            $contact = new contacts();

            $contact->name = $request->name;

            $contact->phone = $request->phone;

            $contact->email = $request->email;

            $contact->save();

        return back();
    }
}
