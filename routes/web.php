<?php

use App\Http\Controllers\Admin\Category\CategoryCantroller;
use App\Http\Controllers\Admin\ChangeStatusController;
use App\Http\Controllers\Admin\DeleteItemController;
use App\Http\Controllers\Admin\Tariff\TariffController;
use App\Http\Controllers\Admin\Template\CreateController;
use App\Http\Controllers\Admin\Template\EditController;
use App\Http\Controllers\Admin\Template\StoreController;
use App\Http\Controllers\Admin\Template\TemplateCantroller;
use App\Http\Controllers\Admin\Template\UpdateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Telegram\TelegramController;
use App\Http\Controllers\TestQRController;
use App\Services\ChangeStatusService;
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

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::name('tariff.')->group(function () {
        Route::prefix('tariff')->group(function () {
            Route::get('', TariffController::class)->name('index');
            Route::get('edit/{id}', \App\Http\Controllers\Admin\Tariff\EditController::class)->name('edit');
            Route::post('update/{id}', \App\Http\Controllers\Admin\Tariff\UpdateController::class)->name('update');
        });
    });

    Route::name('category.')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('', CategoryCantroller::class)->name('index');
            Route::get('create',\App\Http\Controllers\Admin\Category\CreateController::class)->name('create');
            Route::post('store', \App\Http\Controllers\Admin\Category\StoreController::class)->name('store');
            Route::get('edit/{id}', \App\Http\Controllers\Admin\Category\EditController::class)->name('edit');
            Route::post('update/{id}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('update');
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

    Route::post('change-status', [ChangeStatusController::class, 'change_status'])->name('change_status');
    Route::get('delete-item/{tb_name}/{id}', [DeleteItemController::class, 'index'])->name('delete_item');
    Route::get('/qr', [TestQRController::class, 'show']);

});
