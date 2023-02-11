<?php

namespace App\Http\Controllers\Admin\Region;

use App\Http\Controllers\Controller;
use App\Miracles\Crud;
use App\Model\Region\Region;
use App\Model\Role;
use App\Traits\Base\BaseRepository;
use App\Traits\Image\ImageHelper;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    use BaseRepository, ImageHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::latest()->get();
        return view('module.region.admin.list', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('slug' , '<>' , 'super')->latest()->get();
        return view('module.region.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => ['required'],

        ]);

        //  Status
        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }




        $region = Region::create([
            'creator_id' => auth()->id(),
            'type' => null,
            'status' => $status
        ]);


        if ($region instanceof Region) {


            $this->attach_roles_via_request($region, $request);

            $default_image = $request->input('image');

            if (isset($default_image)) {
                $this->attach_images($region, [$default_image]);
            }


            $base = $this->base_create_via_request($request, $region->id, get_class($region));

            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {

        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Region\Region $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Region\Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $roles = Role::where('slug' , '<>' , 'super')->latest()->get();
        $selected_roles = $region->roles()->get()->pluck('id')->toArray();
        return view('module.region.admin.edit', compact('region' , 'roles' , 'selected_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Model\Region\Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
        DB::beginTransaction();

        $request->validate([
            'title' => ['required'],

        ]);

        //  Status
        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }


        $region->update([
            'creator_id' => auth()->id(),
            'type' => null,
            'status' => $status
        ]);


        if ($region->save()) {

            $this->attach_roles_via_request($region, $request);


            $default_image = $request->input('image');

            if (isset($default_image)) {
                $this->attach_images($region, [$default_image]);
            }


            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
            ];
            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($region->base->id, $base_data);


            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Region\Region $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        DB::beginTransaction();
        $deleted = $region->delete();
        if ($region->trashed()) {
            DB::commit();
            toast(__('site.done'), 'success');
            return back();

        } else {
            DB::rollBack();
            toast(__('site.try_little_more'), 'error');
            return back();

        }
    }

    public function attach_roles_via_request($object, $request)
    {
        $roles = $request->input('roles');

        $admin = Role::select('id')->where('slug', 'super')->first();
        if (isset($roles) && !empty($roles)) {

            if (isset($admin) && !empty($admin)) {
               array_push($roles, $admin->id);

            } else {
               array_push($roles, 1);
            }


        } else {
            if (isset($admin) && !empty($admin)) {
                $roles = array($admin->id);
            } else {
                $roles = array(1);
            }



        }


        $object->roles()->sync($roles);

    }
}
