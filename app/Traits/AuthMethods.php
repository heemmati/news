<?php

namespace App\Traits;

use App\Model\Activation;
use App\Model\Setting\General;
use App\Notifications\ActivationCode;
use App\User;
use App\Utility\Acl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Modules\Address\Entities\Address;
use Modules\Address\Entities\City;
use Modules\Address\Entities\State;
use App\Model\Club\Club;
use App\Model\Plan\UserRolePlan;
use Modules\Plan\Traits\Plot;
use Modules\Shop\Traits\Unit;
use Modules\Shop\Traits\Wallet;

trait AuthMethods
{
    use ValidationHelper, ErrorMethods;

    public function find_and_send_activation($user_data, $password)
    {


        $email = $user_data['email'];
        $mobile = $user_data['mobile'];
        $user = $user_data['user'];


        if (isset($user) && !empty($user)) {

            if (isset($user->account_verification) && !empty($user->account_verification)) {

                return $this->failed_login(__('site.exist_account'));
            } else {

                $activation = $this->activation_send($email, $mobile, $user);
                if ($activation) {

                    return $this->return_and_session($email, $mobile, $user->id);
                }
            }
        } else {


            $activation = $this->activation_send($email, $mobile, $user);


            if ($activation) {


                return $this->create_user_and_session($email, $mobile, $password);
            }
        }


    }

    public
    function failed_login($message)
    {
        DB::rollBack();
        session(['error' => $message]);
        return back();
    }

    public
    function activation_send($email, $mobile, $user)
    {


        $activation = Activation::code($email, $mobile);


        if ($activation instanceof Activation) {
//            event(new Registeration($email, $activation->code));


            if (isset($user) && !empty($user)) {


                try {
                    Notification::send([$user], new ActivationCode($activation->code));

                } catch (\Exception $exception) {

                }
            } else {


                if (isset($email) && !empty($email)) {
                    try {
                        Notification::route('mail', $email)
                            ->notify(new ActivationCode($activation->code));
                    } catch (\Exception $exception) {

                    }
                } else {

                    try {

                        Notification::route(MobileChannel::class, $mobile)
                            ->notify(new ActivationCode($activation->code));

                    } catch (\Exception $exception) {

                    }
                }

            }


            return $activation;

        } else {
            return false;
        }

    }

    public
    function return_and_session($email, $mobile, $user_id)
    {
        try {
            DB::commit();
            $this->code_session_set($email, $mobile, $user_id);
            // $main_setting = General::where('section', 'main_setting')->where('lang', config('app.locale'))->first();
            return view('auth.verification');
        } catch (\Throwable $e) {
            return $this->show_error_view($e);
        }


    }

    public
    function code_session_set($email, $mobile, $user_id)
    {
        session(['email_verify' => $email]);
        session(['mobile_verify' => $mobile]);
        session(['user_id' => $user_id]);

    }

    public
    function create_user_and_session($email, $mobile, $password)
    {
        try {


            $signedIn = $this->create_new_user($email, $mobile, $password);


            if ($signedIn) {

                DB::commit();

                $this->code_session_set($email, $mobile, $signedIn->id);
               // $main_setting = General::where('section', 'main_setting')->where('lang', config('app.locale'))->first();

                return view('auth.verification', compact('main_setting'));
            }
        } catch (\Throwable $e) {
            // return $this->show_error_view($e);
        }


    }

    public
    function create_new_user($email, $mobile, $password)
    {
        $originality = 1;


        $signedIn = User::create([
            'email' => $email,
            'mobile' => $mobile,
            'password' => Hash::make($password),
            'role' => Acl::USER,

        ]);


        if ($signedIn instanceof User) {

            $signedIn->roles()->sync([Acl::USER]);


            return $signedIn;
        } else {
            return false;
        }

    }


    public
    function verify_code(Request $request)
    {

        try {
            DB::beginTransaction();

            /* Initial Variation */
            $email_session = $request->session()->get('email_verify');
            $mobile_session = $request->session()->get('mobile_verify');
            $user_id = $request->session()->get('user_id');
            $verify_code = $request->input('verify_code');
            $now = Carbon::now();


            $verify = $this->find_verification_row($email_session, $mobile_session, $now, $verify_code);

            if ($verify) {

                $user_verified = $this->verify_account($user_id, $now);
                $this->change_activation_usage($verify);
                if ($user_verified) {

                    DB::commit();

                    $main_setting = General::where('section', 'main_setting')->where('lang', config('app.locale'))->first();

                    /* TODO : COMPLETE REGISTER */


                    return $this->submit_user($user_id);

//                    return view('auth.choose-account', compact('main_setting'));


                } else {
                    DB::rollBack();
                    session(['error' => 'کد وارد شده صحیح نیست!']);
                    return back();
                }
            } else {
                $this->failed_login('کد وارد شده صحیح نیست!');
                return redirect()->route('register');
            }
        } catch (\Throwable $e) {
            dd($e);
        }


    }

    public
    function find_verification_row($email_session, $mobile_session, $now, $verify_code)
    {
        $verify = Activation::whereEmail($email_session)
            ->whereMobile($mobile_session)
            ->whereUsed('0')
            ->where('expire_date', '>', $now)
            ->whereCode($verify_code)
            ->first();

        if (isset($verify) && !empty($verify)) {
            return $verify;
        } else {
            return false;
        }
    }

    public
    function verify_account($user_id, $now)
    {

        $user = User::where('id', $user_id)->first();

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

    public
    function change_activation_usage($verify)
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

    public function submit_user($user_id)
    {


        DB::beginTransaction();
        $user = User::findOrFail($user_id);

        if (!empty($user) && isset($user)) {

            $user->update([
                'name' => $user->mobile
            ]);

            $user->save();

            $this->set_user_roles($user);
            if ($this->wallet($user)) {


                Auth::loginUsingId($user->id);
                DB::commit();

                alert()->success(__('site.done'),
                    'حساب کاربری شما به موفقیت تکمیل شد!'
                );
                return redirect()->route('admin.panel');

            } else {
                dd('INJA WALL');
                DB::rollBack();
                return redirect('register');
            }
        } else {
            DB::rollBack();
            return redirect('register');
        }


    }

    public
    function set_user_roles($user)
    {

        /* Set Roles */

        $user->roles()->sync([Acl::USER]);
        $club_id = $this->get_club_id(Acl::USER);
        $this->set_user_club($user, $club_id);
        $this->set_user_notifictions($user, $club_id);


    }

    public
    function get_club_id($account_type)
    {
        if ($account_type == Acl::USER) {
            return Acl::CLUB;
        }

        if ($account_type == Acl::MARKETER) {
            return Acl::MCLUB;

        }

        if ($account_type == Acl::SELLER) {
            return Acl::SCLUB;
        }
    }

    public
    function set_user_club($user, $club_id)
    {
        $user->clubs()->sync([$club_id]);
    }

    public
    function set_user_notifictions($user, $club_id)
    {
        $club = Club::whereId($club_id)->first();
        if (isset($club) && !empty($club)) {
            $announces = $club->announcements()->pluck('announcement_id')->toArray();
            $user->announcements()->sync($announces);
        }


    }

    protected
    function wallet($user)
    {
        $saved = $user->wallet()->create([
            'rewards' => Wallet::FIRST,
            'money' => 0,
            'unit' => Unit::TOMAN,
            'unit2' => Unit::DOLLAR,
            'money2' => 0,
        ]);

        return true;
    }

    public
    function user_update($user, $request, $avatar = null)
    {

        $user_data = [
            'name' => $request->input('name'),
            'role' => $request->input('account'),
            'username' => $request->input('username'),

            'email' => $request->input('email'),

            'avatar' => $avatar,
        ];


        if (!empty($request->input('mobile'))) {
            $user_data['mobile'] = $request->input('mobile');
        } elseif (!empty($request->input('email'))) {
            $user_data['email'] = $request->input('email');
        }


        $user->update($user_data);

        if ($user->save()) {


            return true;
        } else {
            return false;
        }


    }

    public
    function set_seller_plan_usage($user)
    {


        $plan_save = $user->plans()->create([
            'plan_id' => Plot::SELLER_FREE,
            'role_id' => $user->role
        ]);

        if ($plan_save instanceof UserRolePlan) {

            $plots = \App\Model\Plan\Plot::where('plan_id', $plan_save->plan_id)->get();
            foreach ($plots as $plot) {
                $user->usages()->create([
                    'permission_id' => $plot->permission_id,
                    'start_date' => Carbon::now(),
                    'usage_count' => 0,
                ]);
            }
        }
    }

    public
    function set_first_address($user, $request, $country_id)
    {
//        dd($user->mobile);
        $address = Address::create([
            'user_id' => $user->id,
            'state_id' => $request->input('state_id'),
            'country_id' => $country_id,
            'city_id' => $request->input('city_id'),
            'title' => 'آدرس پیشفرض',
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'name' => $user->name,
            'melli_code' => $user->details->melli_code,
            'mobile' => $user->mobile,
            'address' => $request->input('address'),
            'postalcode' => $request->input('postalcode'),
        ]);


        if ($address instanceof Address) {
            return $address;
        } else {
            return false;
        }
    }

    public
    function set_marketer_parent($parent_id)
    {
        if (isset($parent_id) && !empty($parent_id)) {
            $parent_id = $parent_id;
        } else {
            $parent_id = 1;
        }

        return $parent_id;

    }

    public
    function contract()
    {
        $user_id = session('user_id');
        $user = User::findOrFail($user_id);
        if (isset($user) && !empty($user)) {
          $main_setting = General::where('section', 'main_setting')->where('lang', config('app.locale'))->first();

            $contract = General::where('section', 'contracts')->where('lang', config('app.locale'))->first();
            if ($user->person_type == Acl::REAL) {
                return view('auth.contract-real', compact('contract', 'main_setting', 'user'));
            } else if ($user->person_type == Acl::LEGAL) {
                $contract = General::where('section', 'contracts')->where('lang', config('app.locale'))->first();

                return view('auth.contract-legal', compact('contract', 'main_setting', 'user'));
            } else {
                return redirect()->route('register');
            }
        } else {
            return redirect()->route('register');
        }

    }

    public
    function agreement(Request $request)
    {
        $user_id = session('user_id');
        $user = User::findOrFail($user_id);
        if (isset($user) && !empty($user)) {
            $user->update([
                'contract_verification' => Carbon::now()
            ]);
            if ($user->save()) {
                Auth::loginUsingId($user_id);
                alert()->success('تبریک!', 'شا ما با شرکت دیجی آفاق به توافق رسیده اید!');
                return redirect()->intended();
            }
        }
    }

    public
    function get_state(Request $request)
    {
        if (is_numeric($request->id)) {
            $items = State::where('country_id', $request->id)->get();
            $returnHTML = view('admin.helpers.get_items', compact('items'))->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public
    function get_city(Request $request)
    {
        if (is_numeric($request->id)) {
            $items = City::where('state_id', $request->id)->get();
            $returnHTML = view('admin.helpers.get_items', compact('items'))->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    /**
     * Find User With Mobile Or Email
     * @param $enterance
     * @return bool
     */
    public
    function find_user_by_enterance($enterance)
    {
        try {
            $data = [];
            $data['user'] = null;

            if (isset($enterance) && !empty($enterance)) {


                if ($this->is_valid_mobile($enterance)) {


                    $data['user'] = User::where('mobile', $enterance)->first();

                    $data['email'] = null;

                    $data['mobile'] = $enterance;


                } else if (filter_var($enterance, FILTER_VALIDATE_EMAIL)) {
                    $data['user'] = User::where('email', $enterance)->first();

                    /* Set */
                    $data['email'] = $enterance;
                    $data['mobile'] = null;


                } else {
                    return false;
                }


                return $data;
            }
        } catch (\Throwable $e) {
            return $this->global_error($e);
        }


    }

}
