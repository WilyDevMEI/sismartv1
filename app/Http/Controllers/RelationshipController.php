<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Relationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $relationships = Relationship::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($relationships)
                ->editColumn('name_company', function ($relationships) {
                    return $relationships->konsumen->name_company;
                })
                ->editColumn('date_start', function ($relationships) {
                    return $relationships->date_start->format('d F Y');
                })
                ->editColumn('date_end', function ($relationships) {
                    return $relationships->date_end->format('d F Y');
                })
                ->editColumn('action', function ($relationships) {
                    return '
                            <a href="' . route('relationship.show', $relationships->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('relationship.edit', $relationships->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('relationship.destroy', $relationships->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete()" . '">Delete</button>
                            </form>';
                })
                ->toJson();
        }
        return view('pages.relationship.relationship', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create relationship')) {
            abort(403);
        }
        Relationship::create($request->all());
        return redirect()->back()->with('success', 'Data relationship telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function show(Relationship $relationship)
    {
        return view('pages.relationship.show', compact('relationship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function edit(Relationship $relationship)
    {
        if(!Auth::user()->hasPermissionTo('edit relationship'))
        {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.relationship.edit', compact('relationship', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relationship $relationship)
    {
        if(!Auth::user()->hasPermissionTo('edit relationship')) {
            abort(403);
        }
        $relationship->update($request->all());
        return redirect()->route('relationship.index')->with('success', 'Data relationship telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Relationship  $relationship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Relationship $relationship)
    {
        if(!Auth::user()->hasPermissionTo('delete relationship')) {
            abort(403);
        }
        $relationship->delete();
        return back()->with('success', 'Data relationship telah dihapus');
    }
}
