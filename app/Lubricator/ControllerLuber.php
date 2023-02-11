<?php


namespace App\Lubricator;


use App\Events\ShowModelEvent;
use App\Events\StoreModelEvent;
use App\Events\UpdateModelEvent;
use App\services\GalleryServices;
use App\services\TagServices;
use App\Traits\ImageUploader;
use App\Traits\Luber;
use App\Utility\Acl;
use App\Utility\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ControllerLuber
{
    use ImageUploader , Luber;
    protected $class, $route_name, $inputs, $user, $listables;

    public function __construct($class)
    {

        $this->class = $class;
        $this->route_name = $class->getRoute();
        $this->inputs = $this->class->getFormables();
        $this->listables = $this->class->getListables();
        $this->insertable = $this->class->getInsertable();
        $this->showable = $this->class->getShowables();
        $this->user = Auth::user();
        App::setLocale('fa');
    }

    public function controller_lub()
    {
        $parent_id = $this->get_capture('parent_id');
        $route_name = $this->route_name;
        $listables = $this->listables;
        $collection = $this->get_collection($this->class , $this->route_name , $parent_id);
        $insertable = $this->get_insertable($this->inputs);

        return view('admin.common.list',
            compact(
                'collection',
                'listables',
                'route_name',
                'parent_id',
                'insertable'
            ));

    }

    public function show_lub($id)
    {
        if (!empty($this->class->getShow())) {


            $object = $this->class::findOrFail($id);
            $view = $this->class->getShow();
            event(new ShowModelEvent($object));
            return view($view[0], compact('object'));
        }

        if (isset($this->showable) && !empty($this->showable)) {
            $insertable = false;
            $object = $this->class::findOrFail($id);
            $shows = $this->showable;
            $route_name = $this->route_name;

            return view('admin.common.show', compact('shows', 'route_name', 'object', 'insertable'));

        } else {
            $this->alert_admin('error', __('admin.error_message_title'), __('routes.' . $this->route_name . '_singular'), __('routes.create_action'), __('admin.error_message'));
            return redirect()->route('admin.panel');
        }


    }

    public function alert_admin($type, $title, $route_name, $action_name, $message, $message2 = '')
    {

        if ($type == 'error') {

            alert()->error($title,
                $action_name . ' ' . $route_name . ' ' . $message
            )->persistent('باشه');
        }
        else {

            alert()->success($title,
                $route_name . ' ' . $message . ' ' . $action_name . ' ' . $message2
            )->persistent('باشه');
        }

    }

    public function create_lub()
    {

        if (isset($this->inputs) && !empty($this->inputs)) {
            self::validator_generator($this->inputs);
            $inputs = $this->inputs;
            $insertable = true;
            $route_name = $this->route_name;
            $model_name = $this->class;
            $parent_id = $this->get_capture('parent_id');

            if (!isset($parent_id) || empty($parent_id)) {
                $insertable = false;
                $parent_id = NULL;
                if (!empty($this->class->getParentables())) {
                    $this->alert_admin('error', __('admin.error_message_title'), __('routes.' . $route_name . '_singular'), __('routes.create_action'), __('admin.error_message'));
                    return redirect()->route('admin.panel');
                }
            }

            return view('admin.common.create', compact('inputs', 'route_name', 'parent_id', 'insertable', 'model_name'));
        }
        else {
            $this->alert_admin('error', __('admin.error_message_title'), __('routes.' . $this->route_name . '_singular'), __('routes.create_action'), __('admin.error_message'));
            return redirect()->route('admin.panel');
        }

    }

    public function validator_generator($list)
    {
        $validator = array();
        foreach ($list as $key => $item) {
            if ($item[0] == '1') {
                $validator[$key] = ['required'];
            }
        }

        return $validator;


    }

    public function store_lub($request)
    {
        $validatedData = $request->validate(self::validator_generator($this->inputs));

        DB::beginTransaction();

        $array = $this->request_merge($request, 'store');


        if (!empty(Auth::id())) {
            $array['user_id'] = Auth::id();
        } else {
            $array['user_id'] = '1';
        }

        $save = $this->class::create($array);

        if ($save instanceof $this->class) {
            if (!empty($this->class->getParentables())) {
                DB::commit();
                event(new StoreModelEvent($this->class, $save, $array));
                $this->alert_admin('success', __('admin.success_message_title'), __('routes.' . $this->route_name . '_singular'), __('routes.store_action'), __('admin.success_message'), __('admin.success_message2'));
                return redirect()->route($this->route_name . '.index', ['parent_id' => $request->input($this->class->getParentables())]);
            } else {

                if (!empty($this->inputs['morphable'])) {
                    foreach ($this->inputs['morphable'] as $morph) {
                        if ($morph[1] == 'gallery') {

                            GalleryServices::insertArrayImage($save, $request->file($morph[1]), $save->user_id);
                        }

                    }
                }
                DB::commit();

                event(new StoreModelEvent($this->class, $save, $array));
                return $this->success_functions($this->route_name, 'create');
            }

        } else {
            return $this->error_functions($this->route_name, 'create');
        }
    }

    public function request_merge($request, $method)
    {

        $data = $request->all();
        $items = $this->inputs;
        if ($method == 'update') {
            $items = self::unset_array($items, 'hidden');
//            unset($items['hidden']);
        }


        foreach ($items as $key => $item) {


            if (in_array('access', $item) && !Acl::isSuperAdmin(auth()->id())) {
                unset($items[$key]);
            }

            if ($key == 'status' || auth()->user()->can('panel.change.status')) {
                unset($items['status']);
            }

            if (isset($item[1]) && !empty($item[1])){
                if ($item[1] == 'image' OR $item[1] == 'file') {

                    if (isset($data[$item[1]]) && !empty($data[$item[1]])){
                        $uploaded_file = $this->imageUpload($request, $key);
                        $data[$key] = $uploaded_file;
                    }
                    else{
                        unset($items[$item[1]]);
                    }

                }
            }


        }


//        self::unset_array($items, 'morphable');


        return array_merge($items, $data);
    }

    public function unset_array($items, $target)
    {

        foreach ($items as $key => $item) {
            if (isset($item[1]) && !empty($item[1])){
                if ($item[1] == $target) {

                    unset($items[$key]);
                    break;

                }
            }

        }
        return $items;
    }

    public function success_functions($route_name, $action_name)
    {
        DB::commit();
        $this->alert_admin('success', __('admin.success_message_title'), __('routes.' . $route_name . '_singular'), __('routes.' . $action_name . '_action'), __('admin.success_message'), __('admin.success_message2'));
        //return redirect()->route($route_name . '.index');
        return back();
    }

    public function error_functions($route_name, $action_name)
    {
        DB::rollBack();
        $this->alert_admin('error', __('admin.error_message_title'), __('routes.' . $route_name . '_singular'), __('routes.' . $action_name . '_action'), __('admin.error_message'));
        return back();
    }

    public function edit_lub($id)
    {

        if (isset($this->inputs) && !empty($this->inputs)) {
            $insertable = true;
            $object = $this->class::findOrFail($id);
            $inputs = $this->inputs;
            $route_name = $this->route_name;
            $model_name = $this->class;
            return view('admin.common.create', compact('inputs', 'route_name', 'object', 'insertable', 'model_name'));
        } else {
            $this->alert_admin('error', __('admin.error_message_title'), __('routes.' . $this->route_name . '_singular'), __('routes.create_action'), __('admin.error_message'));
            return redirect()->route('admin.panel');
        }


    }

    public function destroy_lub($id)
    {

        DB::beginTransaction();

        $item = $this->class::findOrFail($id);

        $deletedCat = $item->delete();

        if ($item->trashed()) {
            return $this->success_functions($this->route_name, 'destroy');
        } else {
            return $this->error_functions($this->route_name, 'destroy');
        }
    }

    public function update_lub($request, $id)
    {

        $item = $this->class::findOrFail($id);

        DB::beginTransaction();
        $array = $this->request_merge($request, 'update');


        $saved = $item->update($array);
        if ($item->save()) {

            if (!empty($this->inputs['morphable'])) {
                foreach ($this->inputs['morphable'] as $morph) {

                    if ($morph[1] == 'gallery') {
                        GalleryServices::updateArrayImage($item, $request->file($morph[1]), $item->user_id);
                    }
//                    elseif ($morph[1] == 'tags') {
//                        TagServices::updateArrayTag($item, $request->input($morph[1]), $item->user_id);
//                    }
                }
            }

            event(new UpdateModelEvent($this->class, $item, $array));

            return $this->success_functions($this->route_name, 'update');
        }
        else {
            return $this->error_functions($this->route_name, 'update');
        }
    }

    public function status($id, $model)
    {

        $mclass = new $model;
        if (is_numeric($id)) {

            $item = $model::findOrFail($id);
            if ($item->count() > 0) {
                if (Status::is_last_status($item->status)) {
                    $newStatus = ['status' => Status::set_first_status()];
                } else {
                    $newStatus = ['status' => $item->status + 1];
                }


            } else {
                return $this->error_functions($mclass->getRoute(), 'status');
            }
        } else {
            return $this->error_functions($mclass->getRoute(), 'status');
        }

        $changedStatus = $item->update($newStatus);

        if ($item->save()) {
            return $this->success_functions($mclass->getRoute(), 'status');
        }
        else {
            return $this->error_functions($mclass->getRoute(), 'status');
        }

    }


}
