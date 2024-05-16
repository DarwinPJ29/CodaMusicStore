<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserEditController extends Controller
{
    public function editUser(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('website.edit-user');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'contact' => 'required',
            'address' => 'required'
        ]);
        $user = User::find(auth()->user()->id);
        // Update user information
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
        ]);
        return redirect()->route('index')->with('edit_user', 'success');
    }
}
