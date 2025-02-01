<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventModel;
use App\Models\UserModel;
use Urls;

class FrontController extends BaseController {

    public function index() {
        $title = "Home";
    
        $sort = isset($_GET['sort']) && $_GET['sort'] == 'asc' ? 'ASC' : 'DESC';
        $userIdFilter = isset($_GET['user_id']) ? trim($_GET['user_id']) : '';
    
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 6;
        $offset = ($page - 1) * $perPage;
    
        $users = UserModel::where('role', 'user')->where('is_active', 1)->select('id', 'first_name', 'last_name')->get();
    
        $eventQuery = EventModel::where('events.is_delete', 0)
            ->where('events.is_active', 1)
            ->join('users', 'events.user_id', '=', 'users.id')
            ->select([
                'events.id', 'events.code', 'events.event_title', 'events.event_description', 'events.event_date_time',
                'events.max_capacity', 'events.is_active', 'events.is_delete', 'events.guest_registration_status',
                'users.id as user_id', 'users.first_name', 'users.last_name', 'users.email'
            ]);
    
        if (!empty($userIdFilter)) {
            $eventQuery->where('users.id', $userIdFilter);
        }
    
        $eventQuery->orderBy('events.id', $sort);
    
        $totalEvents = (clone $eventQuery)->count();
        $totalPages = ceil($totalEvents / $perPage);
        $eventList = $eventQuery->skip($offset)->take($perPage)->get();
    
        $this->render('front/front_page', [
            'title' => $title,
            'events' => $eventList,
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'sort' => $sort,
            'userIdFilter' => $userIdFilter
        ]);
    }
    

    public function eventDetails($code) {
        
        $eventInfo = EventModel::where('events.code', $code)
                    ->join('users', 'events.user_id', '=', 'users.id')
                    ->select([
                        'events.*', 'users.first_name', 'users.last_name', 'users.email'
                    ])
                    ->first();

        if($eventInfo === null) {
            $this->sessionMessage('error', 'No Event Found!');
            return $this->redirect(Urls::indexPage());
        }

        $title =  $eventInfo->event_title ?? null;

        $this->render('front/event_details', [
            'title' => $title,
            'event_info' => $eventInfo,
        ]);

    }
    
    

}

