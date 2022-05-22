<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PDO;

class UserController extends Controller
{
    public function viewAllUsers(){
        $users = User::all();
        return view('manage.user', ['users'=>$users]);
    }

    public function deleteUser($id){
        $user = User::find($id);

        if(isset($user)){
            // Delete data di database
            $user->delete();
        }

        return redirect()->back();
    }

    public function updateUser(Request $request){
        $user = User::find($request->id);

        $rules = [
            'name'=>'required',
            'email'=>'required|email:dns',
            'role'=>'required|in:Admin,Member'
        ];

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->save();

        return redirect()->back();
    }

    public function viewDetailUser(Request $request){
        $user = User::find($request->id);

        return view('manage.detailuser',['user' => $user]);
    }

    public function viewProfile(){
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function viewChangePassword(){
        $user = Auth::user();
        return view('changepassword', ['user' => $user]);
    }

    public function updateProfile(Request $request){
        $user = User::find($request->id);

        $rules = [
            'name'=>'required'
        ];

        $user->name = $request->name;

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $user->save();

        return redirect()->back();

    }

    public function updatePassword(Request $request){
        $user = User::find($request->id);

        $rules = [
            'password' => 'required',
            'new_password'=>'required|min:8|confirmed|different:password'
        ];

        $validator = Validator::make($request->all(),$rules);

        if(Hash::check($request->password, $user->password)){
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();
        }else{
            return back()->withErrors($validator);
        }

        return redirect()->back();
    }
}
