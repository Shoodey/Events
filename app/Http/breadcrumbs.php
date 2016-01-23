<?php

/*
 * Dashboard
 */
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', url('/'));
});

/*
 * Users
 */
Breadcrumbs::register('index-users', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Users', route('admin.users.index'));
});

Breadcrumbs::register('create-users', function($breadcrumbs) {
    $breadcrumbs->parent('index-users');
    $breadcrumbs->push('Create', route('admin.users.create'));
});

Breadcrumbs::register('edit-users', function($breadcrumbs, $user) {
    $breadcrumbs->parent('index-users');
    $breadcrumbs->push('Edit', route('admin.users.edit', $user));
});

/*
 * Roles
 */
Breadcrumbs::register('index-roles', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Roles', route('admin.roles.index'));
});

Breadcrumbs::register('show-roles', function($breadcrumbs, $role) {
    $breadcrumbs->parent('index-roles');
    $breadcrumbs->push('Show', route('admin.roles.show', $role));
});

Breadcrumbs::register('create-roles', function($breadcrumbs) {
    $breadcrumbs->parent('index-roles');
    $breadcrumbs->push('Create', route('admin.roles.create'));
});

Breadcrumbs::register('edit-roles', function($breadcrumbs, $role) {
    $breadcrumbs->parent('index-roles');
    $breadcrumbs->push('Edit', route('admin.roles.edit', $role));
});

/*
 * Permissions
 */
Breadcrumbs::register('index-permissions', function($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Permissions', route('admin.permissions.index'));
});

Breadcrumbs::register('show-permissions', function($breadcrumbs, $permissions) {
    $breadcrumbs->parent('index-permissions');
    $breadcrumbs->push('Show', route('admin.permissions.show', $permissions));
});

Breadcrumbs::register('create-permissions', function($breadcrumbs) {
    $breadcrumbs->parent('index-permissions');
    $breadcrumbs->push('Create', route('admin.permissions.create'));
});

Breadcrumbs::register('edit-permissions', function($breadcrumbs, $permissions) {
    $breadcrumbs->parent('index-permissions');
    $breadcrumbs->push('Edit', route('admin.permissions.edit', $permissions));
});