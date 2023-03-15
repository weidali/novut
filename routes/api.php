<?php

use App\Http\Controllers\NotificationsController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Novu\SDK\Novu;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('notifications-groups', [NotificationsController::class, 'getNotificationsGroups']);
Route::post('create-template', [NotificationsController::class, 'createTemplate']);
Route::post('create-subscriber', [NotificationsController::class, 'createSubscriber']);
Route::post('update-subscriber-credentials', [NotificationsController::class, 'updateSubscriberCredentials']);
Route::post('trigger-event', [NotificationsController::class, 'triggerEvent']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
