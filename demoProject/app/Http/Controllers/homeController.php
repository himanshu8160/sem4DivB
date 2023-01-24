<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\forgetPassword;
use Hash;
use Auth;
use Illuminate\Support\Facades\Session;
use Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailDemo;
use RealRashid\SweetAlert\Facades\Alert as FacadesAlert;
use Symfony\Component\HttpFoundation\Response;
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
        Alert::success("Successfully Registered");
        return redirect()->route('registerPage');


    }
    public function loginPage(){
        return view('login');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function forgotPasswordPage(){
        return view('forgotPassword');
    }
    public function forgotPasswordAttempt(Request $request){
       $request->validate([
            'email'=> 'required|email'
       ]);

       $user=userModel::where('email',$request->email)->first();
       if($user){
            $otp=random_int(1000, 9999);
            $fg=new forgetPassword();
            $fg->userId=$user->id;
            $fg->otp=$otp;
            $fg->save();
            return redirect()->route('askOtp')->with('id',$fg->id);
       }else{
        Alert::warning("Email not Found");
        return redirect()->back();
       }
    }
    public function askOtp(){
        return view('askOtp');
    }
    public function matchOtp(Request $request){
        $request->validate([
            'id'=> 'required|numeric',
            'otp'=>'required|numeric|digits:4'
       ]);
       $fg=forgetPassword::find($request->id);
       if($fg->otp == $request->otp ){
        
       }
       return $request;
    }
    public function loginAttempt(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $check=Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if($check){
            Alert::success('Login', 'Login Successful');
            return redirect()->route('dashboard');
        }else{
            Alert::success('Login', 'Login Failed');
            return redirect()->route('loginPage');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        Alert::success('Take Care', 'Successfully Logged');
        return redirect()->route('loginPage');

    }
    public function sendEmail() {
        $email = 'himanshusharma445653@gmail.com';

        $mailData = [
            'title' => 'Demo Email',
            'url' => 'https://www.positronx.io'
        ];

        Mail::to($email)->send(new EmailDemo($mailData));

        return response()->json([
            'message' => 'Email has been sent.'
        ], Response::HTTP_OK);
    }
}
