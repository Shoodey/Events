@extends('emails.beautymail.template')

@section('content')

    @include('emails.beautymail.widgets.primaryStart')

    <h4 class="secondary"><strong>Activation Request</strong></h4>

    <p>Please click this <a href="{{ route('activate', [$id, $token]) }}">link</a>.</p>

    @include('emails.beautymail.widgets.primaryEnd')

@stop