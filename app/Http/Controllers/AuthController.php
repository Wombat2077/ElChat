<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class AuthController extends Controller
{
    public function login( $login = null, $password=null)
    {
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
        $dbuser = new Users();
        $dbuser->login = $login;
        $dbuser->email = $email;
        $dbuser->password = $password; // !!! ToDO: Добавить хеширование паролей !!!
        $dbuser->save();
    }
}
