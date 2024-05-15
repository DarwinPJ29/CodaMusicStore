<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\SigninRequest;
use App\Mail\Message;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthenticationController extends Controller
{
    public function index()
    {
        $products = Product::where('archive', '0')->get();
        foreach ($products as  $value) {
            $exist = Stock::where('product_id', $value->id)->exists();
            if ($exist) {
                $stocks = Stock::where('product_id', $value->id)->first();
                $value->stocks = $stocks->quantity;
            } else {
                $value->stocks = 0;
            }
        }

        return view('website.index', compact('products'));
    }

    public function about()
    {
        return view('website.about');
    }
    public function contact()
    {
        return view('website.contactUs');
    }
    public function signin(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('website.signin');
        }

        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $validated['email'])->get()->first();

        // User account is not activated
        if ($user) {
            if ($user->activated !== 1) {
                return back()->with('inactivated', 'Sorry your account is not activated yet!');
            }
        }

        // Check email and password is valid
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            //Redirect to the default route
            if (auth()->user()->role === 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('index')->with('login', 'success');
            }
        } else {
            return redirect()->back()->with('invalid', 'Email or Password is invalid!');
        }
    }
    public function signup(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('website.signup');
        }

        $validated = $request->validate([
            'name' => 'required|regex:/^[\pL\s\b.g]+$/u',
            'contact' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|max:20',
        ]);

        $user =  User::create([
            'name' => ucwords($validated['name']),
            'contact' => $validated['contact'],
            'address' => $validated['address'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'activated' => 1,
        ]);

        if ($user) {
            return redirect()->route('signin')->with('signin', 'success');
        }else{
            return back('signin')->with('signup', 'Failure');
        }
    }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('index')->with('logout', 'Success');
    }

    public function changePassword(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('website.change_password');
        }

        $valid = $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|min:4|max:20',
            'password_confirm' => 'required|same:password_new|min:4|max:20',
        ]);

        $user = User::find(auth()->user()->id);
        if (Hash::check($valid['password_old'], $user->password)) {
            $user->password = Hash::make($valid['password_confirm']);
            $user->update();
            if ($user->role === 1) {
                return redirect()->route('dashboard')->with('change_password', 'Success');
            } else {
                return redirect()->route('index')->with('change_password', 'Success');
            }
        } else {
            return back()->with('old_password', 'Success');
        }
    }
}
