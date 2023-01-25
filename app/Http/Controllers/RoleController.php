<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        if ($request->ajax()) {
            return DataTables::of($roles)
                ->addIndexColumn()
                ->editColumn('permission', function ($roles) {
                    return [
                        'link' => route('has.permission', $roles->id)
                    ];
                })
                ->editColumn('action', function ($roles) {
                    return '
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editRole-'.$roles->id.'">Edit</button>
                            <form action="'. route('role.update', $roles->id) .'" method="POST" class="needs-validation d-inline-block" novalidate>
                                '. method_field('PUT') .'
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <div class="modal fade" id="editRole-'.$roles->id.'" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5">Data Role</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" placeholder="Enter name role" autocomplete="off" spellcheck="false" name="name" value="'.$roles->name.'">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="' . route('role.destroy', $roles->id) . '" method="POST" class="d-inline-block">
                                '. method_field('DELETE') .'
                                <input type="hidden" name="_token" value="'. csrf_token() .'">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('user.role.role', compact('roles'));
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
        Role::create($request->all());
        return redirect()->back()->with('success', 'Data Role baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return redirect()->back()->with('success', 'Data namae Role lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Data Roles berhasil dihapus');
    }
    public function showPermission($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $hasPermissions = $role->getAllPermissions();
        return view('user.role.has_permission', compact('hasPermissions', 'role', 'permissions'));
    }
    public function givePermission(Role $role)
    {
        foreach (request()->permission as $key => $value) {
            $role->givePermissionTo($value);
        }

        return redirect()->back()->with('success','Data permission untuk role telah ditambahkan');
    }

    public function revokePermission(Role $role, $permission)
    {
        $role->revokePermissionTo($permission);
        return redirect()->back()->with('success', 'Permission has been revoke');
    }
}
