<?php

namespace App\Http\Controllers\Admin\CareerDevelopment;

use App\Http\Controllers\Controller;
use App\Models\PromotionTransfer;
use Illuminate\Http\Request;

class PromotionTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromotionTransfer  $promotionTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionTransfer $promotionTransfer)
    {
        //
    }
}
