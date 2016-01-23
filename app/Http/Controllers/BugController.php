<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class BugController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function post(Request $request)
    {

        $data['title'] = $request->bugTitle;
        $data['description'] = $request->bugDescription;
        $data['controller'] = $request->controller;

        if (!Auth::user()) {
            $data['email'] = $request->bugEmail;
            $data['name'] = $request->bugName;

            $validator = Validator::make($request->all(), [
                'bugEmail' => 'required|email|max:255',
                'bugName' => 'required|max:255|alpha_space',
                'bugTitle' => 'required|max:255',
                'bugDescription' => 'required|max:255'
            ]);
        } else {
            $data['email'] = Auth::user()->email;
            $data['name'] = Auth::user()->name;

            $validator = Validator::make($request->all(), [
                'bugTitle' => 'required|max:255|email',
                'bugDescription' => 'required|max:255'
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('modal', true);
        }

        $response = Mail::send('emails.ladybug', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            $message->subject("Bug Report");
            $message->to('admin@uir-events.com');
        });
        if ($response) {
            return back()->with('success', 'Your report has been sent.');
        } else {
            return back()->with('error', 'An error occured, please try again.');
        }
    }
}
