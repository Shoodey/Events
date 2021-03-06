<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("img/user.jpg") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ ucwords(Auth::user()->name) }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">
            <li class="{{ $tab == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a>
            </li>

            @if(Auth::user()->can(['index-users', 'index-roles', 'index-permissions']))
                <li class="header">Access Control</li>

                @if(Auth::user()->can('index-users'))
                <li class="{{ $tab == 'users' ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a>
                </li>
                @endif

                @if(Auth::user()->can('index-roles'))
                <li class="{{ $tab == 'roles' ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}"><i class="fa fa-tags"></i> <span>Roles</span></a>
                </li>
                @endif

                @if(Auth::user()->can('index-permissions'))
                <li class="{{ $tab == 'permissions' ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}"><i class="fa fa-adjust"></i> <span>Permissions</span></a>
                </li>
                @endif
            @endif


            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Layout Options</span>
                    <span class="label label-primary pull-right">4</span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>