<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use App\Controllers\FileController;

class EventModel extends Model
{
    protected $table = 'events';
    public $timestamps = false;
    protected $fillable = ['code', 'user_id', 'event_title', 'event_description', 'thumbnail', 'event_date_time', 'max_capacity', 'is_active', 'guest_registration_status', 'is_delete', 'created_at', 'updated_at'];

    private function generateCode():int {
        $code = rand(10000000, 9999999);
        if(EventModel::where('code', $code)->exists()) {
            $this->generateCode();
        }
        return $code;
    }

    public static function saveEventData($request, $thumbnail, $userInfo)
    {
        try {
            if($request['code']) {
                $event = EventModel::where('code', $request['code'])->first();
            }
            else {
                $event = new EventModel();
                $event->code = self::generateCode();
                $event->user_id = $userInfo->user_id;
            }
    
            $event->event_title = $request->event_title;
            $event->event_description = $request->event_description;
    
            $event->thumbnail = !empty($thumbnail) ? FileController::storeFile($thumbnail) : '';
    
            $event->event_date_time = $request->event_date_time;
            $event->max_capacity = $request->max_capacity;
            $event->is_active = $request->is_active;
            $event->guest_registration_status = $request->guest_registration_status;
            $event->save();
            return $event->id;

        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


}
