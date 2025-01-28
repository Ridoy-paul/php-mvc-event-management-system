<?php
declare(strict_types=1);

namespace App\Controllers;
use App\Controllers\BaseController;

class FrontController extends BaseController {

    public function index() {
       
        $title = "Home | Event Management System";
        $this->render('front/front_page', ['title' => $title]);
    }
    

}

