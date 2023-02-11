<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Model\Activation;
use App\Model\Book;
use App\Model\General;

use App\Model\Image\Image;
use App\Model\LegalPerson;
use App\Model\Mission;
use App\Model\Permission;
use App\Model\Role;
use App\Repository\UserRepository;
use App\Traits\ImageUploader;
use App\User;
use App\Utility\Acl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\Address\Entities\Address;
use Modules\Address\Entities\Country;
use App\Model\Club\Club;
use App\Http\Controllers\Admin\Image\Image as EntitiesImage;
use App\Traits\Image\ImageHelper;
use App\Model\Plan\UserRolePlan;
use Modules\Plan\Traits\Plot;
use App\Model\User\UserDetail;

class UserController extends MainController
{


    use ImageUploader , ImageHelper;

    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        $request->validate([
            'name' => ['required'],
            'mobile' => ['required'],
            'password' => ['required','confirmed','min:6'],
        ]);


        $roles = $request->input('roles');
        $role = $request->input('role');


        $mobile = $request->input('mobile');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');

        $exist_mobile = User::where('mobile', $mobile)->first();
        $exist_email = User::where('email', $email)->first();
        $exist_username = User::where('username', $username)->first();


        if (isset($exist_mobile) && empty($exist_mobile)) {
            toast('شماره همراه وارد شده تکراری است!', 'error');
            return back();
        }
        if (isset($exist_email) && !empty($exist_email)) {
            toast('ایمیل وارد شده تکراری است!', 'error');
            return back();
        }
        if (isset($exist_username) && !empty($exist_username)) {
            toast('نام کاربری وارد شده تکراری است!', 'error');
            return back();
        }






        $data = [
            'name' => $request->input('name'),
            'username' => $username,
            'role' => $role,
            'email' => $email,
            'mobile' => $mobile,
            'password' => Hash::make($password),
            'avatar' => null ,
            'account_verification' => Carbon::now()

        ];


        $user = $this->repository->store($data);

        if( $user){

            $user->roles()->sync($roles);

            //  Image Avatar Saving ...
            $default_image = $request->input('avatar');

            if (isset($default_image) && !empty($default_image)) {

                $this->attach_images($user, [$default_image]);
               $image = Image::where('id' , $default_image)->first();
               $image = $image->src;


               $user_avatared = $user->update([
                'avatar' => $image
               ]);

               if($user->save()){

               }
               else{

               }


            }





//  Detail Creation
                $detail = UserDetail::create([
                    'user_id' => $user->id,
                    'melli_code' => $request->input('melli_code'),
                     'phone' => $request->input('melli_code'),
                      'address' => $request->input('address'),
                      'type' => $request->input('type'),
                       'mood' => $request->input('mood'),
                        'bio' => $request->input('bio'),
                        'birth_date' => $request->input('birth_date'),
                         'following' => $request->input('following'),
                          'follower' => $request->input('follower'),
                ]);

                if($detail instanceof UserDetail){
                    DB::commit();
                    toast(__('site.done'), 'success');
                    return redirect()->back();
                }
                else{
                    DB::rollBack();
                    toast(__('site.failed'), 'error');
                    return back();
                }


        }
        else{
            DB::rollBack();
                    toast(__('site.failed'), 'error');
                    return back();
        }

    }

    public function show($id)
    {
        //
        $user = User::findOrFail($id);

        $users = User::where('parent_id', $user->id)->get();

        if (\App\Utility\Acl::isManager(auth()->id()) || $user->id == auth()->id()) {
            if (\App\Utility\Acl::isSuperAdmin(auth()->id()) || !\App\Utility\Acl::isSuperAdmin($user->id)) {
                $access = true;
            } else {
                $access = false;
            }


        } else {
            if (in_array($user->id, Acl::get_all_children(auth()->user()))) {
                $access = true;
            } else {
                $access = false;
            }


        }
        if (!$access) {
            return redirect()->route('admin.panel');
        }


        return view('admin.ACL.User.profile',
            compact(
                'user'

            ));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);

//        $validatedData = $request->validate([
//
//            'name' => ['required', 'string', 'min:5'],
//            'username' => ['required', 'string', 'min:5'],
//
//
//
//        ]);
//



$image = $request->input('avatar');
//
//if (isset($default_image) && !empty($default_image)) {
//
//    $this->attach_images($user, [$default_image]);
//   $image = Image::where('id' , $default_image)->first();
//   $image = $image->src;
//
//
//}
//else{
//    $image = null;
//}



        $user->update([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'avatar' =>  $image,
        ]);






        if ($user->save()){



            $detail = $user->details;


            if (isset($detail) && !empty($detail)){
                $detail->update([

                    'melli_code'  => $request->input('melli_code'),
                    'phone'  => $request->input('phone'),
                    'address'  => $request->input('address'),
                    'bio'  => $request->input('bio'),
                    'birth_date'  => $request->input('birth_date'),

                ]);

                $detail->save();
            }
            else{
                $detail = UserDetail::create([
                    'user_id' => $user->id ,
                    'melli_code'  => $request->input('melli_code'),
                    'phone'  => $request->input('phone'),
                    'address'  => $request->input('address'),
                    'bio'  => $request->input('bio'),
                    'birth_date'  => $request->input('birth_date'),
                ]);

            }

            toast('انجام شد!' , 'success');
            return back();


        }
        else{

            toast('انجام شد!' , 'success');
            return back();
        }



    }


    public function permissions($id)
    {
        ## User ID
        $user = User::findOrFail($id);

        ## all permissions  that specially has this user
        $permitted = $user->permissions()->pluck('id')->toArray();

        ## USER Roles Here
        $userRoles = $user->roles()->get();


        $userPermissions = array();
        foreach ($userRoles as $item) {
            $userPermissions = array_merge($item->permissions()->pluck('id')->toArray(), $userPermissions);
        }

        ## All Permissions
        $allPermission = Permission::latest()->pluck('id')->toArray();
        $remindedPermission = array_diff($allPermission, $userPermissions);

        $permissions = Permission::whereIn('id', $remindedPermission)->get();

        return view('admin.ACL.User.permissions', compact('permissions', 'user', 'permitted'));
    }

    public function permissionsUpdate(Request $request)
    {


        $permissions = $request->input('permissions');

        $user = $request->input('user');

        $user = User::findOrFail($user);

        if (isset($permissions) && !empty($permissions)) {
            $save = $user->permissions()->sync($permissions);
            if ($save) {
                toast('ویرایش دسترسی کاربری با موفقیت انجام شد !', 'success');
                return redirect()->back();
            } else {
                toast('ویرایش دسترسی کاربری با خطا مواجه شد!', 'error');
                return back();
            }
        }
    }

    public function roles($id)
    {
//        dd(request()->all());
        ## User ID
        $user = User::findOrFail($id);

        $roles = Role::latest()->get();

        $roled = $user->roles()->get()->pluck('id')->toArray();

        return view('admin.ACL.User.roles', compact('roles', 'user', 'roled'));
    }

    public function rolesUpdate(Request $request)
    {

        $roles = $request->input('roles');

        $user = $request->input('user');
        $user = User::findOrFail($user);

        if (isset($roles) && !empty($roles)) {
            $save = $user->roles()->sync($roles);
            if ($save) {
                toast('ویرایش نقش کاربری با موفقیت انجام شد !', 'success');
                return redirect()->route('users.index');
            } else {
                toast('ویرایش نقش کاربری با خطا مواجه شد!', 'error');
                return back();
            }
        }
    }


    public function changePassword($id)
    {
        $user = User::findOrFail($id);
        if (\App\Utility\Acl::isManager(auth()->id())) {

            return view('admin.ACL.User.change', compact('user'));

        } else {
            if ($user->id == auth()->id()) {
                return view('admin.ACL.User.change', compact('user'));
            } else {
                return redirect()->route('admin.panel');
            }

        }


    }

    public function change(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if (\App\Utility\Acl::isManager(auth()->id())) {
            $ok = true;
        } else {
            if ($user->id == auth()->id()) {
                $ok = true;
            } else {
                return redirect()->route('admin.panel');
            }

        }


        Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($ok = true) {

            DB::beginTransaction();
            $updated = $user->update([
                'password' => Hash::make($request->input('password')),

            ]);
            if ($user->save()) {

                DB::commit();
                toast('بازیابی رمز عبور  با موفقیت انجام شد !', 'success');
                if (auth()->user()->can('users.index')) {
                    return redirect()->route('users.index');
                } else {
                    return redirect()->route('users.show', auth()->id());
                }


            } else {
                DB::rollBack();
                toast('بازیابی رمز عبور  کاربر با خطا مواجه شد!', 'error');
                return back();
            }
        }

    }

    public function marketer()
    {

        $user = auth()->user();
        $users = array();
        $users = User::where('parent_id', auth()->id())->get();

        $tree = view('admin.helpers.tree', ['users' => $users]);
        $marketer = view('admin.helpers.marketer', ['users' => $users]);

        $dates = array();
        $sub_sell = array();
        $sub_buy = array();


        for ($i = -4; $i <= 4; $i++) {
            $now = Carbon::today()->addWeek($i)->toDateString();

            array_push($dates, $now);
        }


        $now = Carbon::now();
        foreach ($dates as $key => $date) {

            if ($key == 8) {
                $sub_sell_s = $user->sub_sell($dates[$key], $now);
                $sub_buy_s = $user->sub_buy($dates[$key], $now);

            } else {
                $sub_buy_s = $user->sub_buy($dates[$key], $dates[$key + 1]);
                $sub_sell_s = $user->sub_sell($dates[$key], $dates[$key + 1]);
            }

            array_push($sub_sell, $sub_sell_s);
            array_push($sub_buy, $sub_buy_s);
        }


        return view('admin.ACL.Marketer.list', compact('marketer', 'tree', 'dates', 'sub_sell', 'sub_buy'));
    }

    public function personal($id)
    {
        $user = User::findOrFail($id);
        $setting = General::where('section', 'personal_cart')->where('lang', config('app.locale'))->first();
        return view('admin.ACL.User.personal', compact('user', 'setting'));
    }

    public function create_new_user($email, $password)
    {
        $signedIn = User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if ($signedIn instanceof User) {
            return $signedIn;
        } else {
            return false;
        }

    }

    public function verify_code(Request $request)
    {

        DB::beginTransaction();

        /* Initial Variation */
        $email_session = $request->session()->get('email_verify');
        $user_id = $request->session()->get('user_id');
        $verify_code = $request->input('verify_code');
        $now = Carbon::now();


        $verify = $this->find_verification_row($email_session, $now, $verify_code);

        if ($verify) {

            $user_verified = $this->verify_account($user_id, $now);
            $this->change_activation_usage($verify);
            if ($user_verified) {

                DB::commit();
                Auth::loginUsingId($user_id);
                return view('auth.choose-account');


            } else {
                DB::rollBack();
                session(['error' => 'کد وارد شده صحیح نیست!']);
                return back();
            }
        } else {
            $this->failed_login('کد وارد شده صحیح نیست!');
        }


    }

    public function find_verification_row($email_session, $now, $verify_code)
    {
        $verify = Activation::whereEmail($email_session, $now, $verify_code)
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

    public function verify_account($user_id, $now)
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

    public function accounting(Request $request)
    {

        $account = $request->input('account');
        if (isset($account) && !empty($account)) {
            return view('auth.choose-person', compact('account'));
        } else {
            return back();
        }


    }

    public function person(Request $request)
    {
        $account = $request->input('account');
        $person = $request->input('person');
        $countries = Country::latest()->get();

        if (isset($account) && !empty($account) && isset($person) && !empty($person)) {
            if ($person == Acl::REAL) {
                return view('auth.real-register', compact('account', 'person', 'countries'));
            } else if ($person == Acl::LEGAL) {
                return view('auth.legal-register', compact('account', 'person', 'countries'));
            }
        } else {
            return back();
        }


    }

    public function legal_submit(Request $request)
    {
        $validatedData = $request->validate([
            'register_number' => ['required', 'min:6', 'max:6'],
            'equity_type' => 'boolean',
            'melli_code' => ['required', 'min:11', 'max:11'],
            'manager_name' => ['string', 'min:6'],
            'newspaper' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'statute' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'certificate' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],
            'name' => ['required', 'string', 'min:5'],
            'account' => ['required', 'string', 'min:5'],
            'username' => ['required', 'string', 'min:5'],
            'mobile' => ['required', 'regex:/^09[0-9]{9}$/', 'unique:users', 'min:10'],
            'phone' => ['required', 'numeric', 'min:8', 'max:11'],
            'avatar' => ['required', 'mimes:jpeg,png,jpg,gif,svg'],

            'state_id' => ['numeric', 'required'],
            'country_id' => ['numeric', 'required'],
            'city_id' => ['numeric', 'required'],
            'longitude' => ['required'],
            'latitude' => ['required'],
            'address' => ['string', 'required'],
            'postalcode' => ['numeric', 'size:10'],
        ]);


        DB::beginTransaction();
        $user = Auth::user();
        $person_type = Acl::LEGAL;
        $parent_id = null;
        $presentation_code = $request->input('presentation_code');
        $account_type = $request->input('account');
        $parent_id = $this->get_user_parent($presentation_code, $account_type);

        if (!empty($user) && isset($user)) {
            $person = LegalPerson::create([
                'user_id' => $user->id,
                'register_number' => $request->input('register_number'),
                'equity_type' => $request->input('equity_type'),
                'melli_code' => $request->input('melli_code'),
                'manager_name' => $request->input('manager_name'),
                'newspaper' => $request->input('newspaper'),
                'statute' => $request->input('statute'),
                'certificate' => $request->input('certificate'),
            ]);


            if (isset($parent_id) && !empty($parent_id)) {
                $account_type = $request->input('account');
            } else {
                $account_type = Acl::USER;
            }


            if ($person instanceof LegalPerson) {

                $country_id = $request->input('country_id');

                if ($account_type != Acl::USER) {


                    $country = Country::findOrFail($country_id);


                    $melli_code = $request->input('melli_code');

                    if (isset($country) && !empty($country)) {
                        $presentation_code_self = Acl::marketer_code($country->code, $person_type, $melli_code);
                    }

                } else {
                    $presentation_code_self = null;
                }

                $saved_user = $this->user_update($user, $request, $person_type, $person, $parent_id, $account_type, $presentation_code_self);

                if ($saved_user) {


                    $this->set_user_roles($user, $account_type);


                    $address = $this->set_first_address($user, $request, $country_id);


                    if ($address) {
                        if ($this->wallet($user)) {

                            DB::commit();
                            alert()->success('انجام شد!',
                                'حساب کاربری شما به موفقیت تکمیل شد!'
                            );
                            return redirect()->route('auth.register.contract');
                        } else {
                            DB::rollBack();
                        }
                    } else {
                        DB::rollBack();
                    }

                } else {
                    DB::rollBack();
                }
            }

        } else {
            DB::rollBack();
            return redirect('register');
        }
    }

    public function get_user_parent($presentation_code, $account_type)
    {

        if ($account_type == Acl::USER) {
            $parent_id = null;
        } else {
            if (isset($presentation_code) && !empty($presentation_code)) {

                $father = User::where('presentation_code', $presentation_code)->first();

                if (isset($father) && !empty($father)) {
                    $parent_id = $father->id;
                } else {
                    $parent_id = 1;
                }
            } else {
                $parent_id = 1;
            }
        }


    }

    public function user_update($user, $request, $person_type, $person, $parent_id, $account_type, $presentation_code_self)
    {

        $user->update([
            'name' => $request->input('name'),
            'role' => $request->input('account'),
            'username' => $request->input('username'),
            'mobile' => $request->input('mobile'),
            'phone' => $request->input('phone'),
            'avatar' => $request->input('avatar'),
            'person_type' => $person_type,
            'person_id' => $person->id,
            'parent_id' => $parent_id,
            'account_type' => $account_type,
            'presentation_code' => $presentation_code_self,
        ]);

        if ($user->save()) {


            $user->certificate()->create([
                'status' => 0
            ]);


            return true;
        } else {
            return false;
        }


    }

    public function set_user_roles($user, $account_type)
    {

        /* Set Roles */

        $user->roles()->sync([$account_type]);


        $club_id = $this->get_club_id($account_type);

        $this->set_user_club($user, $club_id);

        $this->set_user_notifictions($user, $club_id);


        if ($account_type == Acl::SELLER) {

            $this->set_seller_plan_usage($user);
        }


    }

    public function get_club_id($account_type)
    {
        if ($account_type == Acl::USER) {
            return Acl::CLUB;
        }

        if ($account_type == Acl::MARKETER) {
            return Acl::MCLUB;

        }

        if ($account_type == Acl::SELLER) {
            return Acl::SCLUB;
        } else {
            return Acl::SCLUB;
        }
    }

    public function set_user_club($user, $club_id)
    {
        $user->clubs()->sync([$club_id]);
    }

    public function set_user_notifictions($user, $club_id)
    {

        $club = Club::findOrFail($club_id);

        $announces = $club->announcements()->pluck('announcement_id')->toArray();
        $user->announcements()->sync($announces);

    }

    public function set_seller_plan_usage($user)
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

    public function set_first_address($user, $request, $country_id)
    {

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

    protected function wallet($user)
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

    public function isValidIranianNationalCode($input)
    {
        if (!preg_match("/^\d{10}$/", $input)) {
            return false;
        }

        $check = (int)$input[9];
        $sum = array_sum(array_map(function ($x) use ($input) {
                return ((int)$input[$x]) * (10 - $x);
            }, range(0, 8))) % 11;

        return ($sum < 2 && $check == $sum) || ($sum >= 2 && $check + $sum == 11);
    }



}
