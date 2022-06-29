<?php

namespace App\Http\Controllers\Admin\CareerDevelopment;

use App\Http\Controllers\Controller;
use App\Models\CompetencyDevelopment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
            'file' => 'storage/' . $request->file('file')->storePublicly('file/competency_development')
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
            'file' => $request->hasFile('file') ? 'storage/' . $request->file('file')->storePublicly('file/competency_development') : $competencyDevelopment->file
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

    public function getActionColumn($data)
    {
        $editBtn = route('competency_development.edit', $data->id);
        $deleteBtn = route('competency_development.destroy', $data->id);
        $ident = Str::random(15);
        return
        '<a href="'.$editBtn.'" class="btn mx-1 my-1 btn-sm btn-success">Edit</a>'
        . '<input form="form'.$ident .'" type="submit" value="Delete" class="mx-1 my-1 btn btn-sm btn-danger">
        <form id="form'.$ident .'" action="'.$deleteBtn.'" method="post">
        <input type="hidden" name="_token" value="'.csrf_token().'" />
        <input type="hidden" name="_method" value="DELETE">
        </form>';
    }
}
