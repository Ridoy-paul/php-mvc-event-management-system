<?php

namespace App\Controllers;
use Urls;

abstract class BaseController {
    protected function render(string $viewPath, array $data = []): void
    {
        extract($data);

        $title = $data['title'] ?? 'Event Management System';

        require_once APP . 'views/layouts/app.php';
        require_once APP . 'views/' . $viewPath . '.php';
        require_once APP . 'views/layouts/footer.php';
    }

    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }

    protected function confirmNotLoggedIn(): void
    {
        if (USER_LOGGED) {
            header('Location: ' . Urls::authDashboard());
            exit();
        }
    }

    protected function confirmLoggedIn(): void
    {
        if (!USER_LOGGED) {
            header('Location: ' . Urls::authLogin());
            exit();
        }
    }

    public function jsonResponse(string $status, string $message, array $data = []) {
        echo json_encode(array_merge(['status' => $status, 'message' => $message], $data));
        exit();
    }

    public function isAjaxRequest(): bool {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }

    

}
