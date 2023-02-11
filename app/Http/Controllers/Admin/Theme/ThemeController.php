<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Miracles\Crud;
use App\Model\Theme\Theme;
use App\Model\Role;
use App\Traits\Base\BaseRepository;
use App\Traits\Image\ImageHelper;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{


    public function index()
    {
        $themes = Theme::latest()->get();
       return view('module.theme.admin.list' , compact('themes'));
    }


    public function create()
    {

        return view('module.theme.admin.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string' ,
            'path' => 'required|string' ,
        ]);

        DB::beginTransaction();

        $theme = Theme::create([
            'title' => $request->input('title') ,
            'path' => $request->input('path') ,
            'status' => 1 ,
        ]);
        if ($theme instanceof Theme){

            DB::commit();
            toast(__('site.done') , 'success');
            return back();
        }
        else{
            DB::rollBack();
            toast(__('site.failed') , 'error');
            return back();
        }

    }


    public function show(Theme $theme)
    {
        abort(404);
    }


    public function edit(Theme $theme)
    {

    }


    public function update(Request $request, Theme $theme)
    {

    }

}
