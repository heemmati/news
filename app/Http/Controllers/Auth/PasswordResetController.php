<?php

namespace App\Http\Controllers\Auth;

use App\Events\Registeration;
use App\Events\ResetPassword;
use App\Http\Controllers\Controller;
use App\Model\Activation;
use App\Traits\AuthMethods;
use Carbon\Carbon;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    //
    use AuthMethods;

    public function reset_page(){

        return view('auth.passwords.reset');
    }

    public function email_set(Request $request)
    {
        $enterance = $request->input('enterance');


        $user_data = $this->find_user_by_enterance($enterance);

        $user = $user_data['user'];
        $email = $user_data['email'];
        $mobile = $user_data['mobile'];

        if (isset($user) && !empty($user)){
            
            if (isset($email) || isset($mobile)){
                /* Code Generator */
                $activation = $this->activation_send($email , $mobile , $user);
                if ($activation){

                    session(['email_verify' => $email]);
                    session(['mobile_verify' => $mobile]);
                    session(['user_id' => $user->id]);

                    return view('auth.passwords.verify');


                }
            }


        }
        else{
            
        }
        
        
       
    }


    public function verify_code(Request $request)
    {

        DB::beginTransaction();

        /* Initial Variation */
        $email_session = $request->session()->get('email_verify');
        $mobile_session = $request->session()->get('mobile_verify');
        $user_id = $request->session()->get('user_id');
        $verify_code = $request->input('verify_code');
        $now = Carbon::now();

        $now = Carbon::now();


        $verify = $this->find_verification_row($email_session, $mobile_session, $now, $verify_code);

        if ($verify) {

            $this->change_activation_usage($verify);


                DB::commit();

                return view('auth.passwords.reenter_password');

        }
        else {
            DB::rollBack();
            session(['error' => 'کد وارد شده صحیح نمی باشد']);
            return back();
        }


    }

 

    public function verify_account($user_id, $now)
    {


        $user = \App\User::where('id', $user_id)->first();

        if (!empty($user) && isset($user)) {

            $user->update([
                'account_verification' => $now
            ]);

            if ($user->save()) {
                return true;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    public function change_activation_usage($verify)
    {
        $verify->update([
            'used' => '1'
        ]);
        if ($verify->save()) {
            return true;
        } else {
            return false;
        }


    }

    public function change_password(Request $request)
    {



        $validatedData = $request->validate([
            'password' => ['required', 'min:8' , 'confirmed'],
        ]);


        $password = $request->input('password');

        $email_session = $request->session()->get('email_verify');
        $mobile_session = $request->session()->get('mobile_verify');
        $user_id = $request->session()->get('user_id');



        $user = \App\User::where('email' , $email_session)->orWhere('mobile' , $mobile_session)->first();
    
        if (isset($user) && !empty($user)){
            $user->update([
                'password' =>  Hash::make($password),
            ]);

            if ($user->save()){

               alert()->success('انجام شد' , 'رمز عبور با موفقیت تغییر یافت');
               return redirect()->route('login');
            }
        }
        else{
            toast('خطا!' , 'error');
            alert()->error(__('site.fail') , 'با خطا مواجه شد!');
            return back();
        }


    }
//
//    public function change_password_edit(){
//        return view()
//    }
}
