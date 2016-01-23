@extends('emails.beautymail.template')

@section('content')

    @include('emails.beautymail.widgets.secondaryStart')
    <h4 class="secondary"><strong>{{ $controller }}</strong></h4>
    @include('emails.beautymail.widgets.secondaryEnd')


    @include('emails.beautymail.widgets.primaryStart')

    <h4 class="primary"><strong> {{ $title }}</strong></h4>

    <p>{{ $description }}</p>

    @include('emails.beautymail.widgets.primaryEnd')

@stop