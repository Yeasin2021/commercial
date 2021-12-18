<?php

namespace App\Http\Controllers\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function userLoginForm(Request $request)
    {

        return view('login.login');
    }

    public function userLogin(Request $request)
    {
        // $data =  $request->input();
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $loginData = $request->only('email', 'password');

        if (Auth::attempt($loginData)) {
            $request->session()->regenerate();
            //toastr()->success("Welcome To Admin Panel.");
            return redirect()->route('admin.dashboard');
        } else {
            toastr()->error("These credentials do not match our records.");
            return redirect()->back();
        }
    }


    public function userRegister(Request $request)
    {
        return view("login.register");
    }

    public function userRegisterStore(Request $request)
    {
        $request->validate(
            [
                'name'      => 'required',
                'email'     => 'required|email',
                'password'  => 'required|string|min:6'
            ]
        );

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('loginForm');


        // return view("login.register");
    }

    public function userLogout()
    {
        Auth::logout();
        toastr()->success("Logout Success.");
        return redirect()->route('loginForm');
    }
}
