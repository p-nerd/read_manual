<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
