<?php

namespace App\Http\Controllers;

use App\Models\Integration;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function sendStatusesToBot()
    {
        $getApis = DB::connection('oracle')->table('tbldata')->where('type_id', 1200)->where('astate', 1)->get();

        foreach ($getApis as $getApi) {
            $checkStatus = Integration::checkStatusOfAPIs($getApi->int02, 'all');

            if ($checkStatus) {
                $chatId = 5969220625;
                $message = '<b>Integratsiya nomi:</b> <i>' . $checkStatus->name . "</i>" . "\n" .
                    '<b>Yangilanish davri:</b> <i>' . $checkStatus->period . "</i>" . "\n" .
                    '🗓️ <b>Oxirgi yangilanish sanasi:</b> ' . Integration::formatDate($checkStatus->update_date);

                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'parse_mode' => 'HTML',
                    'text' => $message,
                ]);
            }
        }
        return redirect()->back()->with('info', 'Barch Integratsiya ma\'lumolari telegram botga yuborildi!')->withInput();
    }
}
