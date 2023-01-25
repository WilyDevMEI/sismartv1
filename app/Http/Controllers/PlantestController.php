<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Plantest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PlantestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $plantests = Plantest::with('konsumen','plantestable')->get();
        if ($request->ajax()) {
            return DataTables::of($plantests)
                ->addIndexColumn()
                ->editColumn('date_plantest', function ($plantests) {
                    return $plantests->date_plantest->format('d F Y');
                })
                ->editColumn('name_company', function ($plantests) {
                    return $plantests->konsumen->name_company;
                })
                ->editColumn('product', function($plantests) {
                    return [
                        'link' => route('pplantest.product', $plantests->id)
                    ];
                })
                ->editColumn('action', function ($plantests) {
                    return '
                            <a href="' . route('plantest.show', $plantests->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('plantest.edit', $plantests->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('plantest.destroy', $plantests->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.plantest.plantest', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create plantest')) {
            abort(403);
        }
        $data = Plantest::create([
            'konsumen_id' => $request->konsumen_id,
            'date_plantest' => $request->date_plantest,
            'pic' => $request->pic,
            'period_plantest' => $request->period_plantest,
            'result' => $request->result
        ]);

        foreach ($request->name_product as $key => $value) {
            $data->plantestable()->create([
                'name_product' => $value,
                'qty' => $request->qty[$key]
            ]);
        }

        return redirect()->back()->with('success', 'Data plantest baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function show(Plantest $plantest)
    {
        return view('pages.marketing.plantest.show', compact('plantest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantest $plantest)
    {
        if(!Auth::user()->hasPermissionTo('edit plantest')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.plantest.edit', compact('konsumens', 'plantest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantest $plantest)
    {
        if(!Auth::user()->hasPermissionTo('edit plantest')) {
            abort(403);
        }
        $plantest->update($request->all());
        return redirect()->route('plantest.index')->with('success', 'Data plantst lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantest  $plantest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantest $plantest)
    {
        if(!Auth::user()->hasPermissionTo('delete plantest')) {
            abort(403);
        }
        $plantest->plantestable()->delete();
        $plantest->delete();
        return redirect()->back()->with('success', 'Data plantest telah berhasil dihapus');
    }
}
