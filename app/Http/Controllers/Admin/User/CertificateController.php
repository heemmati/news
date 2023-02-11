<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Utility\Acl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\User\Certificate;
use App\Model\User\CutCo;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        \App\services\Watch::update_to_watched(auth()->id() , Certificate ::class);
        $certificates = Certificate::latest()->get();
        return view('user::admin.certificate.list' , compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::admin.certificate.crate');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $certificate = Certificate::findOrFail($id);
        $user = $certificate->user;
        return view('user::admin.certificate.show' , compact('certificate' , 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('user::admin.certificate.create' , compact('certificate'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);

        $certificate->update([
            'user_id' => auth()->id() ,
            'status' => 0
        ]);

        $user = auth()->user();
        if (Acl::isReal($user->id)){
            $user->details->update([
                'melli_card' => $request->input('melli_card') ,
                'personal' => $request->input('personal') ,
            ]);
            if ($user->details->save()){
                DB::commit();
                \App\services\Watch::create_watches(true, null , $user);
                alert()->success('انجام شد', 'مدارک با موفقیت ارسال شد');
                return redirect()->route('admin.panel');
            }
            else{
                DB::rollBack();
                alert()->error('خطا', 'ارسال مدارک با شکست مواجه شد!');
                return back();
            }
        }
        else{
            $user->details->update([
                'newspaper' => $request->input('newspaper') ,
                'statute' => $request->input('statute') ,
                'certificate' => $request->input('certificate') ,
            ]);
            if ($user->details->save()){
                DB::commit();
                alert()->success('انجام شد', 'مدارک با موفقیت ارسال شد');
                return redirect()->route('admin.panel');
            }
            else{
                DB::rollBack();
                alert()->error('خطا', 'ارسال مدارک با شکست مواجه شد!');
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     *
     */
    public function destroy($id)
    {
        //
    }

    public function confirm(Request $request)
    {
       $status = $request->input('status');
       $certificate_id = $request->input('certificate_id');
        $certificate = Certificate::findOrFail($certificate_id);
        $user = $certificate->user;
        DB::beginTransaction();
        $now = Carbon::now();
       if ($status == 1){
           $user->update([
               'certificate_verification' => $now
           ]);
           if ($user->save()){
               $certificate->update([
                   'status' => 1 ,
                   'message' => $request->input('message')
               ]);
               if ($certificate->save()){
                   DB::commit();
                   alert()->success('انجام شد', 'مدارک با موفقیت تایید شد');
                   return redirect()->route('certificates.index');
               }
               else{
                   DB::rollBack();
                   alert()->error('خطا', 'تایید مدارک با مشکل مواجه شد');
                   return redirect()->back();
               }
           }
           else{
               DB::rollBack();
               alert()->error('خطا', 'تایید مدارک با مشکل مواجه شد');
               return redirect()->back();
           }


       }
       else{
           $certificate->update([
               'status' => 2 ,
               'message' => $request->input('message')
           ]);
           if ($certificate->save()){
               DB::commit();
               alert()->success('انجام شد', 'مدارک با موفقیت رد شد');
               return redirect()->route('certificates.index');
           }
           else{
               DB::rollBack();
               alert()->error('خطا', 'رد مدارک با مشکل مواجه شد');
               return redirect()->back();
           }
       }
    }
}
