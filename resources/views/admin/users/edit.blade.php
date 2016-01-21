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
                        <h3 class="box-title"><i class="fa fa-user"></i> Edit a user</h3>
                    </div>

                    {!! BootForm::openHorizontal($columnSizes)->put()->action(route('admin.users.update', $user)) !!}

                    <div class="box-body">
                        {!! BootForm::text('Full name', 'name')->value(old('name', $user->name))->required() !!}
                        {!! BootForm::email('Email', 'email')->value(old('email', $user->email))->required() !!}
                        {!! BootForm::select('Role', 'role')->options($roles)->required() !!}
                        {!! BootForm::password('Password', 'password')->placeholder('Leave empty of not changing.') !!}
                        {!! BootForm::password('Confirm password', 'password_confirmation')->placeholder('Leave empty of not changing.') !!}
                        @if($user->active)
                            {!! BootForm::checkbox('Active', 'active')->checked() !!}
                        @else
                            {!! BootForm::checkbox('Active', 'active') !!}
                        @endif
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