<?php

use App\Http\Controllers\API\ClientFeedbackController;
use App\Http\Controllers\API\EventResultController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\Payment\ResultController;
use App\Http\Controllers\API\TariffsController;
use App\Http\Controllers\Telegram\TelegramController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['setlang']], function ($router) {
    Route::get('home', HomeController::class);

    Route::post('form', FormController::class);
    Route::get('payment-result', ResultController::class);
    Route::get('event-result', EventResultController::class);
    Route::get('telegram', TelegramController::class);

    Route::post('client-feedback', ClientFeedbackController::class);
    Route::get('tariffs', TariffsController::class);

});

