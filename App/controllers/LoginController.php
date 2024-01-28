<?php

namespace App\Controllers;

use Core\View;
use App\Models\User;
use App\Services\Auth;

class LoginController
{
    public User $userModel;
    
    public $errors =  [
        "wrong_credentials" => "Špatné přihlašovací údaje",
        "user_exists" => "Uživatel s těmito údaji už v databázi existuje.",
    ];

    public function __construct()
    {
        $this->userModel = new user();
    }

    public function showLogin(): View
    {
        $error = $_GET['error'] ?? null;

        return View::render('login', [
            'title' => "Login do aplikace TodoApp",
            'error' => $this->errors[$error] ?? "",
        ]);
    }

    public function showRegisterForm(): View
    {
        $error = $_GET['error'] ?? null;

        return View::render('register', [
            'title' => "Login do aplikace TodoApp",
            'error' => $this->errors[$error] ?? "",
        ]);
    }

    public function registerUser($data)
    {
        $user = $this->userModel->emailExists($data['email']);

        if ($user) {
            //stopnu registeraci a vrátím ho zpět na registrační formulář s chybou
            return header('location: /Projekty/TodoApp/register?error=user_exists');
        } else {
            //provedu registraci / vytvořím záznám v tabulce users 
            $this->userModel->create($data);
            $registered_user = $this->userModel->emailExists($data['email']);
            Auth::login($registered_user['id']);


            return header('location: /Projekty/TodoApp/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return header('location: /Projekty/TodoApp/');
    }

    public function loginUser($data)
    {
        // z formuláře nám přijde email a heslo 

        // vezmeme email a najdeme usera a u něj zjistíme heslo 
        $user = $this->userModel->emailExists($data['email']);
        
        if ($user){
            // vezmeme heslo z databáze (hash) a heslo z formuláře a proženeme to password_verify 
            if (password_verify($data['password'], $user['password'])) {
                Auth::login($user['id']);
                return header('location: /Projekty/TodoApp/');
            } else {
                return header('location: /Projekty/TodoApp/login?error=wrong_credentials');
            }
        }else{
            return header('location: /Projekty/TodoApp/login?error=wrong_credentials');
        }
    }
}
