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

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('helpers/notifications')

    @include('admin/partials/header')
    @include('admin/partials/sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('admin/partials/footer')

    @include('admin/partials/controls')
</div>

<script src="{{ asset ("js/app.min.js") }}"></script>

@yield('scripts')

</body>
</html>
