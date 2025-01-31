<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventModel;

class FrontController extends BaseController {

    public function index() {
        $title = "Home | Event Management System";
    
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 6;
        $offset = ($page - 1) * $perPage;
    
        $eventQuery = EventModel::where('events.is_delete', 0)
            ->where('events.is_active', 1)
            ->join('users', 'events.user_id', '=', 'users.id')
            ->select([
                'events.id', 'events.code', 'events.event_title', 'events.event_description', 'events.event_date_time',
                'events.max_capacity', 'events.is_active', 'events.is_delete', 'events.guest_registration_status',
                'users.first_name', 'users.last_name', 'users.email'
            ])
            ->orderBy('events.id', 'DESC');
    
        $totalEvents = (clone $eventQuery)->count();
        $totalPages = ceil($totalEvents / $perPage);
    
        $eventList = $eventQuery->skip($offset)->take($perPage)->get();
    
        $this->render('front/front_page', [
            'title' => $title,
            'events' => $eventList,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
    }
    
    

}

