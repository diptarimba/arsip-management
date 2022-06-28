<?php

namespace App\Http\Controllers\Admin\CareerDevelopment;

use App\Http\Controllers\Controller;
use App\Models\CompetencyDevelopment;
use Illuminate\Http\Request;

class CompetencyDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employeeCareerDevelopment.employeeCompetencyDevelopment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employeeCareerDevelopment.employeeCompetencyDevelopment.create-edit');
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
     * @param  \App\Models\CompetencyDevelopment  $competencyDevelopment
     * @return \Illuminate\Http\Response
     */
    public function show(CompetencyDevelopment $competencyDevelopment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompetencyDevelopment  $competencyDevelopment
     * @return \Illuminate\Http\Response
     */
    public function edit(CompetencyDevelopment $competencyDevelopment)
    {
        return view('admin.employeeCareerDevelopment.employeeCompetencyDevelopment.create-edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompetencyDevelopment  $competencyDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompetencyDevelopment $competencyDevelopment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetencyDevelopment  $competencyDevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetencyDevelopment $competencyDevelopment)
    {
        //
    }
}
