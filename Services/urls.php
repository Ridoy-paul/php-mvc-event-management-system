<?php

define('BASE_URL', URL);

class Urls {


    public static function indexPage() {
        return BASE_URL;
    }
    
    // Auth Routes start -------
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

    public static function authForgotPassword() {
        return BASE_URL . 'auth/forgot-password';
    }

    public static function authForgotPasswordSendLink() {
        return BASE_URL . 'auth/forgot-password-send-link';
    }
    

    public static function authLogout() {
        return BASE_URL . 'auth/logout';
    }

    //Auth route End ---------


    // Event Route Start -------------
    public static function eventList() {
        return BASE_URL . 'event/list';
    }

    public static function eventCreate() {
        return BASE_URL . 'event/create';
    }

    

    

    
    

    
    public static function getSingleDynamicPage($slug) {
        return BASE_URL . 'get-dynamic-pages/' . urlencode($slug);
    }

    

}

?>
