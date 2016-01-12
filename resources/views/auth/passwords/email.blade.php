@extends('layouts.auth')

@section('title', '| Reset')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">UIR<b>EVENTS</b></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Send password reset link</p>

            <form action="{{ url('password/email') }}" method="post">

                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <label class="control-label">
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('email') }}
                        </label>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
                    </div>
                </div>
            </form>

            <div class="row text-center">
                <p><b>-- OR --</b></p>
                <div class="col-xs-6">
                    <a class="btn btn-success btn-block btn-flat" href="{{ url('login') }}">Login</a>
                </div>
                <div class="col-xs-6">
                    <a class="btn btn-warning btn-block btn-flat" href="{{ url('register') }}">Register</a>
                </div>
            </div>

        </div>
    </div>

@endsection
