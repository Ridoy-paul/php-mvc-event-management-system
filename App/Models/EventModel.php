<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = ['code', 'user_id', 'event_title', 'event_description', 'thumbnail', 'event_date_time', 'max_capacity', 'is_active', 'guest_registration_status', 'is_delete', 'created_at', 'updated_at'];

    private static function generateCode(): string {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        
        for ($i = 0; $i < 5; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        if (EventModel::where('code', $code)->first()) {
            return self::generateCode();
        }
    
        return $code;
    }
    

    public static function saveEventData($request, $files, $userInfo)
    {
        try {
            $request = json_decode($request);
            $userInfo = json_decode($userInfo, true);
            $event_date_time = $request->event_date_time;

            //check date is greater than current date
            if (strtotime($event_date_time) <= strtotime(date('Y-m-d H:i:s'))) {
                throw new Exception('Event date should be greater than current date.');
            }

            if ($request->code) {
                $event = EventModel::where('code', $request->code)->first();
            } else {
                $event = new EventModel();
                $event->code = self::generateCode();
                $event->user_id = $userInfo['id'];
            }

            $event->event_title = $request->event_title;
            $event->event_description = $request->event_description;
            $event->event_date_time = $request->event_date_time;
            $event->max_capacity = $request->max_capacity;
            $event->is_active = $request->is_active;
            $event->guest_registration_status = $request->guest_registration_status;
            $event->save();
            
            return [
                'status' => 1,
            ];

        } catch (Exception $e) {
            return [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }



}
