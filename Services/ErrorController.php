<?php
declare(strict_types = 1);
namespace Services;

use App\Controllers\BaseController;

class ErrorController extends BaseController
{
    public function index()
    {
        $title = "404 Not Found";
        $this->render('error/index', ['title' => $title]);
    }
}

