@extends('emails.beautymail.template')

@section('content')

    @include('emails.beautymail.widgets.primaryStart')

    <h4 class="secondary"><strong>Active Account</strong></h4>

    <p>Your account has been activated.</p>
    <p>You can now <a href="{{ url('/login') }}">Login</a></p>

    @include('emails.beautymail.widgets.primaryEnd')

@stop