<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
            return redirect()->route('admin.index');
        } elseif(Auth::attempt($user)) {
            return redirect('/');
        }
        
    }
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
}
