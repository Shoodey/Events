<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UIR Events @yield("title")</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset("css/app.min.css")}}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition lockscreen">

    @include('helpers/notifications')

    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="{{ url('/') }}">UIR<b>EVENTS</b></a>
        </div>

        <div class="lockscreen-name">{{ $name }}</div>

        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <img src="{{ asset('img/user.jpg') }}" alt="User Image">
            </div>

            <form class="lockscreen-credentials" action="{{ url('lock') }}" method="post">
                {!! csrf_field() !!}
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="password" name="password">

                    <div class="input-group-btn">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                </div>
            </form>

        </div>

        <div class="help-block text-center">
            Enter your password to retrieve your session
        </div>

        <div class="text-center">
            <a href="{{ url('login') }}">Or sign in as a different user</a>
        </div>

        <div class="lockscreen-footer text-center">
            Copyright © 2015-2016 <b><a href="{{ url('/') }}" class="text-black">UIR EVENTS</a></b><br>
            All rights reserved
        </div>
    </div>

    <script src="{{ asset('js/app.min.js') }}"></script>

    @yield('notifications')
    @yield('scripts')

</body>
</html>
