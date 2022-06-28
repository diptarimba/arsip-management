<?php

namespace App\Http\Controllers\Admin\CareerDevelopment;

use App\Http\Controllers\Controller;
use App\Models\CompetencyDevelopment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompetencyDevelopmentController extends Controller
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
            $competencyDevelopment = CompetencyDevelopment::select();
            return DataTables::of($competencyDevelopment)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
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
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'file' => 'required',
            'date' => 'required'
        ]);

        $competencyDevelopment = CompetencyDevelopment::create(array_merge($request->all(), [
            'file' => $request->file('file')->storePublicly('file/competency_development')
        ]));

        return redirect()->route('competency_development.index')->with('status', 'Success create competency development file');
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
        return view('admin.employeeCareerDevelopment.employeeCompetencyDevelopment.create-edit', compact('competencyDevelopment'));
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
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'file' => 'sometimes',
            'date' => 'required'
        ]);

        $competencyDevelopment->update(array_merge($request->all(), [
            'file' => $request->hasFile('file') ? $request->file('file')->storePublicly('file/competency_development') : $competencyDevelopment->file
        ]));

        return redirect()->route('competency_development.index')->with('status', 'Success update competency development file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompetencyDevelopment  $competencyDevelopment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompetencyDevelopment $competencyDevelopment)
    {
        $competencyDevelopment->delete();

        return redirect()->route('competency_development.index')->with('status', 'Success delete competency development file');
    }
}
