@extends('layouts.admin')

@section('title', '| Users')

@section('content')
    <section class="content-header">
        <h1>Users</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i> Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="dataTable" class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Active</th>
                                @if(Auth::user()->can(['show-users', 'edit-users', 'destroy-users']))
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td style="vertical-align: middle">{{ $user->id }}</td>
                                    <td style="vertical-align: middle">{{ $user->name }}</td>
                                    <td style="vertical-align: middle">
                                        @if($user->hasRole('admin'))
                                            <span class="label label-success">{{ $user->roles()->first()['display_name'] }}</span>
                                        @else
                                            <span class="label label-default">{{ $user->roles()->first()['display_name'] }}</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{ $user->email }}</td>
                                    <td style="vertical-align: middle">
                                        @if($user->active)
                                            <i class="fa fa-check-circle-o text-green"></i>
                                        @else
                                            <i class="fa fa-times-circle-o text-red"></i>
                                        @endif
                                    </td>
                                    @if(Auth::user()->can(['show-users', 'edit-users', 'destroy-users']))
                                    <td>
                                        @if(Auth::user()->can('show-users'))
                                            <a href="{{ route('admin.users.show', $user) }}" class="btn btn-success">
                                                <i class="fa fa-eye"></i></a>
                                        @endif

                                        @if(Auth::user()->can('edit-users'))
                                            <a class="btn btn-primary" href="{{ route('admin.users.edit', $user) }}">
                                                <i class="fa fa-edit"></i></a>
                                        @endif

                                        @if(Auth::user()->can('destroy-users'))
                                            <a class="btn btn-danger" href="{{ route('admin.users.destroy', $user) }}"
                                           data-method="delete" data-confirm="Are you sure to delete this user?">
                                                <i class="fa fa-remove"></i></a>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @if(Auth::user()->can('create-users'))
                    <p><a class="btn btn-primary" href="{{ route('admin.users.create') }}">Create new user</a></p>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#dataTable').dataTable();
        })
    </script>
@endsection