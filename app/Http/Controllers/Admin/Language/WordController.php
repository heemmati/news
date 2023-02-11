<?php

namespace App\Http\Controllers\Admin\Language;

use App\Model\Language\Word;
use App\Model\Base\Base;
use App\Model\News\Article;
use App\Model\Reword\Reword;
use App\Model\Language\WordGroup;
use App\Traits\Breadcrumb;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Jobs\Rewording;
use App\Repositories\Language\WordRepository;

class WordController extends Controller
{
    use Breadcrumb;
    protected $repository;

    public function __construct()
    {
        $this->repository = new WordRepository();
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
        //
        $request->validate([
            'word_group_id' => ['required'],
            'title' => ['required'],
            'code' => ['required'],
        ]);


        $data = [
            'creator_id' => auth()->id(),
            'word_group_id' => $request->input('word_group_id'),
            'title' => $request->input('title'),
            'code' => $request->input('code')
        ];

        $word = $this->repository->store($data);

        if ($word) {

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
        $request->validate([
            'word_group_id' => ['required'],
            'title' => ['required'],
            'code' => ['required'],
        ]);


        $data = [

            'word_group_id' => $request->input('word_group_id'),
            'title' => $request->input('title'),
            'code' => $request->input('code')

        ];

        $word = $this->repository->update($id, $data);

        if ($word) {

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

    public function groupCreate()
    {
        $breadcrumbs = $this->breadcrumb_generator('words.create');
        $word_groups = WordGroup::latest()->get();
        return view('module.language.admin.word.group', compact('breadcrumbs', 'word_groups'));
    }

    public function groupStore(Request $request)
    {

        DB::beginTransaction();

        try {
            $words = $request->input('word');
            $codes = $request->input('code');
            $word_group = $request->input('word_group');

            if (!isset($word_group) || empty($word_group)) {
                $word_group = 1;
            }

            $word_codes = array_combine($words, $codes);

            if (isset($words) && !empty($words) && isset($codes) && !empty($codes)) {
                $word_codes = array_combine($words, $codes);
                foreach ($word_codes as $word => $code) {
                    if (isset($word) && !empty($word) && !empty($code) && isset($code)){
                        Word::create([
                            'creator_id' => auth()->id(),
                            'word_group_id' => $word_group,
                            'title' => $word,
                            'code' => $code
                        ]);
                    }

                }

                DB::commit();
                toast('انجام شد!', 'success');
                return back();

            }
            else{
                DB::rollBack();
                toast('با مشکل مواجه شد!', 'error');
                return back();
            }
        } catch (\Exception $e) {

            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();

        }


    }
    
    public function regroupCreate(){
        $breadcrumbs = $this->breadcrumb_generator('words.create');

        return view('module.reword.group', compact('breadcrumbs'));
    }
    
        public function regroupStore(Request $request)
    {

  

        try {
            $words = $request->input('word');
            $trans = $request->input('tran');
         

          

            if (isset($words) && !empty($words) && isset($trans) && !empty($trans)) {

                foreach ($words as $key => $word) {
                                if (isset($word) && !empty($word) && isset($trans[$key]) && !empty($trans[$key])) {

                  Rewording::dispatch($word ,$trans[$key] );
                
                  
                   
                                }

                }

              
             toast(__('site.done') , 'success');
                return back();

            }
            else{
                DB::rollBack();
                toast('با مشکل مواجه شد!', 'error');
                return back();
            }
        } catch (\Exception $e) {
dd($e->getMessage());
            DB::rollBack();
            toast('با مشکل مواجه شد!', 'error');
            return back();

        }


    }
    
    
}
