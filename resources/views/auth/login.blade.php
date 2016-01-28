@extends('layouts.auth')

@section('title', '| Login')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}">{{ env("APP_PNAME") }}<b>{{ env("APP_SNAME") }}</b></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Login to start your session</p>

            <form action="{{ url('login') }}" method="post">

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

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </form>

            <div class="row text-center">
                <p><b>-- OR --</b></p>
                <div class="col-xs-6">
                    <a class="btn btn-success btn-block btn-flat" href="{{ url('register') }}">Register</a>
                </div>
                <div class="col-xs-6">
                    <a class="btn btn-warning btn-block btn-flat" href="{{ url('password/reset') }}">Reset password</a>
                </div>
            </div>

        </div>
    </div>

@endsection
