<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Authorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $inputs = $request->validate(Authorization::$createRules, Authorization::$createRulesMessages, Authorization::$createRulesAttributes);

        $user = DB::table('tblusers')
            ->where('username', $inputs['username'])
            ->where('password', $inputs['password'])
            ->where('department_id', 84)
            ->where('astate', 1)
            ->first();

        if (!empty($user)) {
            session(['fullname' => $user->fullname, 'username' => $user->username, 'department_id' => $user->department_id, 'post_id' => $user->post_id]);
            return redirect()->intended('dashboard');
        }

        return redirect("/")->with('error', 'Логин ёки пароль хато киритилган!')->withInput();
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }

}
