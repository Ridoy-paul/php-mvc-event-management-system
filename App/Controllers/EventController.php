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
            $thumbnail = $_FILES['thumbnail'] ?? null;

            //print_r($data);
            //return;

            if (empty($data['event_title']) || empty($data['event_date_time']) || empty($data['max_capacity'])) {
                throw new Exception('Please fill required fields.');
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

            //echo json_encode(['status' => 'error', 'userInfo' => $userInfo]);
            //return;
            $eventQuery = EventModel::saveEventData($data, $thumbnail, $userInfo);
            
            return $this->jsonResponse('error', $eventQuery);
            
        } catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

    


}
