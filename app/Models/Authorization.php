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
        'required' => ':attribute тўлдирилмаган',
    ];
    public static $createRulesAttributes = [
        'username' => 'Логин',
        'password' => 'Пароль'
    ];
    public static function assignRole(int $id){
        $roles = ['7' => 'Департамент бошлиғи', '8' => 'Департамент бошлиғи ўринбосари', '11' => 'Бош мутахассис', '12' => 'Етакчи мутахассис', '19' => '1-тоифали техник'];
        return $roles[$id];
    }
}
