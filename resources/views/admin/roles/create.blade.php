@extends('layouts.admin')

@section('title', '| Roles')

@section('content')

    <section class="content-header">
        <h1>Roles</h1>
        {!! Breadcrumbs::render('create-roles') !!}
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-tag"></i> Create a role</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->post()->action(route('admin.roles.store')) !!}

                    <div class="box-body">
                        {!! BootForm::text('Role', 'name')->required() !!}
                        {!! BootForm::text('Display name', 'display_name')->required() !!}
                        {!! BootForm::textarea('Description', 'description')->rows(3) !!}
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
                                                    <input id="{{ $permission->name }}" class="{{ $iCheck }}" type="checkbox" name="permissions[{{ $permission->id }}]">
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
                        {!! BootForm::submit('Create')->class('btn btn-primary') !!}
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