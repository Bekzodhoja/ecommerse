<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }

        else
        {
            $data = Product::paginate(3);

            
            return view('user.home',compact('data'));
        }

    }

    public function index(Request $request)
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Product::paginate(3);
            return view('user.home', compact('data'));

        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if($search=='')
        {
            $data = Product::paginate(3);
            return view('user.home', compact('data'));
        }
        $data = Product::where('title', 'Like', '%' . $search . '%')->get();
        return view('user.home', compact('data'));
    }

    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user = auth()->user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user ->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title =$product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;


            $cart->save();



            return redirect()->back()->with('message','Product Added Successfully');
        }
        else
        {
            return redirect('login');
        }
    }

}
