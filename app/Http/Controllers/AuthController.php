<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    public function login($req)
    {
        $login = $req->input("login");
        $password = $req->input("password");
        $dbuser = new Users();
        $user = $dbuser ->where("Login", $login, )->where("Password", $password)->first(); // TODO: Реализовать проверку хешированного пароля
        if($user == null){
            return redirect()->route('login')->with('UserNotFound', "Неверное имя пользователя или пароль");
        }
        else{
            return redirect()->route('main')->with('UserSession', $user->ID);
        }
    }
    public function register($login, $email, $password, ){
        $user = new Users();
        $user->login = $login;
        $user->email = $email;
        $user->password = $password; // !!! ToDO: Добавить хеширование паролей !!!
        $user->save();
    }
}
