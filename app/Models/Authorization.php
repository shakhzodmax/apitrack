<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    public static $columns = [
        'username',
        'password'
    ];
    public static $createRules = [
        'username' => 'required',
        'password' => 'required'
    ];

    public static $createRulesMessages = [
        'required' => ':attribute тулдирилмаган',
    ];

    public static $createRulesAttributes = [
        'username' => 'Логин',
        'password' => 'Пароль'
    ];
}
