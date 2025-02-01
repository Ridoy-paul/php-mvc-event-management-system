<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventAttendeeModel;
use App\Models\EventModel;
use App\Models\UserModel;
use Urls;

class ReportController extends BaseController {

    public function event_attendee_list_datatable() {
        $this->confirmLoggedIn();
    
        $draw = $_GET['draw'] ?? 1;
        $start = $_GET['start'] ?? 0;
        $length = $_GET['length'] ?? 10;
        $searchValue = $_GET['search']['value'] ?? '';
    
        $orderColumnIndex = $_GET['order'][0]['column'] ?? 0;
        $orderDir = $_GET['order'][0]['dir'] ?? 'asc';
    
        $columns = [
            'event_attendees.registration_date',
            'events.code',
            'events.event_title',
            'event_attendees.full_name',
            'event_attendees.email',
            'event_attendees.phone_number'
        ];
    
        $orderByColumn = $columns[$orderColumnIndex] ?? 'event_attendees.id';
    
        $query = EventAttendeeModel::join('events', 'events.code', '=', 'event_attendees.event_code')
            ->select([
                'event_attendees.id',
                'event_attendees.registration_date',
                'event_attendees.full_name',
                'event_attendees.email',
                'event_attendees.phone_number',
                'events.code as event_code',
                'events.event_title',
            ]);
    
        // Check User is admin or user. if admin then can see all to list, if user then can see only his / her events attendee lists.
        $userInfo = UserModel::where('id', USER_INFO['id'] ?? null)->first(['id', 'role']);
        if ($userInfo->role == 'user') {
            $query = $query->where('events.user_id', $userInfo->id);
        }
    
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('event_attendees.full_name', 'LIKE', "%$searchValue%")
                  ->orWhere('event_attendees.registration_date', 'LIKE', "%$searchValue%")
                  ->orWhere('event_attendees.email', 'LIKE', "%$searchValue%")
                  ->orWhere('event_attendees.phone_number', 'LIKE', "%$searchValue%")
                  ->orWhere('events.event_title', 'LIKE', "%$searchValue%")
                  ->orWhere('events.code', 'LIKE', "%$searchValue%");
            });
        }
    
        $totalRecordsQuery = EventAttendeeModel::join('events', 'events.code', '=', 'event_attendees.event_code');
        if ($userInfo->role == 'user') {
            $totalRecordsQuery->where('events.user_id', $userInfo->id);
        }
        $totalRecords = $totalRecordsQuery->count();
    
        $filteredRecords = $query->count();
    
        $data = $query->orderBy($orderByColumn, $orderDir)
            ->skip($start)
            ->take($length)
            ->get();
    
        // Response JSON
        $response = [
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $filteredRecords,
            "data" => $data
        ];
    
        echo json_encode($response);
    }
    
    


}

