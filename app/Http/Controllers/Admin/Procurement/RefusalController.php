<?php

namespace App\Http\Controllers\Admin\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Refusal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RefusalController extends Controller
{
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
            ->rawColumns(['action'])
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
            'file' => $request->file('file')->storePublicly('file/refusal')
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
            'file' => $request->hasFile('file') ? $request->file('file')->storePublicly('file/refusal') : $refusal->file
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
}
