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
                        <h3 class="box-title"><i class="fa fa-adjust"></i> Create a permission</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->post()->action(route('admin.permissions.store')) !!}

                    <div class="box-body">
                        {!! BootForm::text('Permission', 'name')->placeholder('method-controller (plural)')->required() !!}
                        {!! BootForm::text('Display name', 'display_name')->required() !!}
                        {!! BootForm::select('Model', 'model')->options($models)->required() !!}
                        {!! BootForm::textarea('Description', 'description')->rows(3) !!}
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