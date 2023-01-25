<?php

namespace App\Http\Controllers;

use App\Models\Konsumen;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $konsumens = Konsumen::all();
        $maintenances = Maintenance::with('konsumen')->get();
        if ($request->ajax()) {
            return DataTables::of($maintenances)
                ->addIndexColumn()
                ->editColumn('date_maintenance', function ($maintenances) {
                    return $maintenances->date_maintenance->format('d F Y');
                })
                ->editColumn('name_company', function ($maintenances) {
                    return $maintenances->konsumen->name_company;
                })
                ->editColumn('action', function ($maintenances) {
                    return '
                            <a href="' . route('maintenance.show', $maintenances->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('maintenance.edit', $maintenances->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('maintenance.destroy', $maintenances->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('pages.marketing.maintenance.maintenance', compact('konsumens'));
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
        if(!Auth::user()->hasPermissionTo('create maintenance')) {
            abort(403);
        }
        Maintenance::create($request->all());
        return redirect()->back()->with('success','Data Maintenance baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('pages.marketing.maintenance.show', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        if(!Auth::user()->hasPermissionTo('edit maintenance')) {
            abort(403);
        }
        $konsumens = Konsumen::all();
        return view('pages.marketing.maintenance.edit', compact('maintenance', 'konsumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        if(!Auth::user()->hasPermissionTo('edit maintenance')) {
            abort(403);
        }
        $maintenance->update($request->all());
        return redirect()->route('maintenance.index')->with('success','Data maintenance lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        if(!Auth::user()->hasPermissionTo('delete maintenance')) {
            abort(403);
        }
        $maintenance->delete();
        return redirect()->back()->with('success', 'Data maintenance telah berhasil dihapus');
    }
}
