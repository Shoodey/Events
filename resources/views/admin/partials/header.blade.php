<header class="main-header">
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ substr(env("APP_PNAME"), 0, 1) }}<b>{{ substr(env("APP_SNAME"), 0, 1) }}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ env("APP_PNAME") }}<b>{{ env("APP_SNAME") }}</b></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                @include('admin/partials/headers/messages')
                @include('admin/partials/headers/notifications')
                @include('admin/partials/headers/tasks')
                @include('admin/partials/headers/user')

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
