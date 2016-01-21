@extends('layouts.admin')

@section('title', '| Users')

@section('content')

    <section class="content-header">
        <h1>Users
        </h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i> Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-user"></i> Create a user</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->post()->action(route('admin.users.store')) !!}

                    <div class="box-body">
                        {!! BootForm::text('Full name', 'name')->required() !!}
                        {!! BootForm::email('Email', 'email')->required() !!}
                        {!! BootForm::select('Role', 'role')->options($roles)->required() !!}
                        {!! BootForm::password('Password', 'password')->required() !!}
                        {!! BootForm::password('Confirm password', 'password_confirmation')->required() !!}
                        {!! BootForm::checkbox('Active', 'active') !!}
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