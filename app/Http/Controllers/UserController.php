<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginValidation;
use App\Http\Requests\RegisterValidation;
use App\Http\Requests\User\EditUserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function loginPost(LoginValidation $request)
    {
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return back()->with(['success' => 'true']);
        }
        return back()->withErrors(['auth' => 'Неверный логин или пароль']);
    }

    public function register()
    {
        return view('users.register');
    }

    public function registerPost(RegisterValidation $request)
    {
        $requests = $request->validated();
        $requests['password'] = Hash::make($request['password']);
        User::create($requests);
        return redirect()->route('login')->with(['register' => true]);
    }

    public function cabinet(){
        return view('users.cabinet');
    }
    public function cabinetEdit(){
        return view('users.edit');
    }
    public function cabinetEditPost(EditUserValidation $request){

        $arr = $request->validated();
        if (!$arr['password']) unset($arr['password']);
        else $arr['password'] = Hash::make($arr['password']);

        $user = Auth::user();
        $user->update($arr);
        return back()->with(['success' => true]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
}
