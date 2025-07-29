<?php
namespace App\Services;

use App\Models\User;

class Auth {

    public function register($data) {
        $user = new User();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        return $user->create($data);
    }

    public function login($email, $password) {
        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return null;
    }
}

