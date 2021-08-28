<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\http\Controllers\UserController;
use App\http\Controllers\PermissionController;
use App\http\controllers\LeaveController;
use App\http\controllers\NoticeController;
use App\http\controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::view('/myproject','admin.create');

//Route::get('/departments/create', [App\Http\Controllers\DepartmentController::class, 'create'])->name('create');

Route::group(['middleware'=>'auth'],function() {

    Route::get('/', function () {
        return view('welcome');
    });    
    
    Route::resource('departments', DepartmentController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);
    
    Route::resource('roles', RoleController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);
    
    Route::resource('users', UserController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);
    
    Route::resource('permissions', PermissionController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);
    
    Route::resource('leaves', LeaveController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);

    
    // Route::post('accept-reject-leave/{id}','LeaveController@acceptReject')->name('accept.reject');

    Route::post('accept-reject-leave/{id}', [LeaveController::class, 'acceptReject'])->name('accept.reject');

    Route::resource('notices', NoticeController::class)->only([
        'index', 'create','store','edit','update','destroy',
    ]);

    Route::get('/mail', [MailController::class, 'create']);

    Route::post('/mail', [MailController::class, 'store'])->name('mails.store');
});


   




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
