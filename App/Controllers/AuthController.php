<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Urls;

class AuthController extends BaseController {

    public static function storeSession($user) {
        $_SESSION['user'] = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'role' => $user->role ?? 'user',
            'image' => $user->image ?? '',
        ];
    }

    public function login() {
        if(USER_LOGGED){
            header('Location: ' . Urls::authDashboard());
            exit();
        }

        $title = "Login";
        $this->render('front/auth/login', ['title' => $title]);
    }

    public function loginSubmit() {
        if (USER_LOGGED) {
            echo json_encode(['status' => 'error', 'message' => 'You are already logged in.']);
            return;
        }
    
        header('Content-Type: application/json');
        if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request type.']);
            return;
        }
    
        $data = $_POST;
        if (empty($data['email']) || empty($data['password'])) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            return;
        }
    
        $email = filter_var(trim($data['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($data['password']);
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
            return;
        }
    
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();
    
        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
            return;
        }
    
        if (!password_verify($password, $user->password)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email or password.']);
            return;
        }

        $this->storeSession($user);
        echo json_encode(['status' => 'success', 'message' => 'Login successful!', 'redirect' => Urls::authDashboard()]);
    }
    

    //Register
    public function register() {
        if(USER_LOGGED){
            header('Location: ' . Urls::authDashboard());
            exit();
        }

        $title = "Register";
        $this->render('front/auth/register', ['title' => $title]);
    }


    // Registration Store
    public function registrationStore(){
        if(USER_LOGGED){
            echo json_encode(['status' => 'error', 'message' => 'You are already logged in.']);
            return;
        }

        header('Content-Type: application/json');
        if (!(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request type.']);
            return;
        }

        $data = $_POST;
        // Server-side validation
        if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || 
            empty($data['phone']) || empty($data['password']) || empty($data['confirm_password']) || 
            empty($data['terms'])) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            return;
        }

        if ($data['password'] !== $data['confirm_password']) {
            echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
            return;
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
            return;
        }

        // Check if email or phone already exists
        $user = UserModel::where('email', $data['email'])->orWhere('phone', $data['phone'])->first(['id', 'email', 'phone']);
        if ($user) {
            if($user->email == $data['email']){
                echo json_encode(['status' => 'error', 'message' => 'Email address already exists.']);
                return;
            }
            if($user->phone == $data['phone']){
                echo json_encode(['status' => 'error', 'message' => 'Phone number already exists.']);
                return;
            }
        }

        $user = new UserModel();
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);

        if ($user->save()) {
            $this->storeSession($user);
            echo json_encode(['status' => 'success', 'message' => 'Registration successful!', 'redirect' => Urls::authDashboard()]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to register. Please try again.']);
        }
    }

    public function dashboard() {
        $title = "Dashboard";
        $this->render('dashboard/dashboard', ['title' => $title]);
    }

    public function logout() {
        session_destroy();
        header('Location: ' . Urls::indexPage());
        exit();
    }



    

}

