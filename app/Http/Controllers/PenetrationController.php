<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Penetration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PenetrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $penetrations = Penetration::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($penetrations)
                ->editColumn('date_penetration', function ($penetrations) {
                    return $penetrations->date_penetration->format('d F Y');
                })
                ->editColumn('name_company', function ($penetrations) {
                    return $penetrations->konsumen->name_company;
                })
                ->editColumn('action', function ($penetrations) {
                    return '
                            <a href="' . route('penetration.show', $penetrations->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('penetration.edit', $penetrations->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('penetration.destroy', $penetrations->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.penetration.penetration', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create penetration')) {
            abort(403);
        }
        Penetration::create($request->all());
        return redirect()->back()->with('success', 'Data penetrasi baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penetration  $penetration
     * @return \Illuminate\Http\Response
     */
    public function show(Penetration $penetration)
    {
        return view('pages.marketing.penetration.show', compact('penetration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penetration  $penetration
     * @return \Illuminate\Http\Response
     */
    public function edit(Penetration $penetration)
    {
        if(!Auth::user()->hasPermissionTo('edit penetration')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.penetration.edit', compact('penetration', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penetration  $penetration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penetration $penetration)
    {
        if(!Auth::user()->hasPermissionTo('edit penetration')) {
            abort(403);
        }
        $penetration->update($request->all());
        return redirect()->route('penetration.index')->with('success', 'Data penetration telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penetration  $penetration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penetration $penetration)
    {
        if(!Auth::user()->hasPermissionTo('delete penetration')) {
            abort(403);
        }
        $penetration->delete();
        return redirect()->back()->with('success', 'Data penetration telah berhasil dihapus');
    }
}
