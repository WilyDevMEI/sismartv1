<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $quotations = Quotation::with('konsumen', 'quotationable')->get();
        if ($request->ajax()) {
            return DataTables::of($quotations)
                ->addIndexColumn()
                ->editColumn('date_quotation', function ($quotations) {
                    return $quotations->date_quotation->format('d F Y');
                })
                ->editColumn('name_company', function ($quotations) {
                    return $quotations->konsumen->name_company;
                })
                ->editColumn('product', function($quotations) {
                    return [
                        'link' => route('quotationproduct.product', $quotations->id)
                    ];
                })
                ->editColumn('action', function ($quotations) {
                    return '
                            <a href="' . route('quotation.show', $quotations->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('quotation.edit', $quotations->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('quotation.destroy', $quotations->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.quotation.quotation', compact('konsumens'));

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
        if(!Auth::user()->hasPermissionTo('create quotation')) {
            abort(403);
        }
        $data = Quotation::create([
            'konsumen_id' => $request->konsumen_id,
            'date_quotation' => $request->date_quotation,
            'pic' => $request->pic,
            'system_payment' => $request->system_payment,
            'result' => $request->result
        ]);
        foreach ($request->name_product as $key => $value) {
            $data->quotationable()->create([
                'name_product' => $value,
                'qty' => $request->qty[$key],
                'price' => $request->price[$key]
            ]);
        }
        return redirect()->back()->with('success', 'Data penawaran baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return view('pages.marketing.quotation.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        if(!Auth::user()->hasPermissionTo('edit quotation')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.quotation.edit', compact('konsumens','quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        if(!Auth::user()->hasPermissionTo('edit quotation')) {
            abort(403);
        }
        $quotation->update($request->all());
        return redirect()->route('quotation.index')->with('success', 'Data penawaran lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        if(!Auth::user()->hasPermissionTo('delete quotation')) {
            abort(403);
        }
        $quotation->quotationable()->delete();
        $quotation->delete();
        return redirect()->back()->with('success', 'Data penawaran telah berhasil dihapus');
    }
}
