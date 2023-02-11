<?php


namespace App\Repositories\Page;


use App\Miracles\Crud;
use App\Model\Page\Page;
use App\Model\Portofolio\Portofolio;
use App\Model\Position\Position;

class PageRepository extends Crud
{
    public function __construct()
    {
        $this->model = Page::class;
    }

    public function index()
    {
        $breadcrumbs = $this->breadcrumb_generator('pages.create');
        $pages = $this->model::latest()->get();

        return view('module.page.admin.page.list', compact('pages', 'breadcrumbs'));
    }

    public function create()
    {
        $positions = Position::where('type', Page::class)->latest()->get();
        $breadcrumbs = $this->breadcrumb_generator('pages.create');
        return view('module.page.admin.page.create', compact('breadcrumbs','positions'));

    }

    public function edit($id)
    {
        $breadcrumbs = $this->breadcrumb_generator('pages.edit');
        $positions = Position::where('type', Page::class)->latest()->get();
        $page = $this->model::findOrFail($id);
        $selected_positions = $page->positions()->get()->pluck('id')->toArray();
        return view('module.page.admin.page.edit', compact('breadcrumbs', 'page' ,'positions' , 'selected_positions'));
    }
}
