<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));

        $user->assignRole('user');

        return redirect()->route('login.index')->with('status', 'Berhasil membuat Akun. Silahkan login terlebih dahulu');
    }

    public function addNewAdmin(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id, 'id')],
        ]);

        $user = User::create([
            'username' => Str::random(15),
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'name' => 'Admin'
        ]);

        $user->assignRole('admin');
    }
}
