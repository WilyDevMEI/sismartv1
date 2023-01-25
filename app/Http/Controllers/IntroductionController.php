<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class IntroductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $introductions = Introduction::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($introductions)
                ->editColumn('date_introduction', function ($introductions) {
                    return $introductions->date_introduction->format('d F Y');
                })
                ->editColumn('name_company', function ($introductions) {
                    return $introductions->konsumen->name_company;
                })
                ->editColumn('action', function ($introductions) {
                    return '
                            <a href="' . route('introduction.show', $introductions->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('introduction.edit', $introductions->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('introduction.destroy', $introductions->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.introduction.introduction', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create introduction')) {
            abort(403);
        }
        Introduction::create($request->all());
        return redirect()->back()->with('success', 'Data introduction baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function show(Introduction $introduction)
    {
        return view('pages.marketing.introduction.show', compact('introduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function edit(Introduction $introduction)
    {
        if(!Auth::user()->hasPermissionTo('edit introduction')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.introduction.edit', compact('konsumens', 'introduction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Introduction $introduction)
    {
        if(!Auth::user()->hasPermissionTo('edit introduction')) {
            abort(403);
        }
        $introduction->update($request->all());
        return redirect()->route('introduction.index')->with('success', 'Data mapping telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Introduction  $introduction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Introduction $introduction)
    {
        if(!Auth::user()->hasPermissionTo('delete introduction')) {
            abort(403);
        }
        $introduction->delete();
        return redirect()->back()->with('success', 'Data mapping telah berhasil dihapus');
    }
}
