@extends('emails.beautymail.template')

@section('content')

    @include('emails.beautymail.widgets.primaryStart')

    <h4 class="secondary"><strong>Reset Password</strong></h4>

    <p>You have requested a password reset.</p>
    <p>Click <a href="{{ url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">here</a> to reset your password.</p>

    @include('emails.beautymail.widgets.primaryEnd')

@stop