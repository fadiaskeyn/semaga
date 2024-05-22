<?php

// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// [ADMIN]
// Dashboard
Breadcrumbs::for('Dashboard1', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

// Data
Breadcrumbs::for('Data', function (BreadcrumbTrail $trail) {
    $trail->push('Data');
});

Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->push('Profile', route('profile.edit'));
});
// Dashboard > Data Murid
Breadcrumbs::for('DataMurid', function (BreadcrumbTrail $trail) {
    $trail->parent('Data');
    $trail->push('Data Murid', route('students.index'));
});

// Dashboard > Data Guru
Breadcrumbs::for('DataGuru', function (BreadcrumbTrail $trail) {
    $trail->parent('Data');
    $trail->push('Data Guru', route('users.index'));
});

Breadcrumbs::for('ujian', function (BreadcrumbTrail $trail) {
    $trail->push('Ujian');
});
Breadcrumbs::for('Penjadwalan', function (BreadcrumbTrail $trail) {
    $trail->push('Ujian');
    $trail->push('Pendjadwalan', route('ujian.index'));
});

// Dashboard > Ujian > Bank Soal
Breadcrumbs::for('BankSoal', function (BreadcrumbTrail $trail) {
    $trail->parent('ujian');
    $trail->push('Bank Soal', route('banks.index'));
});
