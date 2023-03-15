<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Novu\SDK\Novu;

class NotificationsController extends Controller
{
    /**
     * Novu instance
     */
    private $novu;

    public function __construct()
    {
        $this->novu = new Novu(config('novu.novu_api_key'));
    }

    public function getNotificationsGroups()
    {
        return response()->json($this->novu->getNotificationGroups()->toArray());
    }

    public function createTemplate()
    {
        $res = $this->novu->createNotificationTemplate([
            "name" => "my-push-six",
            "notificationGroupId" => "6409c0dbe5d10c2178942e3f",
            // "tags" => ["tags"],
            // "description" => "description",
            "steps" => [
                [
                    'template' => [
                        "content" => "Hello User! this is push six!",
                        "title" => "My Pushsix title",
                        "type" => "push",
                        "contentType" => "editor",
                        "variables" => []
                    ],
                ],
            ],
            // "active" => true, // if uncomment - respond with dummy exception: 'active must be a boolean value'
            // "draft" => true,
            // "critical" => true,
            // "preferenceSettings" => preferenceSettings
        ])->toArray();

        return response()->json($res, Response::HTTP_CREATED);
    }

    public function createSubscriber()
    {
        $subscriber = $this->novu->createSubscriber([
            'subscriberId' => 'vito_co',
            'email' => 'vito.co@ya.ru',

            'firstName' => 'Vito',
            'lastName' => 'Co', // optional
            // 'phone' => '<insert-phone>', //optional
            // 'avatar' => '<insert-avatar>', // optional
        ])->toArray();

        return response()->json($subscriber, Response::HTTP_CREATED);
    }

    public function updateSubscriberCredentials()
    {
        $response = $this->novu->updateSubscriberCredentials('some_user_ID_7873', [
            'providerId'  => 'fcm',
            'credentials' => [
                'deviceTokens' => ['dkxDmkwKQUO1GIMm0WxmQu:APA91bHwOlZ_U4zAqTBMIChonu-MQVqIRi_AZYKEXzmP5FNP8lYgFbwQHouTq_RvkvprgC6rCcCqUgrSKeDIkq8gS4A_xENERX2Lqwepjf9cPQBBxzJa4QeMqi1NRGsaTRHxQujUsRwo']
            ]
        ])->toArray();

        return response()->json($response);
    }

    public function triggerEvent()
    {
        $response = $this->novu->triggerEvent([
            'name' => 'pushsix',
            'payload' => ['customVariables' => 'Hello'],
            'to' => [
                'subscriberId' => 'some_user_ID_7873',
                // 'phone' => '07983882186'
            ]
        ])->toArray();

        $response = $this->novu->triggerEvent([
            'name' => 'appointment',
            'payload' => [
                'language' => 'en',
            ],
            'to' => [
                'subscriberId' => 'vito_co',
            ],
        ])->toArray();

        return response()->json($response);
    }
}
