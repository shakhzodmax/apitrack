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
        'required' => ':attribute to\'ldirilmagan',
    ];
    public static $createRulesAttributes = [
        'username' => 'Login',
        'password' => 'Parol'
    ];
    public static function assignRole(int $id){
        $roles = ['7' => 'Departament boshlig\'i', '8' => 'Departament boshlig\'i o\'rinbosari', '11' => 'Bosh mutaxassis', '12' => 'Yetakchi mutaxassis', '19' => '1-toifali texnik'];
        return $roles[$id];
    }
}
