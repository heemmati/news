<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lubricator\ControllerLuber;
use App\Lubricator\ViewController;
use App\Utility\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $lub , $class;

    public function __construct($class)
    {
      $this->class = $class;

        $this->lub = new ControllerLuber($this->class);

    }

    public function index()
    {
        //
       return $this->lub->controller_lub();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->lub->create_lub();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->lub->store_lub($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->lub->show_lub($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->lub->edit_lub($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return $this->lub->update_lub($request , $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return $this->lub->destroy_lub($id);
    }


    public function get_ajax(Request $request)
    {

        if( is_numeric( $request->id )){
            $items = $request->model::where($request->goal_id , $request->id)->get();
            $returnHTML = view('admin.helpers.'.$request->type , compact('items'))->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
    }

    public function get_sub_children(Request $request){
        $class = $request->class;

//        $inputs = $class->getFormables() ;
        return response()->json(array('success' => true, 'html'=> $request->helper));

        ViewController::sub_children();
    }

    public function status($id , $model){
      return $this->lub->status($id , $model);
    }






}
