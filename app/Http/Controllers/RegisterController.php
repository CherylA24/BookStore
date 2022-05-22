<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index');
    }

    public function store(Request $request){
        $rules = [
            'email' => 'required|email:dns|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|min:8|confirmed'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $validatedData = $request->all();
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->intended('/login');
    }
}
