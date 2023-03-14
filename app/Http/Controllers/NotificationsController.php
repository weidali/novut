<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function createTemplate(Request $request)
    {
        // $data = $re
        $res = $this->novu->createNotificationTemplate([
            "name" => "pushsix",
            "notificationGroupId" => "6409c0dbe5d10c2178942e3f",
            // "tags" => ["tags"],
            // "description" => "description",
            "steps" => [
                [
                    'template' => [
                        "content" => "Hello User! this is push six!",
                        "title" => "Pushsix title",
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
}
