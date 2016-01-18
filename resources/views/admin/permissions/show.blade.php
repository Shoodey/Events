@extends('layouts.admin')

@section('title', '| Permission')

@section('content')

    <section class="content-header">
        <h1>Permissions</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i> Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center text-light-blue">{{ $permission->display_name }}</h3>

                        <p class="text-muted text-center">{{ $permission->name }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                @if($permission->model == 'users')
                                    <b>Model</b> <a class="pull-right text-aqua">{{ ucfirst($permission->model) }}</a>
                                @elseif($permission->model == 'roles')
                                    <b>Model</b> <a class="pull-right text-maroon">{{ ucfirst($permission->model) }}</a>
                                @elseif($permission->model == 'permissions')
                                    <b>Model</b> <a class="pull-right text-orange">{{ ucfirst($permission->model) }}</a>
                                @endif
                            </li>
                        </ul>

                        <a href="{{ route('admin.permissions.edit', $permission) }}"
                           class="btn btn-primary btn-block"><b> Edit</b></a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection