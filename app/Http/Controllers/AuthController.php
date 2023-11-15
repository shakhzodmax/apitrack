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

        $user = DB::connection('dbproject')->table('tblusers')
            ->where('username', $inputs['username'])
            ->where('password', $inputs['password'])
            ->where('department_id', 84)
            ->where('astate', 1)
            ->first();

        if (!empty($user)) {
            $post_name = Authorization::assignRole($user->post_id);
            session(['fullname' => $user->fullname, 'username' => $user->username, 'department_id' => $user->department_id, 'post_id' => $user->post_id, 'auth_state' => 1, 'post_name' => $post_name]);
            return redirect()->intended('dashboard');
        }

        return redirect("/")->with('error', 'Login yoki parol xato kiritilgan!')->withInput();
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    }

}
