<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $login = $req->input("login");
        $password = $req->input("password");
        $dbuser = new Users();
        $user = $dbuser ->where("login", $login, )->where("password", $password)->first(); // TODO: Реализовать проверку хешированного пароля
        if($user == null){
            return redirect()->route('login_page')->with('UserNotFound', "Неверное имя пользователя или пароль");
        }
        else{
            session(['user_id' => $user->id]);
            return redirect()->route('main');
        }
    }
    public function login_view()
    {
        return view('login');
    }

    public function register(RegisterRequest $req ){
        $user = new Users();
        $user->login = $req->input("login");
        $user->email = $req->input("email");
        $user->password = $req->input("password");
         // !!! TODO: Добавить хеширование паролей !!!
        $user->save();
        session(['user_id' => $user->id]);
        return redirect()->route('main');
    }
    public function register_view(){
        return view("register");
    }
    
}
