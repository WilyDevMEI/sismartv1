<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\DealProduct;
use Illuminate\Http\Request;

class DealProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data = Deal::find($request->ref_id);
        $data->dealable()->create([
            'name_product' => $request->name_product,
            'qty' => $request->qty,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Data Deal produk baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DealProduct  $dealProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DealProduct $dealProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DealProduct  $dealProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DealProduct $dealProduct)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DealProduct  $dealProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DealProduct $dealproduct)
    {
        $dealproduct->update($request->all());
        return redirect()->back()->with('success', 'Data produk deal lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DealProduct  $dealProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DealProduct $dealproduct)
    {
        $dealproduct->delete();
        return redirect()->back()->with('success', 'Data Deal Produk telah berhasil dihapus');
    }

    public function showProduct($id)
    {
        $deal = Deal::find($id);
        return view('pages.marketing.deal.deal_product.product', compact('deal'));
    }
}
