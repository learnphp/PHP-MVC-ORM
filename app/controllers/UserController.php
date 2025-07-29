<?php

namespace App\Controllers;

use App\Services\Auth;
use Core\View;
use Exception;

class UserController
{
    private $authService;

    public function __construct()
    {
        $this->authService = new Auth();
    }

    public function registerForm($errors = [])
    {
        View::render('user.register', ['errors' => $errors]);
    }
    public function register()
    {
        try {
            $input = $_POST;
            $errors = [];
            if (empty($input['email'])) {
                $errors[] = "Email is required";
            }

            if (empty($input['password'])) {
                $errors[] = "Password is required";
            }

            if ($errors) {
                // Render the form again with errors
                $this->registerForm($errors);
                return;
            }

            // $user = $this->authService->register([
            //     'email' => $email,
            //     'password' => $password
            // ]);
            $user = $this->authService->register($input);
            echo json_encode($user);
        } catch (Exception $e) {
            $errors = [$e->getMessage()];
            $this->registerForm($errors);
            return;
        }
    }

    public function loginForm($errors = [])
    {
        View::render('user.login', ['errors' => $errors]);
    }
    public function login()
    {
        //$input = json_decode(file_get_contents("php://input"), true);
        $input = $_POST;
        $user = $this->authService->login($input['email'], $input['password']);
        if ($user) {
            echo json_encode(["message" => "Login successful", "user" => $user]);
        } else {
            http_response_code(401);
            echo json_encode(["message" => "Invalid credentials"]);
        }
    }
}
