@extends('layouts.admin')

@section('title', '| Permissions')

@section('content')
    <section class="content-header">
        <h1>Permissions</h1>
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
                                <th>Model</th>
                                <th>Name</th>
                                <th>Permission</th>
                                @if(Auth::user()->can(['show-permissions', 'edit-permissions', 'destroy-permissions']))
                                    <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td style="vertical-align: middle">{{ $permission->id }}</td>
                                    <td style="vertical-align: middle">
                                        @if($permission->model == 'users')
                                            <span class="label bg-blue">{{ ucfirst($permission->model) }}</span>
                                        @elseif($permission->model == 'roles')
                                            <span class="label bg-maroon">{{ ucfirst($permission->model) }}</span>
                                        @elseif($permission->model == 'permissions')
                                            <span class="label bg-orange-active">{{ ucfirst($permission->model) }}</span>
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle">{{ $permission->display_name }}</td>
                                    <td style="vertical-align: middle">{{ $permission->name }}</td>
                                    @if(Auth::user()->can(['show-permissions', 'edit-permissions', 'destroy-permissions']))
                                        <td>
                                            @if(Auth::user()->can('show-permissions'))
                                                <a href="{{ route('admin.permissions.show', $permission) }}" class="btn btn-success">
                                                    <i class="fa fa-eye"></i></a>
                                            @endif

                                            @if(Auth::user()->can('edit-permissions'))
                                                <a class="btn btn-primary" href="{{ route('admin.permissions.edit', $permission) }}">
                                                    <i class="fa fa-edit"></i></a>
                                            @endif

                                            @if(Auth::user()->can('destroy-permissions'))
                                                <a class="btn btn-danger" href="{{ route('admin.permissions.destroy', $permission) }}"
                                                   data-method="delete" data-confirm="Are you sure to delete this permission?">
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
                @if(Auth::user()->can('create-permissions'))
                    <p><a class="btn btn-primary" href="{{ route('admin.permissions.create') }}">Create new permission</a></p>
                @endif
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#dataTable').dataTable();
        });
    </script>
@endsection