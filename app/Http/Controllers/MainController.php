<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    function index()
    {
        return view('layout.login');
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            // return redirect('main/successlogin');
            return redirect('products');
        } else {
            return back()->withErrors('Your Email or Password is wrong|');
        }
        // $this->validate($request, [
        //     'email'   => 'required|email',
        //     // 'password'  => 'required|alphaNum|min:3',
        //     'password'  => 'required|min:3'
        // ]);

        // $user_data = array(
        //     'email'  => $request->get('email'),
        //     'password' => $request->get('password')
        // );

        // if (Auth::attempt($user_data)) {
        //     return redirect('main/successlogin');
        // } else {
        //     return back()->with('error', 'Wrong Login Details');
        // }
    }

    function successlogin()
    {
        return view('layout.successlogin');
    }

    public function userRegistration(){
        return view('layout.registration');
    }
    public function saveRegistration(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userType' => 1,
        ]);
        if (Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('home');
        } else {
            return back()->withErrors('Something error, please try again!');
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect('main');
    }
}
