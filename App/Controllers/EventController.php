<?php
declare(strict_types = 1);

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\EventModel;
use Urls;

class EventController extends BaseController {

    public function list() {
        if(!USER_LOGGED){
            header('Location: ' . Urls::authLogin());
            exit();
        }
        $title = "Event List";
        $this->render('event/event_list', ['title' => $title]);
    }

    public function create() {
        if(!USER_LOGGED){
            header('Location: ' . Urls::authLogin());
            exit();
        }
        $title = "Create Event";
        $this->render('event/create_event', ['title' => $title]);
    }


}
