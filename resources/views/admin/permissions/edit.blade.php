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
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-pencil-square-o"></i> Edit a permission</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->put()->action(route('admin.permissions.update', $permission)) !!}

                    <div class="box-body">
                        {!! BootForm::text('Permission', 'name')->placeholder('method-controller (plural)')->value(old('name', $permission->name))->required() !!}
                        {!! BootForm::text('Display name', 'display_name')->value(old('display_name', $permission->display_name))->required() !!}
                        {!! BootForm::select('Model', 'model')->options($models)->select(old('model', $permission->model))->required() !!}
                        {!! BootForm::textarea('Description', 'description')->value(old('description', $permission->description))->rows(3) !!}
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