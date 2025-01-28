<?php

namespace App\Controllers;

abstract class BaseController
{
    protected function render(string $viewPath, array $data = []): void
    {
        extract($data);

        $title = $data['title'] ?? 'Event Management System';

        require_once APP . 'views/layouts/app.php';
        require_once APP . 'views/' . $viewPath . '.php';
        require_once APP . 'views/layouts/footer.php';
    }

    /**
     * Redirect to a specified URL.
     *
     * @param string $url
     */
    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
