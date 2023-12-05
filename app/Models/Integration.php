<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use stdClass;

class Integration extends Model
{
    protected $table = 'tbldata';

    protected $connection = 'oracle';

    public static function findObj($id, $type_id = 1200) {
        return DB::connection('oracle')
            ->table('GKK.TBLDATA')
            ->where('id', $id)
            ->where('type_id', $type_id)
            ->first();
    }

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
        'required' => ':attribute to\'ldirilmagan',
    ];

    public static $createRulesAttributes = [
        'INT01' => 'Integratsiya turi',
        'INT02' => 'TYPE ID',
        'NAME' => 'Tashkilot nomi',
        'VAL01' => 'Ma\'lumot turi',
        'INT03' => 'Yangilanish davri',
        'VAL02' => 'Ulanish nuqtasi',
        'LONG01' => 'Joylashuv joyi',
        'LONG02' => 'IzohYangilangan',
    ];

    public static function formatDate($date)
    {
        Carbon::setLocale('uz_Latn');

        return Carbon::parse($date)->isoFormat('Do MMMM YYYY, HH:mm');
    }

    public static function getLastUpdateDate($type_id)
    {
        $item = DB::connection('oracle')->table('tbldata')->where('type_id', $type_id)->orderBy('id', 'desc')->first();
        $date = $item->update_date;

        return $date;
    }

    public static function checkStatusForTable($type_id)
    {
        $api = DB::connection('oracle')->table('tbldata')->where('type_id', 1200)->where('int02', $type_id)->first();
        $update_date = DB::connection('oracle')->table('tbldata')->where('type_id', $type_id)->orderBy('id', 'desc')->first()->update_date;
        $current_date = now();

        switch ($api->int03) {
            case 0:
                $format = 'd.m.Y:H:i';
                if (date($format, strtotime($current_date)) == date($format, strtotime($update_date))) {
                    return 'Yangilangan';
                }
                break;
            case 1:
                $format = 'd.m.Y';
                if (date($format, strtotime($current_date)) == date($format, strtotime($update_date))) {
                    return 'Yangilangan';
                }
                break;
            case 30:
                $format = 'm.Y';
                if (date($format, strtotime($current_date)) == date($format, strtotime($update_date))) {
                    return 'Yangilangan';
                }
                break;
            case 90:
                $format = 'm.Y';
                $currentMonth = date($format, strtotime($current_date));
                $createMonth = date($format, strtotime($update_date));
                if (($currentMonth % 3 == 0) && ($currentMonth == $createMonth)) {
                    return 'Yangilangan';
                }
                break;

            case 365:
                $format = 'Y';
                if (date($format, strtotime($current_date)) == date($format, strtotime($update_date))) {
                    return 'Yangilangan';
                }
                break;
        }
    }

    public static function generateGUID()
    {
        $guid = Str::uuid()->toString();
        $numericPart = abs(crc32($guid));
        return $numericPart % 90000 + 10000;
    }

    public static function checkStatusOfAPIs($type_id, $request_type = 'case')
    {
        $api = DB::connection('oracle')->table('tbldata')->where('type_id', 1200)->where('int02', $type_id)->first();
        $update_date = DB::connection('oracle')->table('tbldata')->where('type_id', $type_id)->orderBy('id', 'desc')->first()->update_date;
        $current_date = now();

        $sent_object = new stdClass();
        $sent_object->type_id = $type_id;
        $sent_object->name = $api->name;
        $sent_object->period = $api->int03;
        $sent_object->update_date = $update_date;

        switch ($api->int03) {
            case 0:
                if ($request_type == 'all') {
                    return $sent_object;
                }
                break;
            case 1:
                if ($request_type == 'all') {
                    return $sent_object;
                }
                $format = 'd.m.Y';
                if (date($format, strtotime($current_date)) != date($format, strtotime($update_date))) {
                    $sent_object->status = 'Yangilanmagan';
                    return $sent_object;
                }
                break;
            case 30:
                if ($request_type == 'all') {
                    $sent_object->update_date = $update_date;
                    return $sent_object;
                }
                $format = 'm.Y';
                if (date($format, strtotime($current_date)) != date($format, strtotime($update_date))) {
                    $sent_object->status = 'Yangilanmagan';
                    return $sent_object;
                }
                break;

            case 90:
                if ($request_type == 'all') {
                    return $sent_object;
                }
                $format = 'm.Y';
                $currentMonth = date($format, strtotime($current_date));
                $createMonth = date($format, strtotime($update_date));
                if (!(($currentMonth % 3 == 0) && ($currentMonth == $createMonth))) {
                    $sent_object->status = 'Yangilanmagan';
                    return $sent_object;
                }
                break;

            case 365:
                if ($request_type == 'all') {
                    return $sent_object;
                }
                $format = 'Y';
                if (date($format, strtotime($current_date)) != date($format, strtotime($update_date))) {
                    $sent_object->status = 'Yangilanmagan';
                    return $sent_object;
                }
                break;
        }
    }
}
