<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Integration;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Illuminate\Support\Facades\DB;

// Home
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Bosh sahifa', route('dashboard'));
});

// Home > Integration(get)
Breadcrumbs::for('get-integration', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Qabul qiluvchi integratsiyalar', route('get-integration'));
});

// Home > Integration(post)
Breadcrumbs::for('post-integration', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Yuboruvchi integratsiyalar', route('post-integration'));
});

// Home > Integration  > Create
Breadcrumbs::for('integration.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Yangi integratsiya qo\'shish', route('integration.create'));
});

// Home > Integration(edit)
Breadcrumbs::for('integration.edit', function (BreadcrumbTrail $trail, $id) {
    $integration = Integration::findObj($id);
    $trail->parent('dashboard');
    if($integration->int01 == 2) {
        $trail->push('Yuboruvchi integratsiyalar', route('post-integration'));
    }
    else{
        $trail->push('Qabul qiluvchi integratsiyalar', route('get-integration'));
    }
    $trail->push($integration->name, route('integration.edit', $integration->id));
});

// Home > Integration  > Log
Breadcrumbs::for('log-integration', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Jurnal', route('log-integration'));
});
