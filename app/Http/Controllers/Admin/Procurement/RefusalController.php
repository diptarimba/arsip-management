<?php

namespace App\Http\Controllers\Admin\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Refusal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class RefusalController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $refusal = Refusal::select();
            return DataTables::of($refusal)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->addColumn('date', function($query){
                return Carbon::parse($query->date)->format('d F Y');
            })
            ->rawColumns(['action', 'date'])
            ->make(true);
        }
        return view('admin.employeeProcurement.employeeRefusal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employeeProcurement.employeeRefusal.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'file' => 'required',
            'date' => 'required'
        ]);

        $refusal = Refusal::create(array_merge($request->all(), [
            'file' => 'storage/' . $request->file('file')->storePublicly('file/refusal')
        ]));

        return redirect()->route('refusal.index')->with('status', 'Success create refusal file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refusal  $refusal
     * @return \Illuminate\Http\Response
     */
    public function show(Refusal $refusal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refusal  $refusal
     * @return \Illuminate\Http\Response
     */
    public function edit(Refusal $refusal)
    {
        return view('admin.employeeProcurement.employeeRefusal.create-edit', compact('refusal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refusal  $refusal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refusal $refusal)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'file' => 'sometimes',
            'date' => 'required'
        ]);

        $refusal->update(array_merge($request->all(), [
            'file' => $request->hasFile('file') ? 'storage/' . $request->file('file')->storePublicly('file/refusal') : $refusal->file
        ]));

        return redirect()->route('refusal.index')->with('status', 'Success update refusal file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refusal  $refusal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refusal $refusal)
    {
        $refusal->delete();

        return redirect()->route('refusal.index')->with('status', 'Success delete refusal file');
    }

    public function getActionColumn($data)
    {
        $editBtn = route('refusal.edit', $data->id);
        $deleteBtn = route('refusal.destroy', $data->id);
        $ident = Str::random(15);
        $user = Auth::user();
        $dataReturn = '';
        if(Auth::check())
        {
            $role = $user->getRoleNames()->first();
            if($role == 'admin'){
                $dataReturn .= '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-success">Edit</a>'
                . '<input form="form'.$ident .'" type="submit" value="Delete" class="mx-1 my-1 btn btn-sm btn-danger">
                <form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
                <input type="hidden" name="_token" value="'.csrf_token().'" />
                <input type="hidden" name="_method" value="DELETE">
                </form>';
            }
        }
        $dataReturn .= '<a href="'.$data->file.'" class="btn mx-1 my-1 btn-sm btn-warning">Download File</a>';

        return $dataReturn;
    }

}
