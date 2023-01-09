<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Hash;
use Auth;
class homeController extends Controller
{
    public function registerPage(){
        return view('register');
    }

    public function register(Request $request){

        $request->validate([
            'name' =>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);
        $user = new userModel();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->type=1;
        $user->save();

        return redirect()->back();


    }
    public function loginPage(){
        return view('login');
    }
    public function loginAttempt(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($check){
            return "login successful";
        }else{
            return "Login failed";
        }
    }
}
