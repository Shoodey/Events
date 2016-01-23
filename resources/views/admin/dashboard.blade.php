@extends('layouts.admin')

@section('title', '| Dashboard')

@section('content')

    <section class="content-header">
        <h1>
            Dashboard
            <small>A general overview</small>
        </h1>
        {!! Breadcrumbs::render('dashboard') !!}
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-blue">
                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Users</span>
                        <span class="info-box-number">{{ $usersCount }}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{$activeUsers*100/$usersCount}}%"></div>
                        </div>
                        <span class="progress-description">
                        {{ $inactiveUsers }} {{ str_plural('user', $inactiveUsers) }} to activate.
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-maroon">
                    <span class="info-box-icon"><i class="fa fa-tags"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Roles</span>
                        <span class="info-box-number">{{ $rolesCount }}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ $usersWithRole*100/$usersCount }}%"></div>
                        </div>
                        <span class="progress-description">
                            {{ $usersWithRole }} {{ str_plural('user', $usersWithRole) }} with role.
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange">
                    <span class="info-box-icon"><i class="fa fa-adjust"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Permissions</span>
                        <span class="info-box-number">{{ $permissionsCount }}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: 100%"></div>
                        </div>
                        <span class="progress-description">
                            {{ $permissionsCount/7 }} models.
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection