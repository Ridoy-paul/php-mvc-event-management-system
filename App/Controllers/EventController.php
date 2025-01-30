<?php
declare(strict_types = 1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\UserModel;
use Exception;
use Urls;

class EventController extends BaseController {

    public function list() {
        $this->confirmLoggedIn();
        $title = "Event List";
        $this->render('event/event_list', ['title' => $title]);
    }

    public function create() {
        $this->confirmLoggedIn();
        $title = "Create Event";
        $this->render('event/create_event', ['title' => $title]);
    }

    // This function is used to Store New or Edited event data
    public function eventSave() {
        $this->confirmLoggedIn();
      
        if (!$this->isAjaxRequest()) {
            return $this->jsonResponse('error', 'Invalid request type.');
        }

        try {
            $data = $_POST;
            $files = $_FILES;

            if (empty($data['event_title']) || empty($data['event_date_time']) || empty($data['max_capacity'])) {
                throw new Exception('Please fill Event title, Date, max capacity input.');
            }

            $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'first_name', 'last_name', 'email', 'role']);

            // Check for Edited Save
            $event_code = $data['code'] ?? null;
            if($event_code) {
                $query = EventModel::where('code', $event_code);
                if($userInfo->role == 'user') {
                    $query->where('user_id', $userInfo->id);
                }
                if (!$query->first()) {
                    throw new Exception('Invalid Event Access.');
                }
            }

            $eventSave = EventModel::saveEventData(json_encode($data), $files, json_encode($userInfo));

            if($eventSave['status'] == 0) {
                throw new Exception($eventSave['message']);
            }
            
            return $this->jsonResponse('success', 'Event saved successfully.', ['redirect' => Urls::eventList()]);
           
        } catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

    


}
