<?php

namespace App\Http\Controllers\Auth;
use App\Model\Setting\GeneralItem;
use App\Events\Registeration;
use App\Http\Controllers\Controller;
use App\Model\Activation;
use App\Model\General;
use App\Model\LegalPerson;
use App\Model\RealPerson;
use App\Traits\AuthMethods;
use App\Traits\ErrorMethods;
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
use Modules\Address\Entities\City;
use Modules\Address\Entities\Country;
use Modules\Address\Entities\State;
use App\Model\Club\Club;
use App\Model\Plan\UserRolePlan;
use Modules\Plan\Traits\Plot;
use Modules\Shop\Traits\Unit;
use Modules\Shop\Traits\Wallet;

//use App\Model\Address;
//use App\Model\City;
//use App\Model\Country;
//use App\Model\State;

class RegisterController extends Controller
{
   // use ErrorMethods;
//    protected $redirectTo = RouteServiceProvider::PANEL;

    use ImageUploader , AuthMethods;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        try{
            $general = [
                'logo' => GeneralItem::where('code', 'logo')->first(),
                'logo-white' => GeneralItem::where('code', 'logo-white')->first(),

            ];

            if (!Auth::guest()){
                return redirect()->route('admin.panel');
            }

            return view('auth.register' , compact('general'));

        }
        catch (\Exception $e){
          dd($e);
        }

    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        try{

            DB::beginTransaction();

            /* Set the Email And Password */
            $enterance = $request->input('enterance');
            $password = $request->input('password');


            $user_data = $this->find_user_by_enterance($enterance);

            return $this->find_and_send_activation($user_data , $password);

        }
        catch (\Exception $e){
            dd($e);
            // return $this->show_error_view($e);
        }


    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'enterance' => ['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function guard()
    {
        return Auth::guard();
    }


}
