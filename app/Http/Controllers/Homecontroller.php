<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

class Homecontroller extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1'){
            return view('admin.home');
        }
        else {
            
            // $data = Product::all();
             $data = Product::paginate(3);

            return view('user.home',compact('data'));
        }
    }


    public function index()
    {
        //if any user is logged in, it will call redirect route
        if(Auth::id())
        {
            return redirect('redirect');
        }

        else{

            //$data = Product::all();
            $data = Product::paginate(3);

            return view('user.home',compact('data'));
        }
        
    }
}
