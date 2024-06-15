<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
class UserController extends Controller
{

    //Функция возвращает форму регистрации
    public function create()
    {
        return view('auth.register');
    }


    //Функция валидирует, записывает данные пользователя в бд и авторизует его
    public function store(Request $request)
    {
        $validated = $request->validate([
            'login' => 'required|unique:users|max:25',
            'name'  => 'required',
            'email' => 'required|unique:users',
            'number' => 'required',
            'password' => 'required|min:4',
        ]);

        $user = User::create([
        'name'     =>$request->name,
        'number'   =>$request->number,
        'email'    =>$request->email,
        'login'    =>$request->login,
        'password' =>bcrypt($request->password)]);
        Auth::login($user);

    return redirect('/')->with('success', 'Вы успешно зарегистрировались!');

    }

    //Функция возвращает форму входа
    public function loginform(){
        return view('auth.login');
    }    

    //Функция авторизации пользователя
    public function login(Request $request){
        $credentials = $request->validate([
            'login'    => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if(Auth::user()->isAdmin){
                return redirect('/admin')->with('success', 'Вы успешно вошли!');
            }
            else{
                return redirect('/')->with('success', 'Вы успешно вошли!');
            }
        }
        return back()->withErrors([
            'email' => 'Неверное имя пользователя или пароль',
        ])->onlyInput('email');




    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'Вы успешно вышли!');
    }
}
