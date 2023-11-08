<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    public static $columns = [
        'INT01',
        'INT02',
        'NAME',
        'VAL01',
        'INT03',
        'VAL02',
        'LONG01',
        'LONG02',
    ];
    public static $createRules = [
        'INT01' => 'required',
        'INT02' => 'required',
        'NAME' => 'required',
        'VAL01' => 'required',
        'INT03' => 'required',
        'VAL02' => 'required',
        'LONG01' => 'required',
        'LONG02' => 'required',
    ];

    public static $createRulesMessages = [
        'required' => ':attribute тўлдирилмаган',
    ];

    public static $createRulesAttributes = [
        'INT01' => 'Интеграция тури',
        'INT02' => 'TYPE ID',
        'NAME' => 'Ташкилот номи',
        'VAL01' => 'Маълумот тури',
        'INT03' => 'Янгиланиш даври',
        'VAL02' => 'Уланиш нуқтаси',
        'LONG01' => 'Жойлашув жойи',
        'LONG02' => 'Изоҳ',
    ];
}
