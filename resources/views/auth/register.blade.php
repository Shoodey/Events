@extends('layouts.auth')

@section('title', '| Register')

@section('content')

    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}">{{ env("APP_PNAME") }}<b>{{ env("APP_SNAME") }}</b></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ url('register') }}" method="post">

                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" placeholder="Full name" name="name"
                           value="{{ old('name') }}" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <label class="control-label">
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('name') }}
                        </label>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"
                           required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <label class="control-label">
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('email') }}
                        </label>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <label class="control-label">
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('password') }}
                        </label>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Verify password"
                           name="password_confirmation" required>
                    <span class="glyphicon glyphicon-repeat form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <label class="control-label">
                            <i class="fa fa-times-circle-o"></i>
                            {{ $errors->first('password_confirmation') }}
                        </label>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label style="font-size: 12px;">
                                <input type="checkbox" name="agree" required>
                                I agree to the <a data-toggle="modal" data-target="#agree">terms and conditions</a>.
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>

            @include('auth/agree')

            <div class="row text-center">
                <p><b>-- OR --</b></p>

                <div class="col-xs-6">
                    <a class="btn btn-success btn-block btn-flat" href="{{ url('login') }}">Login</a>
                </div>
                <div class="col-xs-6">
                    <a class="btn btn-warning btn-block btn-flat" href="{{ url('password/reset') }}">Reset password</a>
                </div>
            </div>

        </div>
    </div>

@endsection
