<?php

namespace App\Http\Controllers\Admin\Journal;

use App\Http\Controllers\Controller;
use App\Model\ImageBox\ImageBox;
use App\Model\Journal\Journal;
use App\Traits\Base\BaseRepository;
use App\Traits\Breadcrumb;
use App\Traits\Tag\TagHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JournalController extends Controller
{
    use Breadcrumb, TagHelper, BaseRepository;

    public function index()
    {
        $journals = Journal::latest()->paginate(15);
        $breadcrumbs = $this->breadcrumb_generator('journals.index');
        return view('module.journal.admin.index', compact('journals', 'breadcrumbs'));
    }

    public function create()
    {
        $breadcrumbs = $this->breadcrumb_generator('journals.create');
        return view('module.journal.admin.create', compact('breadcrumbs'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $request->validate([
            'title' => ['required', 'max:255'],
            'entitle' => ['nullable', 'max:255'],
            'imagebox' => ['required'],
        ]);


        $redirected = $request->input('redirect');

        //  Status
        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }

        $journal = Journal::create([
            'user_id' => auth()->id(),
            'status' => $status,

        ]);


        if ($journal instanceof Journal) {
            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'short' => Str::random(6),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
                'image' => $request->input('image'),
                'baseable_id' => $journal->id,
                'baseable_type' => get_class($journal),
            ];

            $tag = $this->connect_object_tag_via_request($journal, $request);


            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->store($base_data);

            $imagebox = $request->input('imagebox');

            if (isset($imagebox) && !empty($imagebox) && count($imagebox)) {
                foreach ($imagebox as $image) {
                    ImageBox::create([
                        'image_boxable_id' => $journal->id,
                        'image_boxable_type' => get_class($journal),
                        'src' => $image

                    ]);
                }

            }

            DB::commit();
            toast('انجام شد!', 'success');


            return back();


        } else {

        }

    }


    public function edit(Journal $journal)
    {
        $breadcrumbs = $this->breadcrumb_generator('journals.edit');
        return view('module.journal.admin.edit', compact('breadcrumbs', 'journal'));
    }

    public function update(Request $request, Journal $journal)
    {

        DB::beginTransaction();
        $request->validate([
            'title' => ['required', 'max:255'],
            'entitle' => ['nullable', 'max:255'],
            'imagebox' => ['required'],
        ]);


        $redirected = $request->input('redirect');

        //  Status
        if (!empty($request->input('status'))) {

            $status = $request->input('status');
        } else {
            $status = 0;
        }


        $journal->update([
            'status' => $status
        ]);


        if ($journal->save()) {
            $base_data = [
                'title' => $request->input('title'),
                'entitle' => $request->input('entitle'),
                'description' => $request->input('description'),
                'body' => $request->input('body'),
            ];

            $tag = $this->connect_object_tag_via_request($journal, $request);


            $base_rep = new \App\Repositories\Base\BaseRepository();
            $base = $base_rep->update($journal->base->id, $base_data);


            $journal->images()->delete();

            $imagebox = $request->input('imagebox');


            if (isset($imagebox) && !empty($imagebox) && count($imagebox)) {
                foreach ($imagebox as $image) {
                    ImageBox::create([
                        'image_boxable_id' => $journal->id,
                        'image_boxable_type' => get_class($journal),
                        'src' => $image

                    ]);
                }

            }

            DB::commit();
            toast('انجام شد!', 'success');


            return back();


        } else {

        }


    }

    public function show()
    {

    }

    public function destroy(Journal $journal)
    {

        if ($journal->delete()) {
            DB::commit();
            toast(__('site.done'), 'success');
        } else {
            DB::rollback();
            toast(__('site.failed'), 'error');
        }

        return back();
    }
}
