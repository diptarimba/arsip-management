<?php

namespace App\Http\Controllers\Admin\CareerDevelopment;

use App\Http\Controllers\Controller;
use App\Models\PromotionTransfer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PromotionTransferController extends Controller
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
            $promotionTransfer = PromotionTransfer::select();
            return DataTables::of($promotionTransfer)
            ->addIndexColumn()
            ->addColumn('action', function($query){
                return $this->getActionColumn($query);
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('admin.employeeCareerDevelopment.employeePromotionsAndTransfers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employeeCareerDevelopment.employeePromotionsAndTransfers.create-edit');
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

        $promotionTransfer = PromotionTransfer::create(array_merge($request->all(), [
            'file' => $request->file('file')->storePublicly('file/promotion_transfer')
        ]));

        return redirect()->route('promotion_transfer.index')->with('status', 'Success create promotion transfer file');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromotionTransfer  $promotionTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(PromotionTransfer $promotionTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PromotionTransfer  $promotionTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(PromotionTransfer $promotionTransfer)
    {
        return view('admin.employeeCareerDevelopment.employeePromotionsAndTransfers.create-edit', compact('promotionTransfer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PromotionTransfer  $promotionTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromotionTransfer $promotionTransfer)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'file' => 'sometimes',
            'date' => 'required'
        ]);

        $promotionTransfer->update(array_merge($request->all(), [
            'file' => $request->hasFile('file') ? $request->file('file')->storePublicly('file/promotion_transfer') : $promotionTransfer->file
        ]));

        return redirect()->route('promotion_transfer.index')->with('status', 'Success update promotion transfer file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromotionTransfer  $promotionTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionTransfer $promotionTransfer)
    {
        $promotionTransfer->delete();

        return redirect()->route('promotion_transfer.index')->with('status', 'Success delete promotion transfer file');
    }
}
