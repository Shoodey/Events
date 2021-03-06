@extends('layouts.admin')

@section('title', '| Roles')

@section('content')

    <section class="content-header">
        <h1>Roles</h1>
        {!! Breadcrumbs::render('edit-roles', $role) !!}
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-tag"></i> Edit a role</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->put()->action(route('admin.roles.update', $role)) !!}

                    <div class="box-body">
                        {!! BootForm::text('Role', 'name')->value(old('name', $role->name))->required() !!}
                        {!! BootForm::text('Display name', 'display_name')->value(old('display_name', $role->display_name))->required() !!}
                        {!! BootForm::textarea('Description', 'description')->value(old('description', $role->description))->rows(3) !!}
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-adjust"></i> Permissions</h3>
                    </div>

                    <div class="box-body">

                        <div class="callout callout-danger">
                            <p>
                                All <code>create, save</code> and <code>edit, update</code> permissions must always go along.
                            </p>
                        </div>

                        @foreach($permissions->groupBy('model') as $model => $permissions)
                            @if($permissions->first()->model == 'users')
                                <?php $color = 'text-blue'; $iCheck = 'iCheck-blue'?>
                            @elseif($permissions->first()->model == 'roles')
                                <?php $color = 'text-maroon';  $iCheck = 'iCheck-red' ?>
                            @elseif($permissions->first()->model == 'permissions')
                                <?php $color = 'text-orange';  $iCheck = 'iCheck-orange'?>
                            @endif

                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title {{ $color }}">{{ ucfirst($model) }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        @foreach($permissions as $permission)

                                            <div class="checkbox icheck">
                                                <label>
                                                    @if(in_array($permission->id, $role->perms->lists('id')->toArray()))
                                                        <input id="{{ $permission->name }}" class="{{ $iCheck }}" type="checkbox" name="permissions[{{ $permission->id }}]" checked>
                                                    @else
                                                        <input id="{{ $permission->name }}" class="{{ $iCheck }}" type="checkbox" name="permissions[{{ $permission->id }}]">
                                                    @endif
                                                    {{ $permission->display_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="box-footer">
                        {!! BootForm::submit('Update')->class('btn btn-primary') !!}
                    </div>


                    {!! BootForm::close() !!}
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $(function () {
            $('.iCheck-red').iCheck({
                checkboxClass: 'icheckbox_square-red'
            });
            $('.iCheck-blue').iCheck({
                checkboxClass: 'icheckbox_square-blue'
            });
            $('.iCheck-orange').iCheck({
                checkboxClass: 'icheckbox_square-orange'
            });

            var models = ['users', 'roles', 'permissions'];

            jQuery.each(models, function(index, value) {
                $("#create-" + value).on('ifChecked', function(){
                    $("#store-" + value).iCheck('check');
                }).on('ifUnchecked', function(){
                    $("#store-" + value).iCheck('uncheck');
                });

                $("#store-" + value).on('ifChecked', function(){
                    $("#create-" + value).iCheck('check');
                }).on('ifUnchecked', function(){
                    $("#create-" + value).iCheck('uncheck');
                });

                $("#edit-" + value).on('ifChecked', function(){
                    $("#update-" + value).iCheck('check');
                }).on('ifUnchecked', function(){
                    $("#update-" + value).iCheck('uncheck');
                });

                $("#update-" + value).on('ifChecked', function(){
                    $("#edit-" + value).iCheck('check');
                }).on('ifUnchecked', function(){
                    $("#edit-" + value).iCheck('uncheck');
                });
            });

        });
    </script>
@endsection