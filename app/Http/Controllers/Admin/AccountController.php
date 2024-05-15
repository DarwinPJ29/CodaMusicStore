<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountRequest;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //     ]);

    //     $user = User::create($request->all());
    //     return response()->json(['success' => 'User created successfully', 'user' => $user]);
    // }

    public function editAccount(User $user)
    {
        return view('admin.edit-user', [
            'user' => $user
        ]);
    }
    public function updateAccount(AccountRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        $validated['user_id'] = $user->id;
        return redirect()->route('users')->with('update_account', 'success');
    }
}
