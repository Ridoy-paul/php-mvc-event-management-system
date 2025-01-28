<?php

define('BASE_URL', URL);

class Urls {


    public static function indexPage() {
        return BASE_URL;
    }
    
    // Authentication Routes
    public static function authLogin() {
        return BASE_URL . 'auth/login';
    }

    public static function authLoginSubmit() {
        return BASE_URL . 'auth/login-submit';
    }
    
    public static function authRegister() {
        return BASE_URL . 'auth/register';
    }

    public static function authRegisterStore() {
        return BASE_URL . 'auth/register-store';
    }

    public static function authDashboard() {
        return BASE_URL . 'auth/dashboard';
    }

    public static function authLogout() {
        return BASE_URL . 'auth/logout';
    }

    

    
    

    
    public static function getSingleDynamicPage($slug) {
        return BASE_URL . 'get-dynamic-pages/' . urlencode($slug);
    }

    

}

?>
