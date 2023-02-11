<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::latest()->paginate(10);
        return view('admin.ACL.Permission.list', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.ACL.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $permission = Permission::create([
            'slug' => $request->input('slug'),
            'name' => $request->input('name')
        ]);


        if ($permission instanceof Permission) {
            toast('دسترسی کاربری به موفقیت ثبت شد!', 'success');
            return redirect()->route('permissions.index');
        } else {
            toast('ثبت دسترسی کاربری با خطا مواجه شد!', 'error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        return redirect()->route('admin.panel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
        return view('admin.ACL.Permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
        $updated = $permission->update([
            'slug' => $request->input('slug'),
            'name' => $request->input('name')
        ]);
        if ($permission->save()) {
            toast('ویرایش دسترسی کاربری با موفقیت انجام شد !', 'success');
            return redirect()->route('permissions.index');
        } else {
            toast('ویرایش دسترسی کاربری با خطا مواجه شد!', 'error');
            return back();
        }
    }


    public function destroy(Permission $permission)
    {
        //
        $deletedCat = $permission->delete();
        if ($permission->trashed()) {
            alert()->success('انجام شد', 'دسترسی کاربری  با موفقیت حذف شد!');
            return redirect()->route('permissions.index');
        } else {
            alert()->error('خطا', 'حذف دسترسی کاربری با شکست مواجه شد!');
            return back();
        }
    }

    public function permissionRecover()
    {

        $routes = Route::getRoutes();

        $permissions = [];
        foreach ($routes as $route) {

            $uriAdmin = explode('/', $route->uri);

            if (isset($uriAdmin[0]) && !empty($uriAdmin[0])) {

                if ($uriAdmin[0] == 'panel') {

                    $exist = Permission::whereSlug($route->getName())->first();

                    if (isset($exist) && !empty($exist)) {

                    } else {
                        if (!empty($route->getName())) {
                            $Permission = new Permission();
                            $Permission->slug = $route->getName();
                            $Permission->name = $route->getName();
                            $Permission->save();
                        }

                    }

                }

            }


        }

        $permissions = Permission::latest()->get();
        $role = Role::findOrFail(1);
        $syncing = $role->permissions()->sync($permissions);

        if ($syncing) {
            alert()->success('انجام شد', 'دسترسی کاربری  با موفقیت بروزرسانی شد!');
            return redirect()->route('permissions.index');
        } else {
            alert()->error('خطا', 'بروزرسانی دسترسی کاربری با شکست مواجه شد!');
            return back();
        }

    }

    public function groupEdit()
    {
        $permissions = Permission::latest()->get();
        return view('admin.ACL.Permission.group', compact('permissions'));
    }

    public function groupUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $permissions = $request->input('permissions');


            if (isset($permissions) && !empty($permissions) && count($permissions) > 0) {
                foreach ($permissions as $slug => $name) {
                    $permission = Permission::where('slug', $slug)->first();
                    if (isset($permission) && !empty($permission)) {
                        $permission->update([
                            'name' => $name
                        ]);
                        $permission->save();
                    }
                }


                DB::commit();
                toast('انجام شد!', 'success');
                return back();


            } else {
                toast('دقایقی بعد مجددا تلاش کنید!', 'error');
                return back();
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            toast('دقایقی بعد مجددا تلاش کنید!', 'error');
            return back();
        }


    }

}
