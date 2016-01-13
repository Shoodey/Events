@extends('emails.beautymail.widgets')

@section('content')

    @include('emails.beautymail.widgets.articleStart')

    <h4 class="secondary"><strong>Activation Request</strong></h4>

    <p>Please click this <a href="{{ route('activate', [$id, $token]) }}">link.</a></p>

    @include('emails.beautymail.widgets.articleEnd')

@stop