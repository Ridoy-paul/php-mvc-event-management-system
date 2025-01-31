<?php
declare(strict_types = 1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\UserModel;
use Exception;
use Urls;

class EventRegistrationController extends BaseController {

    public function eventRegistrationStore() {
        
        if (!$this->isAjaxRequest()) {
            return $this->jsonResponse('error', 'Invalid request type.');
        }

        try {
            $data = $_POST;

            if (empty($data['event_title']) || empty($data['event_date_time']) || empty($data['max_capacity'])) {
                throw new Exception('Please fill Event title, Date, max capacity input.');
            }

            $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'first_name', 'last_name', 'email', 'role']);

            // Check for Edited Save
            $event_code = $data['code'] ?? null;
            if(!$event_code) {

            }

            $query = EventModel::where('code', $event_code);

            //return $this->jsonResponse('success', 'Event saved successfully.', ['redirect' => Urls::eventList()]);
           
        } catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

   

}
