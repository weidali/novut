<?php

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

Route::post('create-template', function() {

    $novu = new Novu('b1403613a6ed392122afcf21084d0245');

    
});

Route::get('notifications-groups', function () {

    $novu = new Novu('b1403613a6ed392122afcf21084d0245');

    return response()->json($novu->getNotificationGroups()->toArray());
});

Route::post('create-subscriber', function () {
    
    $novu = new Novu('b1403613a6ed392122afcf21084d0245');

    $subscriber = $novu->createSubscriber([
        'subscriberId' => 'some_user_ID_7873',
        'email' => 'someexample@mail.com', // optional
        // 'firstName' => '<insert-firstname>', // optional
        // 'lastName' => '<insert-lastname>', // optional
        // 'phone' => '<insert-phone>', //optional
        // 'avatar' => '<insert-avatar>', // optional
    ])->toArray();

    return response()->json($subscriber, Response::HTTP_CREATED);
});

Route::post('update-subscriber-credentials', function () {

    $novu = new Novu('b1403613a6ed392122afcf21084d0245');

    $response = $novu->updateSubscriberCredentials('some_user_ID_7873', [
        'providerId'  => 'fcm',
        'credentials' => [
            'deviceTokens' => ['dkxDmkwKQUO1GIMm0WxmQu:APA91bHwOlZ_U4zAqTBMIChonu-MQVqIRi_AZYKEXzmP5FNP8lYgFbwQHouTq_RvkvprgC6rCcCqUgrSKeDIkq8gS4A_xENERX2Lqwepjf9cPQBBxzJa4QeMqi1NRGsaTRHxQujUsRwo']
        ]
    ])->toArray();

    return response()->json($response);
});

Route::post('trigger-event', function () {

    $novu = new Novu('b1403613a6ed392122afcf21084d0245');

    $response = $novu->triggerEvent([
        'name' => 'pushsix',
        'payload' => ['customVariables' => 'Hello'],
        'to' => [
            'subscriberId' => 'some_user_ID_7873',
            // 'phone' => '07983882186'
        ]
    ])->toArray();

    return response()->json($response);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
