<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset("img/user.jpg") }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ ucwords(Auth::user()->name) }}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="{{ asset("img/user.jpg") }}" class="img-circle" alt="User Image">

            <p>
                {{ ucwords(Auth::user()->name) }} - Web Developer
                <small>Member since {{ Auth::user()->created_at->format('j F Y') }}</small>
            </p>
        </li>

        <!--
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
        </li>
        -->

        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Logout</a>
            </div>
        </li>
    </ul>
</li>