<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $deals = Deal::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($deals)
                ->addIndexColumn()
                ->editColumn('date_deal', function ($deals) {
                    return $deals->date_deal->format('d F Y');
                })
                ->editColumn('name_company', function ($deals) {
                    return $deals->konsumen->name_company;
                })
                ->editColumn('product', function($deals) {
                    return [
                        'link' => route('show.dealproduct', $deals->id)
                    ];
                })
                ->editColumn('action', function ($deals) {
                    return '
                            <a href="' . route('deal.show', $deals->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('deal.edit', $deals->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('deal.destroy', $deals->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.deal.deal', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create deal')) {
            abort(403, 'ANDA TIDAK DIIZINKAN UNTUK MENAMBAH YA 😝');
        }
        $data = Deal::create([
            'number_po' => $request->number_po,
            'date_deal' => $request->date_deal,
            'konsumen_id' => $request->konsumen_id,
            'topic' => $request->topic,
            'pic' => $request->pic,
            'result' => $request->result
        ]);

        foreach ($request->name_product as $key => $value) {
            $data->dealable()->create([
                'name_product' => $value,
                'qty' => $request->qty[$key],
                'price' => $request->price[$key]
            ]);
        }

        return redirect()->back()->with('success', 'Data Deal baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        return view('pages.marketing.deal.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        if(!Auth::user()->hasPermissionTo('edit deal')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.deal.edit', compact('konsumens', 'deal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        if(!Auth::user()->hasPermissionTo('edit deal')) {
            abort(403);
        }
        $deal->update($request->all());
        return redirect()->route('deal.index')->with('success', 'Data deal lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        if(!Auth::user()->hasPermissionTo('delete deal')) {
            abort(403);
        }
        $deal->dealable()->delete();
        $deal->delete();
        return redirect()->back()->with('success', 'Data Deal telah berhasil dihapus');
    }
}
