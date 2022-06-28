<?php

namespace App\Http\Controllers\Admin\Procurement;

use App\Http\Controllers\Controller;
use App\Models\Refusal;
use Illuminate\Http\Request;

class RefusalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refusal  $refusal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refusal $refusal)
    {
        //
    }
}
