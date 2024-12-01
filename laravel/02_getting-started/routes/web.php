<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/configuration', function () {
    dump(App::environment()); // "local"

    dump(App::environment(['staging'])); // false
    dump(App::environment(['local', 'staging'])); // true

    // Accessing config values
    dump(Config::get('filesystems.disks.local'));

    dump(config('filesystems.disks.local'));
    dump(config('filesystems.disks.local2', 'default value'));

    dump(Config::string('app.name'));
    dump(Config::integer('auth.passwords.users.expire'));
    // dump(Config::float('auth.passwords.users.expire'));
    dump(Config::boolean('app.debug'));
    dump(Config::array('app.maintenance'));

    // Setting config values at runtime
    Config::set('foo.bar', 'runtime value');
    dump(config('foo.bar'));

    config(['foo.baz' => 'runtime value again']);
    dump(config('foo.baz'));
});
