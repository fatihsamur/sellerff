<?php

namespace Wave\Http\Controllers\Auth;

use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Wave\Notifications\VerifyEmail;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use App\Mail\CustomerRegistered;
use App\Utils\Helpers;

class RegisterController extends \App\Http\Controllers\Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
      */

    use RegistersUsers;


    protected function rules()
    {
        return [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'phone' => 'required|digits:10',
      'line1' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'zip_code' => 'required|string|max:255',
      'password' =>
      Password::min(8)
        ->numbers(),
      'conditions' => 'required|accepted'
    ];
    }

    protected function withUserNameRules()
    {
        return [
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'username' => 'required|string|max:20|unique:users',
      'phone' => 'required|digits:10',
      'line1' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'city' => 'required|string|max:255',
      'zip_code' => 'required|string|max:255',
      'password' =>
      Password::min(8)
        ->numbers(),
      'conditions' => 'required|accepted',
    ];
    }

    protected $messages = [
    'name.required' => 'İsim alanı boş bırakılamaz',
    'name.string' => 'İsim alanı sadece harflerden oluşmalıdır',
    'name.max' => 'İsim alanı en fazla 255 karakter olabilir',
    'email.required' => 'E-posta alanı boş bırakılamaz',
    'email.string' => 'E-posta alanı sadece harflerden oluşmalıdır',
    'email.email' => 'E-posta alanı geçerli bir e-posta adresi olmalıdır',
    'email.max' => 'E-posta alanı en fazla 255 karakter olabilir',
    'email.unique' => 'Bu e-posta adresi daha önce kullanılmış',
    'password.required' => 'Şifre alanı boş bırakılamaz',
    'password.string' => 'Şifre alanı sadece harflerden oluşmalıdır',
    'password.min' => 'Şifre en az 8 karakter olmalıdır',
    'password.numbers' => 'Şifre en az bir sayı içermelidir',
    'confirmation_password.required' => 'Şifre onay alanı boş bırakılamaz',
    'confirmation_password.min' => 'Şifre onay alanı en az 6 karakter olmalıdır',
    'confirmation_password.same' => 'Şifre onay alanı şifre ile aynı olmalıdır',
    'conditions.required' => 'Kullanım koşullarını kabul etmelisiniz',
    'conditions.accepted' => 'Kullanım koşullarını kabul etmelisiniz',
  ];

    protected $withUserNameMessages = [
    'name.required' => 'İsim alanı boş bırakılamaz',
    'name.string' => 'İsim alanı sadece harflerden oluşmalıdır',
    'name.max' => 'İsim alanı en fazla 255 karakter olabilir',
    'email.required' => 'E-posta alanı boş bırakılamaz',
    'email.string' => 'E-posta alanı sadece harflerden oluşmalıdır',
    'email.email' => 'E-posta alanı geçerli bir e-posta adresi olmalıdır',
    'email.max' => 'E-posta alanı en fazla 255 karakter olabilir',
    'email.unique' => 'Bu e-posta adresi daha önce kullanılmış',
    'password.required' => 'Şifre alanı boş bırakılamaz',
    'password.string' => 'Şifre alanı sadece harflerden oluşmalıdır',
    'password.min' => 'Şifre en az 8 karakter olmalıdır',
    'password.numbers' => 'Şifre en az bir sayı içermelidir',
    'confirmation_password.required' => 'Şifre onay alanı boş bırakılamaz',
    'confirmation_password.min' => 'Şifre onay alanı en az 6 karakter olmalıdır',
    'confirmation_password.same' => 'Şifre onay alanı şifre ile aynı olmalıdır',
    'conditions.required' => 'Kullanım koşullarını kabul etmelisiniz',
    'conditions.accepted' => 'Kullanım koşullarını kabul etmelisiniz',
    'username.required' => 'Kullanıcı adı alanı boş bırakılamaz',
    'username.string' => 'Kullanıcı adı alanı sadece harflerden oluşmalıdır',
    'username.max' => 'Kullanıcı adı alanı en fazla 20 karakter olabilir',
    'username.unique' => 'Bu kullanıcı adı daha önce kullanılmış'
  ];


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' =>
    [
      'complete'
    ]]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes') {
            return Validator::make($data, $this->withUserNameRules(), $this->withUserNameMessages);
        }

        return Validator::make($data, $this->rules(), $this->messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Model\User
     */
    public function create(array $data)
    {
        $role = \TCG\Voyager\Models\Role::where('name', '=', 'basic')->first();

        $verification_code = null;
        $verified = 1;

        if (setting('auth.verify_email', false)) {
            $verification_code = str_random(30);
            $verified = 0;
        }

        if (isset($data['username']) && !empty($data['username'])) {
            $username = $data['username'];
        } elseif (isset($data['name']) && !empty($data['name'])) {
            $username = str_slug($data['name']);
        } else {
            $username = $this->getUniqueUsernameFromEmail($data['email']);
        }

        $username_original = $username;
        $counter = 1;

        while (User::where('username', '=', $username)->first()) {
            $username = $username_original . (string)$counter;
            $counter += 1;
        }

        $trial_days = setting('billing.trial_days', 14);
        $trial_ends_at = null;
        // if trial days is not zero we will set trial_ends_at to ending date
        if (intval($trial_days) > 0) {
            $trial_ends_at = now()->addDays(setting('billing.trial_days', 14));
        }

        $aff_code = Helpers::generateAffCode();

        $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'username' => $username,
      'phone_number' => $data['phone'],
      'line1' => $data['line1'],
      'line2' => $data['line2']??null,
      'state' => $data['state'],
      'city' => $data['city'],
      'zip_code' => $data['zip_code'],
      'password' => bcrypt($data['password']),
      'role_id' => $role->id,
      'verification_code' => $verification_code,
      'verified' => $verified,
      'trial_ends_at' => $trial_ends_at,
      'affiliate_code' => $aff_code
    ]);


        /* if (setting('auth.verify_email', false)) {
          $this->sendVerificationEmail($user);
        } */
        if (app()->environment('production')) {
            Mail::to($user->email)->send(new Welcome(['user' => $user->name]));
            Mail::to('member@sellerfulfilment.com')->send(new CustomerRegistered(['user_id' => $user->id]));
        }
        return $user;
    }

    /**
     * Complete a new user registration after they have purchased
     *
     * @param  Request  $request
     * @return redirect
     */
    public function complete(Request $request)
    {
        if (setting('auth.username_in_registration') && setting('auth.username_in_registration') == 'yes') {
            $request->validate([
        'name' => 'required|string|min:3|max:255',
        'username' => 'required|string|max:20|unique:users,username,' . auth()->user()->id,
        'password' => 'required|string|min:6'
      ]);
        } else {
            $request->validate([
        'name' => 'required|string|min:3|max:255',
        'password' => 'required|string|min:6'
      ]);
        }

        // Update the user info
        $user = auth()->user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();


        return redirect()->route('wave.dashboard')->with(['message' => 'Successfully updated your profile information.', 'message_type' => 'success']);
    }

    private function sendVerificationEmail($user)
    {
        Notification::route('mail', $user->email)->notify(new VerifyEmail($user));
    }

    public function showRegistrationForm()
    {
        /*         if(setting('billing.card_upfront')){
                return redirect()->route('wave.pricing');
            } */

        return view('theme::auth.register');
    }

    public function verify(Request $request, $verification_code)
    {
        $user = User::where('verification_code', '=', $verification_code)->first();

        $user->verification_code = null;
        $user->verified = 1;
        $user->email_verified_at = Carbon::now();
        $user->save();

        return redirect()->route('login')->with(['message' => 'Successfully verified your email. You can now login.', 'message_type' => 'success']);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        if (setting('auth.verify_email')) {
            // send email verification
            return redirect()->route('login')->with(['message' => 'Thanks for signing up! Please check your email to verify your account.', 'message_type' => 'success']);
        } else {
            $this->guard()->login($user);

            return $this->registered($request, $user)
        ?: redirect($this->redirectPath())->with(['message' => 'Thanks for signing up!', 'message_type' => 'success']);
        }
    }

    public function getUniqueUsernameFromEmail($email)
    {
        $username = strtolower(trim(str_slug(explode('@', $email)[0])));

        $new_username = $username;

        $user_exists = \Wave\User::where('username', '=', $username)->first();
        $counter = 1;
        while (isset($user_exists->id)) {
            $new_username = $username . $counter;
            $counter += 1;
            $user_exists = \Wave\User::where('username', '=', $new_username)->first();
        }

        $username = $new_username;

        if (strlen($username) < 4) {
            $username = $username . uniqid();
        }

        return strtolower($username);
    }
}
