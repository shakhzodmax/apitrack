<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Integration extends Model
{
    public static $columns = [
        'NAME',
        'TITLE',
        'DATE01',
        'DATE02',
        'INT01',
        'VAL01',
    ];
    public static $createRules = [
        'NAME' => 'required',
        'TITLE' => 'required',
        'DATE01' => 'required',
        'DATE02' => 'required',
        'INT01' => 'required',
        'VAL01' => 'required',
    ];

    public static $createRulesMessages = [
        'required' => ':attribute тулдирилмаган',
    ];

    public static $createRulesAttributes = [
        'NAME' => 'Ташкилот номи',
        'TITLE' => 'Маълумот тури',
        'DATE01' => 'Охирги янгиланиш санаси',
        'DATE02' => 'Кейинги янгиланиш санаси',
        'INT01' => 'Янгиланиш даври',
        'VAL01' => 'Уланиш нуктаси',
    ];
}
