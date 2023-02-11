<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Payam\PayamFactory;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Traits\Image\ImageHelper;
use App\Model\Setting\General;
use App\Model\Setting\GeneralItem;
use App\Repositories\Setting\GeneralItemRepository;
use App\Utility\Setting\GeneralType;

class GeneralItemController extends Controller
{
    use ImageHelper, Breadcrumb;

    public $payam;
    protected $repository;

    public function __construct()
    {
        $this->repository = new GeneralItemRepository();
        $message = new PayamFactory();
        $this->payam = $message->go();
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index()
    {
        return $this->repository->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return $this->repository->create();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'general_id' => ['required'],
            'title' => ['required'],
            'code' => ['required'],

        ]);

        $data = [
            'creator_id' => auth()->id(),
            'general_id' => $request->input('general_id'),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'type' => $request->input('general_type'),
            'value' => $request->input('value'),
        ];

        $general_item = $this->repository->store($data);

        if ($general_item) {

            if ($data['type'] == GeneralType::IMAGE) {
                $default_image = $request->input('value');
                if (isset($default_image)) {
                    $this->attach_images($general_item, [$default_image]);
                }

            }


            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'general_id' => ['required'],
            'title' => ['required'],
            'code' => ['required'],
            'value' => ['required'],

        ]);


        $data = [
            'general_id' => $request->input('general_id'),
            'title' => $request->input('title'),
            'code' => $request->input('code'),
            'value' => $request->input('value'),
        ];

        $general_item = $this->repository->update($id, $data);

        if ($general_item) {

            if ($general_item->type == GeneralType::IMAGE) {
                $default_image = $request->input('value');

                if (isset($default_image)) {
                    $this->attach_images($general_item, [$default_image]);
                }

            }


            DB::commit();
            toast('انجام شد!', 'success');
            return back();

        } else {

            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $deleted = $this->repository->destroy($id);
        if ($deleted) {
            DB::commit();
            toast('انجام شد!', 'success');
            return back();
        } else {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }
    }

    public function get_general_input(Request $request)
    {
        $id = $request->id;
        if (isset($id) && is_numeric($id) && !empty($id)) {
            $view = $this->view_type_via_id($id);
        }
        return response()->json(array('success' => true, 'html' => $view));

    }


    public function create_bunch()
    {
        $generals = General::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('general-items.bunch.create');
        return view('module.setting.admin.generalitem.createmany', compact('breadcrumbs', 'generals'));

    }

    public function store_bunch(Request $request)
    {

        try {

            $request->validate([
                'general_id' => ['required']
            ]);


            $titles = $request->input('title');
            $general_id = $request->input('general_id');

            if (!isset($general_id) or empty($general_id)) {
                DB::rollBack();
                return $this->payam->error();
            }

            $codes = $request->input('code');
            $inputs = $request->input('general_type');

            if (isset($titles) && !empty($titles) && count($titles) > 0) {
                foreach ($titles as $key => $title) {

                    if (isset($title) && !empty($title)) {

                        $general_item = GeneralItem::create([
                            'creator_id' => auth()->id(),
                            'general_id' => $general_id,
                            'title' => $title,
                            'code' => $codes[$key],
                            'type' => $inputs[$key],
                        ]);

                        if (isset($general_item) && !empty($general_item)) {

                        } else {

                        }

                    }

                }

                DB::commit();
                return $this->payam->success();

            } else {
                DB::rollBack();
                return $this->payam->error();
            }

        } catch (\Exception $exception) {
            DB::rollBack();
            report($exception);
            return $this->payam->error();
        }

    }

    public function edit_bunch()
    {
        $generals = General::latest()->get();
        $general_items = GeneralItem::latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('general-items.bunch.edit');
        return view('module.setting.admin.generalitem.editmany', compact('breadcrumbs', 'generals', 'general_items'));

    }

    public function update_bunch(Request $request)
    {
        dd($request->all());
    }

    public function view_type_via_id($id)
    {


        $type = 'تنظیمات';
        $name = 'value';
        $namefa = 'مقدار';
        $require = 1;

        $input = $this->get_general_input($id);
        $view = view($input, compact(
            'type', 'name', 'namefa', 'require'
        ))->render();

        return $view;


    }

    public function get_input_name($id)
    {
        $input = GeneralType::get_input($id);
        return $input;
    }

}
