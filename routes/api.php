<?php

use App\Http\Controllers\API\Web\EventResultController;
use App\Http\Controllers\API\Web\FormController;
use App\Http\Controllers\API\Web\Payment\ResultController;
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

Route::post('form', FormController::class);
Route::get('payment-result', ResultController::class);
Route::post('event-result', EventResultController::class);
Route::get('telegram', TelegramController::class);


