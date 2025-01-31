<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Exception;
use Urls;

class AuthController extends BaseController {

    public static function storeAuthSession($user) {
        $_SESSION['user'] = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role ?? 'user',
            'image' => $user->image ?? '',
        ];
    }

    public function login() {
        $this->confirmNotLoggedIn();
        $title = "Login";
        $this->render('front/auth/login', ['title' => $title]);
    }

    public function loginSubmit() {
        if(USER_LOGGED) {
            return $this->jsonResponse('error', 'You are already logged in.');
        }
    
        header('Content-Type: application/json');
        if(!$this->isAjaxRequest()) {
            return $this->jsonResponse('error', 'Invalid request type.');
        }
    
        $data = $_POST;
        if(empty($data['email']) || empty($data['password'])) {
            return $this->jsonResponse('error', 'All fields are required.');
        }
    
        $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($data['password']);
    
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->jsonResponse('error', 'Invalid email format.');
        }
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
    
        if(!$user) {
            return $this->jsonResponse('error', 'Email not found.');
        }
    
        if(!password_verify($password, $user->password)) {
            return $this->jsonResponse('error', 'Invalid Password.');
        }

        $this->storeAuthSession($user);
        return $this->jsonResponse('success', 'Login successful!', ['redirect' => Urls::authDashboard()]);
    }
    

    //Register
    public function register() {
        $this->confirmNotLoggedIn();
        $title = "Register";
        $this->render('front/auth/register', ['title' => $title]);
    }

    //User Registration Data Store
    public function registrationStore() {
        if (USER_LOGGED) {
            return $this->jsonResponse('error', 'You are already logged in.');
        }
    
        header('Content-Type: application/json');
        if (!$this->isAjaxRequest()) {
            return $this->jsonResponse('error', 'Invalid request type.');
        }
    
        try {
            $data = $_POST;
            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || 
                empty($data['phone']) || empty($data['password']) || empty($data['confirm_password']) || 
                empty($data['terms'])) {
                throw new Exception('All fields are required.');
            }
    
            if ($data['password'] !== $data['confirm_password']) {
                throw new Exception('Passwords do not match.');
            }
    
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Invalid email address.');
            }
    
            $user = UserModel::where('email', $data['email'])->orWhere('phone', $data['phone'])->first(['id', 'email', 'phone']);
            if ($user) {
                if ($user->email == $data['email']) {
                    throw new Exception('Email address already exists.');
                }
                if ($user->phone == $data['phone']) {
                    throw new Exception('Phone number already exists.');
                }
            }
    
            $user = new UserModel();
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->email = trim($data['email']);
            $user->phone = $data['phone'];
            $user->role = 'user';
            $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
    
            if ($user->save()) {
                $this->storeAuthSession($user);
                return $this->jsonResponse('success', 'Registration successful!', ['redirect' => Urls::authDashboard()]);
            } 
            else {
                throw new Exception('Failed to register. Please try again.');
            }
        } 
        catch (Exception $e) {
            return $this->jsonResponse('error', $e->getMessage());
        }
    }

    // Forgot Password
    public function forgotPassword() {
        $this->confirmNotLoggedIn();
        $title = "Forgot Password";
        $this->render('front/auth/forgot-password', ['title' => $title]);
    }

    public function forgotPasswordSendLink() {
        $this->confirmNotLoggedIn();
        $title = "Forgot Password";
        $this->render('front/auth/forgot-password', ['title' => $title]);
    }

    public function dashboard() {
        $this->confirmLoggedIn();
        $title = "Dashboard";
        $this->render('dashboard/dashboard', ['title' => $title]);
    }

    public function logout() {
        $this->confirmLoggedIn();
        session_destroy();
        header('Location: ' . Urls::indexPage());
        exit();
    }

}

