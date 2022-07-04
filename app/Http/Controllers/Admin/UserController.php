<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $users = User::select();
            return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->addColumn('role',function($query){
                return $query->getRoleNames()->first();
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.user.index');
    }

    public function create()
    {
        $role = [
            'superadmin' => 'SUPERADMIN',
            'admin' => 'ADMIN',
            'user' => 'USER'
        ];
        return view('admin.user.create-edit', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        $user = User::create(
                    array_merge(
                        $request->only('name', 'username', 'email', 'password'),
                        [
                            'password' => bcrypt($request->password)
                        ]
                    )
                );

        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('status', 'Successfully create user');
    }

    public function edit(User $user)
    {
        $role = [
            'superadmin' => 'SUPERADMIN',
            'admin' => 'ADMIN',
            'user' => 'USER'
        ];
        $userRole = $user->getRoleNames()->first();
        return view('admin.user.create-edit', compact('user', 'role', 'userRole'));
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email',
            'password' => 'nullable|min:8',
            'role' => 'required'
        ]);

        $user->update(array_merge(
            $request->only('name', 'username', 'email', 'password'),
            [
                'password' => $request->password ? bcrypt($request->password) : $user->password
            ]
            ));


        return redirect()->route('user.index')->with('status', 'Successfully update user');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('status', 'Successfully delete user');
    }

    public function getActionColumn($data)
    {
        $editBtn = route('user.edit', $data->id);
        $deleteBtn = route('user.destroy', $data->id);
        $ident = Str::random(15);
        $user = Auth::user();
        $dataReturn = '';
        if(Auth::check())
        {
            $role = $user->getRoleNames()->first();
            if($role == 'superadmin'){
                $dataReturn .= '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-success">Edit</a>'
                . '<input form="form'.$ident .'" type="submit" value="Delete" class="mx-1 my-1 btn btn-sm btn-danger">
                <form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
                <input type="hidden" name="_token" value="'.csrf_token().'" />
                <input type="hidden" name="_method" value="DELETE">
                </form>';
            }
        }

        return $dataReturn;
    }
}
