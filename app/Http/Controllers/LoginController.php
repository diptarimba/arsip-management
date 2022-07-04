<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Whoops\Run;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::guard('web')->check()){
            return redirect(url('/'));
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            $auth = Auth::guard('web')->attempt(['email' => $username, 'password' => $password], $request->filled('remember'));
        }else{
            $auth = Auth::guard('web')->attempt(['username' => $username, 'password' => $password], $request->filled('remember'));
        }

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
        if (Auth::guard('web')->check()) {
			Auth::guard('web')->logout();
			session()->flush();
			return redirect(route('login.index'));
		}
    }

    public function me()
    {
        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        return view('admin.me', compact('user', 'role'));
    }

    public function updateMe(Request $request)
    {
        $this->validate($request, [
            'username' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id, 'id')],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id, 'id')],
            'name' => 'required',
            'password' => 'nullable|min:8'
        ]);
        $userId = Auth::user()->id;
        $user = User::whereId($userId)->first();
        // dd($request->passowrd ? '1'.bcrypt($request->password) : '2'.$user->password);
        $user->update(array_merge($request->all(), [
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ]));

        return back()->with('status', 'Success update profile');
    }

}
