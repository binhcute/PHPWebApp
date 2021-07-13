<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckLoginController extends Controller
{

    use AuthenticatesUsers;
    public function check(Request $request)
    {
        $admin = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 1,
        ];
        $user = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 0,
        ];

        if (Auth::attempt($admin)) {
            Session::put('username',$request->username);
            Session::put('id',$request->id);
            return Redirect::to('/admin');
            // return redirect()->route('admin.index');
        } elseif(Auth::attempt($user)) {

            return redirect('/');
        }
        else{
            Session::put('message','Đăng nhập thất bại vui lòng đăng nhập lại');
            return redirect('/login');
        }   
        
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
}
