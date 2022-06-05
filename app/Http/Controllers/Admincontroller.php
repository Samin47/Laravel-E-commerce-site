<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class Admincontroller extends Controller
{
    public function product()
    {
        return view('admin.product');
    }

    public function uploadproduct(Request $request)
    {
       
        $data = new Product;

        $image = $request->file; //name="file" in product.blade.php

        $imagename = time(). '.' . $image->getClientOriginalExtension(); //unique name

        $request->file->move('productimage', $imagename); //will save the image with $imagename

        $data->image=$imagename;  
        $data->title=$request->title; //form 'name'
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->title=$request->title;

        $data->save();

        return redirect()->back()->with('message', 'Product added successfully');

    }

    public function showproduct()
    {
        $data = Product::all();

        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data = Product::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Product deleted successfully');
    }


    public function updateproduct($id)
    {
        $data = Product::find($id);

        return view('admin.updateproduct',compact('data'));
    }
        
}

