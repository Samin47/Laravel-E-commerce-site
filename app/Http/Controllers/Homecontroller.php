<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;


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

    public function search(Request $request)
    {
        $search = $request->search; //form name='search'  

        if($search == ''){ //usual paginated view for blank search hit

            $data = Product::paginate(3);

            return view('user.home',compact('data'));
        }

        $data = Product::where('title', 'Like','%'.$search.'%')->get(); //same variable name is user.product.blade\

        return view('user.home',compact('data'));

    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user(); //getting logged in user details

            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name; //saving user name from users table to cart table
            $cart->phone = $user->mobile; 
            $cart->address = $user->address; 

            $cart->product_title = $product->title; 
            $cart->price = $product->price; 

            $cart->quantity = $request->quantity; //from form input

            $cart->save();



            return redirect()->back()->with('message', 'Product added to cart successfully');
        }

        else{

            return redirect('login');
        }
    }
}
