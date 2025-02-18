<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {

        $users = User::paginate(10);

        return view('user.index', compact('users'));
    }

    public function create() {

        return view('user.create');
    }

    public function store(Request $request) {

        // dd( $request->all() );

        $request->validate([
            'name' => 'required|min:5|max:255|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:4|regex:/[0-9]/|regex:/[a-z]/|regex:/[A-Z]/',
        ]);
        
        // save to users table
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password )
        ]);

        return redirect( route('user.index') )->with('success', 'User created successfully.'); 


    }

}
