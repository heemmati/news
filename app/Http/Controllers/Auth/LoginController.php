<?php

namespace App\Http\Controllers\Auth;

use App\Events\LoginEvent;
use App\Http\Controllers\Controller;


use Laravel\Socialite\Facades\Socialite;
use League\Flysystem\Exception;
use App\Model\Setting\GeneralItem;


use App\Providers\RouteServiceProvider;
use App\Traits\AuthMethods;
use App\Traits\ErrorMethods;
use App\User;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    // use ErrorMethods;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthMethods;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::PANEL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    use RedirectsUsers, ThrottlesLogins;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */


    public function showLoginForm()
    {


        try {
            if (Auth::guest()) {

                $general = [
                    'logo' => GeneralItem::where('code', 'logo')->first(),
                    'logo-white' => GeneralItem::where('code', 'logo-white')->first(),

                ];


                SEOTools::setTitle(__('site.site_name') . ' | ' . __('site.login'));

                return view('auth.login3' , compact('general'));
            } else {
                return redirect()->route('admin.panel');
            }
        } catch (\Throwable $e) {
            return $this->show_error_view($e);
        }


    }


    /**
     * Handle a login request to the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'enterance' => ['required', 'max:255'],
            'password' => ['required', 'max:255', 'min:8'],
//            'captcha' => ['required', 'captcha'],
        ]);


        try {
            /* Validate */




            $enterance = $request->input('enterance');
            $password = $request->input('password');

            $user_data = $this->find_user_by_enterance($enterance);

            $user = $user_data['user'];
            $email = $user_data['email'];
            $mobile = $user_data['mobile'];



            if (isset($user) && !empty($user)) {
                if (Hash::check($password, $user->password)) {

                    $accounted = $user->account_verification;


                        if (isset($accounted) && !empty($accounted)) {

                        Auth::loginUsingId($user->id);

                        event(new LoginEvent($user));
                        alert()->success(__('site.congratulations'), __('site.you_haved_login_successfully'));
                        return redirect()->intended();

                    } else {
                        $email = $request->input('enterance');
                        $password = $request->input('password');
                        $user_data = $this->find_user_by_enterance($enterance);



                        return $this->find_and_send_activation($user_data , $password);
                    }


                } else {

                    Session::put('error', __('site.wrong_password'));
                    return back();


                }

            } else {
                Session::put('error',  __('site.there_is_no_user'));
                return back();

            }
        } catch (\Exception $e) {
            return dd($e);
        }


    }

    public function login_validation($request)
    {

        $validatedData = $request->validate([
            'enterance' => ['required', 'max:255'],
            'password' => ['required', 'max:255', 'min:8'],
            'captcha' => ['required', 'captcha'],
        ]);


    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required'],
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

    public function callback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/panel');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);

                return redirect('/panel');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
}
