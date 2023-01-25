<?php

namespace App\Http\Controllers;

use App\Models\Plantest;
use App\Models\PPlantest;
use Illuminate\Http\Request;

class PPlantestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        dd($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Plantest::find($request->ref_id);
        $data->plantestable()->create([
            'name_product' => $request->name_product,
            'qty' => $request->qty
        ]);
        return redirect()->back()->with('success', 'Data baru produk plantest telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PPlantest  $pPlantest
     * @return \Illuminate\Http\Response
     */
    public function show(PPlantest $pPlantest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PPlantest  $pPlantest
     * @return \Illuminate\Http\Response
     */
    public function edit(PPlantest $pPlantest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PPlantest  $pPlantest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PPlantest $pplantest)
    {
        $pplantest->update([
            'name_product' => $request->name_product,
            'qty' => $request->qty
        ]);
        return redirect()->back()->with('success', 'Data produk plantest telah diperbaharui');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PPlantest  $pPlantest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PPlantest $pplantest)
    {
        $pplantest->delete();
        return redirect()->back()->with('success', 'Data produk plantest telah berhasil dihapus');
    }

    public function pplantest_product($id)
    {
        $data = Plantest::find($id);
        return view('pages.marketing.plantest.pplantest.show', compact('data'));
    }
}
