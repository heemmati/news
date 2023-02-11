<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Model\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //

    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        DB::beginTransaction();

        $contact = Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),

        ]);
        if ($contact instanceof Contact) {

            DB::commit();
            alert()->success('انجام شد', ' پیام شما  با موفقیت ارسال شد!');
            return redirect()->route('site.contact');
        } else {
            DB::rollBack();
            alert()->error('خطا', ' ارسال پیام با خطا مواجه شد!  ');
            return back();
        }
    }

}
