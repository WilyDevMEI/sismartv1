<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Models\QuotationProduct;

class QuotationProductController extends Controller
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
        $quotation = Quotation::find($request->ref_id);
        $quotation->quotationable()->create([
            'name_product' => $request->name_product,
            'qty' => $request->qty,
            'price' => $request->price
        ]);

        return redirect()->back()->with('success', 'Data produk quotation baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationProduct  $quotationProduct
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationProduct $quotationProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationProduct  $quotationProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationProduct $quotationProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuotationProduct  $quotationProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuotationProduct $quotationproduct)
    {
        $quotationproduct->update($request->all());
        return redirect()->back()->with('success', 'Data produk quotation lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationProduct  $quotationProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationProduct $quotationproduct)
    {
        $quotationproduct->delete();
        return redirect()->back()->with('success', 'Data produk quotation telah berhasil dihapus');
    }

    public function quotationProduct($id)
    {
        $quotation = Quotation::find($id);
        return view('pages.marketing.quotation.quotation_product.quotation_product', compact('quotation'));
    }
}
