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
    
        $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)
            ->first(['id', 'first_name', 'last_name', 'email', 'role']);
    
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 10;
        $offset = ($page - 1) * $perPage;
    
        $eventQuery = EventModel::orderBy('id', 'DESC')->where('is_delete', 0);
    
        if ($userInfo->role == 'user') {
            $eventQuery->where('user_id', $userInfo->id);
        }
    
        $totalEvents = $eventQuery->count();
        $totalPages = ceil($totalEvents / $perPage);
    
        if ($userInfo->role == 'admin') {
            $eventQuery->join('users', 'events.user_id', '=', 'users.id')
                ->select([
                    'events.id', 'events.code', 'events.event_title', 'events.event_date_time',
                    'events.max_capacity', 'events.is_active', 'events.is_delete', 'events.guest_registration_status',
                    'users.first_name', 'users.last_name', 'users.email'
                ]);
        } else {
            $eventQuery->select(['id', 'code', 'event_title', 'event_date_time', 'max_capacity', 'is_active', 'is_delete', 'guest_registration_status']);
        }
    
        $eventList = $eventQuery->skip($offset)->take($perPage)->get();
    
        $this->render('event/event_list', [
            'title' => $title,
            'userInfo' => $userInfo,
            'eventList' => $eventList,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }
    
    public function create() {
        $this->confirmLoggedIn();
        $title = "Create Event";
        $this->render('event/create_event', ['title' => $title]);
    }

    public function edit($code) {
        $this->confirmLoggedIn();
        $title = "Edit Event";

        $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'role']);
        
        $query = EventModel::where('code', $code);
        if($userInfo->role == 'user') {
            $query->where('user_id', $userInfo->id);
        }
        $eventData = $query->first();

        if($eventData === null) {
            return $this->redirect(Urls::eventList());
        }

        $this->render('event/edit_event', ['title' => $title, 'eventData' => $eventData]);
    }

    // This function is used to Store New or Edited event data
    public function eventSave() {
        $this->confirmLoggedIn();
      
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
            if($event_code) {
                $query = EventModel::where('code', $event_code);
                if($userInfo->role == 'user') {
                    $query->where('user_id', $userInfo->id);
                }
                if (!$query->first()) {
                    throw new Exception('Invalid Event Access.');
                }
            }

            $eventSave = EventModel::saveEventData(json_encode($data), json_encode($userInfo));

            if($eventSave['status'] == 0) {
                throw new Exception($eventSave['message']);
            }
            
            return $this->jsonResponse('success', 'Event saved successfully.', ['redirect' => Urls::eventList()]);
           
        } catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

    public function delete($code) {
        $this->confirmLoggedIn();
        $title = "Delete Event";

        $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'role']);
        
        $query = EventModel::where('code', $code);
        if($userInfo->role == 'user') {
            $query->where('user_id', $userInfo->id);
        }
        $eventData = $query->first();

        if($eventData === null) {
            return $this->redirect(Urls::eventList());
        }

        $eventData->is_delete = 1;
        $eventData->save();

        $this->sessionMessage('success', 'Event delete successfully.');
        return $this->redirect(Urls::eventList());

    }

    


}
