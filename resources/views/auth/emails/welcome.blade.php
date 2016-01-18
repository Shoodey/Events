@extends('emails.beautymail.template')

@section('content')

    @include('emails.beautymail.widgets.primaryStart')

    <h4 class="secondary"><strong>Welcome {{ $name }}</strong></h4>

    <p>An administrator will validate your account within 24 hours. </p>
    <p>If you think this operation is taking too long, please send an email explaining your situation at:
        <strong>contact@uirevents.com</strong>
    </p>

    @include('emails.beautymail.widgets.primaryEnd')

@stop