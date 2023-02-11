<?php

namespace App\Http\Controllers\Admin\Language;

use App\Model\Language\Word;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Language\Lang;
use App\Model\Language\Translate;

use App\Repositories\Language\TranslateRepository;

class TranslateController extends Controller
{
    use Breadcrumb;
    protected $repository;

    public function __construct()
    {
        $this->repository = new TranslateRepository();
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
        DB::beginTransaction();
        $request->validate([
            'lang_id' => ['required'],
            'word_id' => ['required'],
            'title' => ['required']
        ]);

        $data = [
            'creator_id' => auth()->id(),
            'lang_id' => $request->input('lang_id'),
            'word_id' => $request->input('word_id'),
            'title' => $request->input('title')
        ];

        $translate = $this->repository->store($data);
        if ($translate) {
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
        return view('module.language.show');
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
        DB::beginTransaction();
        $request->validate([
            'lang_id' => ['required'],
            'word_id' => ['required'],
            'title' => ['required']
        ]);

        $data = [

            'lang_id' => $request->input('lang_id'),
            'word_id' => $request->input('word_id'),
            'title' => $request->input('title')
        ];

        $translate = $this->repository->update($id, $data);
        if ($translate) {
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

    public function groupEdit()
    {
        $breadcrumbs = $this->breadcrumb_generator('translates.group.edit');
        $langs = Lang::where('status', 1)->get();
        $words = Word::latest()->get();
        return view('module.language.admin.translate.group', compact('langs', 'words', 'breadcrumbs'));
    }

    public function groupUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $words = $request->input('word');
            if (isset($words) && !empty($words) && count($words) > 0) {
                foreach ($words as $key => $word) {
                    if (isset($key) && is_numeric($key)) {
                        foreach ($word as $lang => $translate) {
                            if (isset($lang) && is_numeric($lang)) {

                                $trans_word = Translate::where('word_id', $key)->where('lang_id', $lang)->first();


                                if (isset($trans_word) && !empty($trans_word)) {
                                    $trans_word->update([
                                        'title' => $translate
                                    ]);
                                    $trans_word->save();
                                }
                                else{

                                    $new_translate = Translate::create([
                                        'creator_id' => auth()->id() ,
                                        'word_id' => $key ,
                                        'lang_id' => $lang ,
                                        'title' => $translate
                                    ]);


                                }
                            }
                        }
                    }

                }
            }
            else {
                DB::rollBack();
                toast('با مشکل مواجه شد!', 'error');
                return back();
            }

            DB::commit();
            toast('انجام شد!', 'success');
            return back();


        } catch (\Exception $exception) {
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();
        }


    }
}
