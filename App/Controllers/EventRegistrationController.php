<?php
declare(strict_types = 1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventAttendeeModel;
use App\Models\EventModel;
use App\Models\UserModel;
use Exception;
use Urls;

class EventRegistrationController extends BaseController {

    public function eventRegistrationStore() {
        
        if(!$this->isAjaxRequest()) {
            return $this->jsonResponse('error', 'Invalid request type.');
        }

        try {
            $data = $_POST;
            $event_code = $data['event_code'] ?? null;
            $full_name = $data['full_name'];
            $email = trim($data['email']);
            $phone = $data['phone'];

            if(empty($full_name) || empty($email) || empty($phone)) {
                throw new Exception('Please fill Full Name, Email, Phone input.');
            }

            $eventQuery = EventModel::where('code', $event_code)->first();
            if(!$eventQuery) {
                throw new Exception('Invalid Event access.');
            }

            //**** Check Event is softDeleted or not
            if($eventQuery->is_delete === 1) {
                throw new Exception('Event is deleted by owner.');
            }

            //**** Check Event is active or not
            if($eventQuery->is_active === 0) {
                throw new Exception('Event is deactivated by owner.');
            }

            //**** Check Registration Capacity Over/Exist or not
            $registeredQty = EventAttendeeModel::where('event_code', $eventQuery->code)->count('id');
            if($registeredQty >= $eventQuery->max_capacity) {
                throw new Exception('Event registration capacity is full.');
            }

            //**** Check Registration Date time expire or not
            $event_date_time = $eventQuery->event_date_time;
            if(strtotime($event_date_time) < strtotime(date('Y-m-d H:i:s'))) {
                throw new Exception('Event registration time is expire.');
            }

            //**** Check Email and phone is trying again registration or not
            $attendeeQuery = EventAttendeeModel::where('event_code', $eventQuery->code)
                            ->where('email', $email)
                            ->where('phone_number', $phone)
                            ->first();
            if($attendeeQuery) {
                throw new Exception('You are already registered for this event.');
            }

            //**** Check Auth User is trying again registration or not
            $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'first_name', 'last_name', 'email', 'phone', 'role']);
            if($userInfo) {
                $attendeeQuery = EventAttendeeModel::where('event_code', $eventQuery->code)
                                ->where('user_id', $userInfo->id)
                                ->first();
                if($attendeeQuery) {
                    throw new Exception('You are already registered for this event.');
                }

                //**** Check This is auth user event or not. if auth user event no need to book registration.
                if($eventQuery->user_id === $userInfo->id) {
                    throw new Exception('This is your event, You can not register.');
                }
            }

           
            //**** Note: Here I did not check guest_registration_status condition due to requirement. But It can update in future.

            $eventAttendee = new EventAttendeeModel();
            $eventAttendee->event_code = $eventQuery->code;
            !empty($userInfo) ? $eventAttendee->user_id = $userInfo->id : null;
            $eventAttendee->full_name = $full_name;
            $eventAttendee->email = $email;
            $eventAttendee->phone_number = $phone;
            $eventAttendee->registration_date = date('Y-m-d H:i:s');

            if($eventAttendee->save()) {
                return $this->jsonResponse('success', 'Event registration success.', ['event_code' => $event_code]);
            } else {
                throw new Exception('Event registration failed.');
            }
           
        } catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

   

}
