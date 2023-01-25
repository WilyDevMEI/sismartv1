<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KonsumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        if ($request->ajax()) {
            return DataTables::of($konsumens)
                ->editColumn('action', function ($konsumens) {
                    return '
                            <a href="' . route('konsumen.show', $konsumens->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('konsumen.edit', $konsumens->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('konsumen.destroy', $konsumens->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })->make(true);
        }
        return view('pages.konsumen.konsumen', compact('konsumens'));
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
        if(!Auth::user()->can('create customer')) {
            abort(403, 'ANDA TIDAK DIIZINKAN MENAMBAH LOH YA 😝');
        }
        Konsumen::create($request->all());
        return redirect()->back()->with('success', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function show(Konsumen $konsuman)
    {
        return view('pages.konsumen.show', compact('konsuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsumen $konsuman)
    {
        if(!Auth::user()->hasPermissionTo('edit customer')) {
            abort(403);
        }
        return view('pages.konsumen.edit', compact('konsuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konsumen $konsuman)
    {
        if(!Auth::user()->hasPermissionTo('edit customer')) {
            abort(403);
        }
        $konsuman->update($request->all());
        return redirect()->route('konsumen.index')->with('success', 'Data konsumen telah diperbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Konsumen  $konsumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konsumen $konsuman)
    {
        if(!Auth::user()->hasPermissionTo('delete customer')) {
            abort(403, 'ANDA TIDAK DIIZINKAN UNTUK MENGHAPUS LOH YA! 😝');
        }
        $konsuman->delete();
        return redirect()->back()->with('success', 'Data konsumen telah dihapus');
    }
}
