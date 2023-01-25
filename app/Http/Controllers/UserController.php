<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        if ($request->ajax()) {
            return DataTables::of($users)
                ->addIndexColumn()
                ->editColumn('has_role', function ($roles) {
                    return [
                        'link' => route('has.role', $roles->id)
                    ];
                })
                ->editColumn('action', function ($users) {
                    return '
                            <a href="' . route('user.show', $users->id) . '" class="btn btn-sm btn-primary btn-show" role="button">Show</a>
                            <a href="' . route('user.edit', $users->id) . '" class="btn btn-sm btn-warning btn-edit" role="button">Edit</a>
                            <form action="' . route('user.destroy', $users->id) . '" method="POST" class="d-inline-block">
                                ' . method_field('DELETE') . '
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <button type="submit" class="btn btn-sm btn-danger btn-delete" role="button" onclick="' . "ConfirmDelete(event, 42)" . '">Delete</button>
                            </form>
                    ';
                })
                ->toJson();
        }
        return view('user.user');
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
        if(!Auth::user()->hasPermissionTo('create user')) {
            abort(403);
        }
        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone,
            'email' => $request->email,
            'profession' => $request->profession,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success', 'Data user baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!Auth::user()->hasPermissionTo('edit user')) {
            abort(403);
        }
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(!Auth::user()->hasPermissionTo('edit user')) {
            abort(403);
        }
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Data user lama telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!Auth::user()->hasPermissionTo('delete user')) {
            abort(403);
        }
        if($user->hasRole('Super Admin')) {
            abort(401);
        }

        if(!$user->roles()->detach() > 0) {
            $user->removeRole(Role::all());
        }
        $user->delete();
        return redirect()->back()->with('success', 'Data user telah berhasil dihapus');


    }
    public function hasRole(User $user)
    {
        $roles = Role::with('permissions')->get();
        return view('user.has_role.has_role', compact('user', 'roles'));
    }
    public function giveRole(Request $request, User $user)
    {
        foreach ($request->role as $value) {
            $user->assignRole($value);
        }

        return redirect()->back()->with('success','Role has been added for this user');
    }
    public function removeRole(User $user, Role $role)
    {
        $user->removeRole($role);
        return redirect()->back()->with('success','User has been revoke role');
    }
}
