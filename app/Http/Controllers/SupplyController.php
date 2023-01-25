<?php

namespace App\Http\Controllers;

use Psy\Sudo;
use App\Models\Supply;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use App\Models\SupplyProduct;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $supplies = Supply::with(['konsumen', 'supplieable'])->get();
        if ($request->ajax()) {
            return DataTables::of($supplies)
                ->addIndexColumn()
                ->editColumn('date_do', function ($supplies) {
                    return $supplies->date_do->format('d F Y');
                })
                ->editColumn('name_company', function ($supplies) {
                    return $supplies->konsumen->name_company;
                })
                ->editColumn('product', function($supplies) {
                    return [
                        'link' => route('supplyProductData', $supplies->id)
                    ];
                })
                ->editColumn('action', function ($supplies) {
                    return '
                            <a href="' . route('supplies.show', $supplies->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('supplies.edit', $supplies->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('supplies.destroy', $supplies->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.supply.supply', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create supply')) {
            abort(403);
        }
        $data = Supply::create([
            'konsumen_id' => $request->konsumen_id,
            'number_po' => $request->number_po,
            'number_do' => $request->number_do,
            'date_do' => $request->date_do,
            'pic' => $request->pic,
            'expedition' => $request->expedition,
            'type_customer' => $request->type_customer,
            'result_supply' => $request->result_supply,
        ]);
        foreach($request->name_product as $key => $value) {
            $data->supplieable()->create([
                'name_product' => $value,
                'qty' => $request->qty[$key],
            ]);
        }
        return redirect()->back()->with('success','Data supply baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        return view('pages.marketing.supply.show', compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        if(!Auth::user()->hasPermissionTo('edit supply')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.supply.edit', compact('konsumens', 'supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        if(!Auth::user()->hasPermissionTo('edit supply')) {
            abort(403);
        }
        $supply->update($request->all());

        return redirect()->route('supplies.index')->with('success', 'Data supply lama telah berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        if(!Auth::user()->hasPermissionTo('delete supply')) {
            abort(403);
        }
        $supply->supplieable()->delete();
        $supply->delete();
        return redirect()->back()->with('success', 'Data supply telah berhasil dihapus');
    }
}
