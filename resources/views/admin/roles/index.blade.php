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
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <table id="dataTable" class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Users</th>
                                <th class="hidden-sm hidden-xs">Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>0</td>
                                    <td class="hidden-sm hidden-xs">{{ str_limit($role->description, 50) }}</td>
                                    <td>
                                        <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-primary" href="{{ route('admin.roles.edit', $role) }}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="{{ route('admin.roles.destroy', $role) }}" data-method="delete" data-confirm="Are you sure to delete this role?"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <p><a class="btn btn-primary" href="{{ route('admin.roles.create') }}">Create new role</a></p>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable();
        })
    </script>
@endsection