@extends('layouts.admin')

@section('title', '| Roles')

@section('content')

    <section class="content-header">
        <h1>Roles</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i> Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center text-light-blue">{{ $role->display_name }}</h3>

                        <p class="text-muted text-center">{{ $role->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Users</b> <a class="pull-right">{{ ucfirst($role->users->count()) }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Permissions</b> <a class="pull-right">{{ ucfirst($role->perms->count()) }}</a>
                            </li>
                        </ul>

                        <a href="{{ route('admin.roles.edit', $role) }}"
                           class="btn btn-primary btn-block"><b> Edit</b></a>
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#users" data-toggle="tab" aria-expanded="true">Users</a></li>
                        <li class=""><a href="#permissions" data-toggle="tab"
                                              aria-expanded="false">Permissions</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="users">
                            <div class="post">
                                <div class="row">
                                    @foreach($role->users as $user)
                                        <div class="col-md-4">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm"
                                                     src="{{ asset('img/user.jpg') }}"
                                                     alt="user image">
                                                <span class="username">
                                                  <a href="#">{{ ucwords($user->name) }}</a>
                                                </span>
                                                <span class="description">{{ $user->email }}</span>
                                                <span class="description">{{ $user->created_at->format('j F Y') }}</span>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if($role->users->count() == 0)
                                        <div class="col-md-12">
                                            <p>No users have been assigned to this role yet.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="permissions">
                            <ul class="timeline timeline-inverse">
                                @foreach($role->perms->groupBy('model') as $model => $permissions)

                                    @if($permissions->first()->model == 'users')
                                        <?php $color = 'bg-blue-active'; $secondaryColor = 'bg-blue'; ?>
                                    @elseif($permissions->first()->model == 'roles')
                                        <?php $color = 'bg-maroon-active'; $secondaryColor = 'bg-maroon'; ?>
                                    @elseif($permissions->first()->model == 'permissions')
                                        <?php $color = 'bg-orange-active'; $secondaryColor = 'bg-orange'; ?>
                                    @endif

                                    <li class="time-label">
                                        <span class="{{ $color }}">
                                          {{ ucfirst($model) }}
                                        </span>
                                    </li>
                                    @foreach($permissions as $permission)
                                        <?php
                                                $method = explode('-', $permission->name);
                                                switch($method[0]){
                                                    case 'index':
                                                        $icon = 'fa fa-bars';
                                                        break;
                                                    case 'show':
                                                        $icon = 'fa fa-eye';
                                                        break;
                                                    case 'create':
                                                        $icon = 'fa fa-plus';
                                                        break;
                                                    case 'store':
                                                        $icon = 'fa fa-database';
                                                        break;
                                                    case 'edit':
                                                        $icon = 'fa fa-pencil-square-o';
                                                        break;
                                                    case 'update':
                                                        $icon = 'fa fa-refresh';
                                                        break;
                                                    case 'destroy':
                                                        $icon = 'fa fa-times';
                                                        break;
                                                    default:
                                                        $icon = 'fa fa-adjust';
                                                        break;
                                                }
                                        ?>
                                        <li>
                                            <i class="{{ $icon . ' ' . $secondaryColor }}"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header no-border"><a href="{{ route('admin.permissions.show', $permission) }}">{{ $permission->display_name }}</a></h3>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection