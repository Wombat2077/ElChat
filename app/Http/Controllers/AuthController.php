<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;

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
            Auth::login($user);
            return redirect()->route('main');
        }
    }
    public function logout(Request $req): RedirectResponse
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
     
        return redirect('/');
    }

    public function login_view()
    {
        return view('login');
    }

    public function register(RegisterRequest $req ){
        $user = new Users();
        $login = $req->input("login");
        if($user->where('login', $login)->first() != null){
            return redirect()->route("register_page")->with("UserAlreadyExist", "User with this login already exist");
        }
        $user->login = $login;
        $user->email = $req->input("email");
        $user->password = crypt($req->input("password"));
         // !!! TODO: Добавить хеширование паролей !!!
        $user->save();
        Auth::login($user);
        return redirect()->route('main');
    }
    public function register_view(){
        return view("register");
    }
    
}
