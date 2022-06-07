<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function login() {
        return view('auth.login');
    }

    function register() {
        return view('auth.register');
    }

    function loginAuth(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:15'
        ]);
        $user = User::where('email','=', $request->email)->first();

        if(!$user) {
            return back()->with('fail', 'Your email has not been registered!!');
        } else {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);

                return redirect('admin/dashboard');

            } else {
                return back()->with('fail', 'Incorrect password!!');
            }
        }


        return $request->input();
    }

    function registerUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:15'
        ]);

        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $save = $user->save();

        if($save) {
            return redirect('auth/login')->with('success', 'User register successful. Please login here');

        } else {
            return back()->with('fail', 'Something went wrong!!');
        }
    }

    function dashboard() {
        $data = User::where('id','=', session('LoggedUser'))->first();
        return view('admin/dashboard',['userInfo'=>$data]);
    }

    function logout() {
        if(session('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('auth/login');
        }
    }
}
