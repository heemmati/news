<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::latest()->get();
        return view('admin.ACL.Role.list' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ACL.Role.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $role = Role::create([
            'slug' => $request->input('slug'),
            'name' => $request->input('name')
        ]);


        if ($role instanceof Role) {
            toast('نقش کاربری به موفقیت ثبت شد!', 'success');
            return redirect()->route('roles.index');
        } else {
            toast('ثبت نقش کاربری با خطا مواجه شد!', 'error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        return redirect()->route('admin.panel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('admin.ACL.Role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $updated = $role->update([
            'slug' => $request->input('slug'),
            'name' => $request->input('name')
        ]);
        if ($role->save()) {
            toast('ویرایش نقش کاربری با موفقیت انجام شد !', 'success');
            return redirect()->route('roles.index');
        } else {
            toast('ویرایش نقش کاربری با خطا مواجه شد!', 'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
        $deletedCat = $role->delete();
        if ($role->trashed()) {
            alert()->success('انجام شد', 'نقش کاربری  با موفقیت حذف شد!');
            return redirect()->route('roles.index');
        } else {
            alert()->error('خطا', 'حذف نقش کاربری با شکست مواجه شد!');
            return back();
        }
    }

    public function permissions($id)
    {
        $role = Role::findOrFail($id);
        $permitted = $role->permissions()->pluck('id')->toArray();

        $permissions = Permission::latest()->get();
        return view('admin.ACL.Role.permissions', compact('permissions' , 'role' , 'permitted'));
    }
    public function permissionsUpdate(Request $request){
        $permissions =$request->input('permissions');

        $role = $request->input('role');
        $role = Role::findOrFail($role);

        if (isset($permissions) && !empty($permissions)){
            $save = $role->permissions()->sync($permissions);
            if ($save) {
                toast('ویرایش نقش کاربری با موفقیت انجام شد !', 'success');
                return redirect()->route('roles.index');
            } else {
                toast('ویرایش نقش کاربری با خطا مواجه شد!', 'error');
                return back();
            }
        }
    }
}
