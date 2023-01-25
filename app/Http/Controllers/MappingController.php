<?php

namespace App\Http\Controllers;

use App\Models\Mapping;
use App\Models\Konsumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $mappings = Mapping::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($mappings)
                ->editColumn('name_company', function ($mappings) {
                    return $mappings->konsumen->name_company;
                })
                ->editColumn('date_mapping', function ($mappings) {
                    return $mappings->date_mapping->format('d F Y');
                })
                ->editColumn('action', function ($mappings) {
                    return '
                            <a href="' . route('mapping.show', $mappings->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('mapping.edit', $mappings->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('mapping.destroy', $mappings->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })->make(true);
        }
        return view('pages.mapping.mapping', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create mapping')) {
            abort(403);
        }
        Mapping::create($request->all());
        return redirect()->back()->with('success', 'Data mapping baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function show(Mapping $mapping)
    {
        return view('pages.mapping.show', compact('mapping'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapping $mapping)
    {
        if(!Auth::user()->hasPermissionTo('edit mapping')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.mapping.edit', compact('mapping', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapping $mapping)
    {
        if(!Auth::user()->hasPermissionTo('edit mapping')) {
            abort(403);
        }
        $mapping->update($request->all());
        return redirect()->route('mapping.index')->with('success', 'Data mapping telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapping  $mapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapping $mapping)
    {
        if(!Auth::user()->hasPermissionTo('delete mapping')) {
            abort(403);
        }
        $mapping->delete();
        return redirect()->back()->with('success', 'Data mapping telah dihapus');
    }
}
