<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Snowfire\Beautymail\Beautymail;

class AuthController extends Controller
{
    /*
     * User activation security handled in Authenticare middleware
     */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/lock';

    /**
     * AuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'activate']]);
        $this->middleware('auth', ['only' => 'activate']);
    }

    /**
     * Validates request's data
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|alpha_space',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    /**
     * Creates a new user based on request's data.
     * Sends welcome email to new user.
     * Send activation email to admin.
     * @param array $data
     * @return static
     */
    protected function create(array $data)
    {
        $token = str_random(60);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_token' => $token
        ]);

        $data['id'] = $user->id;
        $data['token'] = $token;


        Mail::send('auth.emails.welcome', $data, function($message) use ($data)
        {
            $message->from('noreply@uir-event.com', "UIR Events");
            $message->subject("Welcome Email");
            $message->to($data['email']);
        });

        Mail::send('auth.emails.activate', $data, function($message) use ($data)
        {
            $message->from('noreply@uir-event.com', "UIR Events");
            $message->subject("Activate New User");
            $message->to('shoodey@gmail.com');
        });

        return $user;
    }

    // Login
    // -----

    /**
     * Added toastr notification.
     * @param Request $request
     * @return $this
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ])
            ->with('error', 'These credentials do not match our records.');
    }

    /**
     * Puts logged in user's id in session.
     * Added toastr notification.
     * @param Request $request
     * @param $throttles
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::user());
        }

        Session::put('lastUser', Auth::user()->id);

        return redirect()->intended($this->redirectPath())->with('success', 'You are now logged in.');
    }

    // Register
    // --------

    /**
     * Handle a registration request for the application.
     * DO NOT login after registration
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        //Auth::login($this->create($request->all()));
        $this->create($request->all());

        return redirect('login')->with('success', 'Registration successful, please check your email.');
    }

    // Activation
    // ----------

    /**
     * Activate accounts if logged in as.
     * TODO: only if super-administrator.
     * @param $id
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function activate($id, $token){
        $user = User::findOrFail($id);

        if($user->active != 0){
            return redirect('/')->with('error', "{$user->email} account has already been activated.");
        }

        if($user->activation_token === $token){
            $user->activation_token = '';
            $user->active = 1;
            $user->save();

            $data['name'] = $user->name;
            $data['email'] = $user->email;

            Mail::send('auth.emails.active', $data, function($message) use ($data)
            {
                $message->from('noreply@uir-event.com', "UIR Events");
                $message->subject("Account activated");
                $message->to($data['email']);
            });
            return redirect('/')->with('success', "{$user->email} account has been activated.");
        }
        return redirect('/')->with('error', 'This link doesn\'t seem to be valid.');
    }

    // Lockscreen

    /**
     * Manage the lockscreen.
     * If last user is in session
     *      Else show login view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    protected function lock(){
        $user = User::where('id', Session::get('lastUser'))->first();

        if($user){
            $name = $user->name;
        }else{
            return redirect('/login');
        }

        return view('auth.lock', compact('name'));
    }

    /**
     * Checks if passwords match then login
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function lockPost(Request $request){
        $user = User::where('id', Session::get('lastUser'))->first();

        if(Hash::check($request->password, $user->password)){
            Auth::login($user);
            return redirect('/')->with('success', 'Your sessions has been retrieved.');
        }else{
            return redirect('lock')->with('error', 'These credentials do not match our records.');
        }
    }

    // Logout
    // ------

    /**
     * Added toastr notification.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard($this->getGuard())->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/')->with('error', 'You are now logged out.');
    }

}
