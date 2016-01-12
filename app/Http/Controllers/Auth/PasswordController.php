<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/login';

    /**
     * Create a new password controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Sending password reset email

    /**
     * Get the response for after the reset link has been successfully sent.
     * Added toastr notifications.
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getSendResetLinkEmailSuccessResponse($response)
    {
        return redirect()->back()->with('status', trans($response))
            ->with('success', 'A link has been sent to your email address.');
    }

    /**
     * Get the response for after the reset link could not be sent.
     * Added toastr notifications
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getSendResetLinkEmailFailureResponse($response)
    {
        return redirect()->back()->withErrors(['email' => trans($response)])
            -> with('error', 'Please verify your email address.');
    }

    // Resetting user's password

    /**
     * Reset the given user's password.
     * Do not login after password reset
     *      Instead redirect to login page.
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        $user->save();

        //Auth::login($user);
    }

    /**
     * Get the response for after a successful password reset.
     * Added toastr notification.
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getResetSuccessResponse($response)
    {
        return redirect($this->redirectPath())->with('success', 'Your password has been successfully reset.')->with('status', trans($response));
    }

    /**
     * Get the response for after a failing password reset.
     * Added toastr notification
     * @param  Request  $request
     * @param  string  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function getResetFailureResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => trans($response)])
            ->with('error', 'An error occured, please verify your password.');
    }
}
