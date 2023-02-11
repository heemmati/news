<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AbstractExport;
use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\AbstractImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class ImportController extends Controller
{
    //

    public function abstracts()
    {


        return view('admin.abstract_import');
    }

    public function export_abstract()
    {
       return Excel::download(new ProductExport , 'products.csv');
    }
    public function import_abstract(Request $request){



        DB::beginTransaction();
        if ($request->hasFile('abstracts')) {
            $excel = $request->file('abstracts');

            // Get Real Path
            try{
                $path = $excel->getRealPath();


                Excel::import(new AbstractImport() , $path );


                DB::commit();
                toast()->success('انجام شد!' , 'قیمت ها با موفقیت بروز شد');
                return back();


            }
            catch(\Exception $e){
                DB::rollBack();
                toast()->error('انجام نشد!' , 'ویرایش قیمت ها با مشکل مواجه شد!');
                return back();
            }



        }
        else{
            DB::rollBack();
            toast()->error('انجام نشد!' , 'ویرایش قیمت ها با مشکل مواجه شد!');
            return back();
        }




    }



    public function upload_file($file ){
        $file =  $file;
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/files');
        $file->move($destinationPath, $name);
        $this->save();

        return back()->with('success','Image Upload successfully');
    }
}
