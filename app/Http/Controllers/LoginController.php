<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect(url('/'));
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required'
        ]);

        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->filled('remember'));

        if($auth){
            return redirect()
				->intended(route('dashboard'))
				->with('status','Sukses Login Sebagai Admin!');
        }else{
            return back()->withErrors('username / password anda salah!');
        }
    }

    public function logout()
    {
        if (Auth::check()) {
			Auth::logout();
			session()->flush();
			return redirect(route('logout'));
		}
    }

}
