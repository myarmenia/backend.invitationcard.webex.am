<?php

use App\Http\Controllers\Admin\Category\CategoryCantroller;
use App\Http\Controllers\Admin\Template\CreateController;
use App\Http\Controllers\Admin\Template\EditController;
use App\Http\Controllers\Admin\Template\StoreController;
use App\Http\Controllers\Admin\Template\TemplateCantroller;
use App\Http\Controllers\Admin\Template\UpdateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Telegram\TelegramController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false, 'verify' => false,]);
Route::get('telegram', TelegramController::class);

Route::group(['middleware' => ['auth']], function () {
    // Route::name('admin.')->group(function () {
    //     Route::prefix('admin')->group(function () {
    //         Route::resource('/roles', RoleController::class);
    //         Route::resource('/users', UserController::class);
    //         Route::resource('/permissions', PermissionController::class);
    //     });
    // });

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::name('category.')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('', CategoryCantroller::class)->name('index');
        });
    });

    Route::name('template.')->group(function () {
        Route::prefix('template')->group(function () {
            Route::get('', TemplateCantroller::class)->name('index');
            Route::get('create', CreateController::class)->name('create');
            Route::post('store', StoreController::class)->name('store');
            Route::get('edit/{id}', EditController::class)->name('edit');
            Route::post('update/{id}', UpdateController::class)->name('update');

        });
    });


});
