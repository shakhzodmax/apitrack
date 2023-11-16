<?php

namespace App\Console\Commands;

use App\Models\Integration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Laravel\Facades\Telegram;

class ApiCheckRealTime extends Command
{
    protected $signature = 'app:api-check-real-time';
    protected $description = 'GET so\'rov asosidagi tekshiruv';

    public function handle()
    {
        $getApis = DB::connection('oracle')->table('tbldata')->where('type_id', 1200)->where('int03', 0)->where('astate', 1)->get();

        foreach ($getApis as $getApi) {
            $checkStatus = Integration::checkStatusOfAPIs($getApi->int02);

            if ($checkStatus) {
                $chatId = env('TELEGRAM_CHATID');
                $message = '🌐 <b>Integratsiya ma\'lumoti:</b> ' . Integration::generateGUID() . "\n" .
                    '<b>Integratsiya nomi:</b> <i>' . $checkStatus->name . "</i>" . "\n" .
                    '<b>Integratsiya holati:</b> <i>' . $checkStatus->status . " 🚨</i>" . "\n" .
                    '<b>Yangilanish davri:</b> <i>' . $checkStatus->period . "</i>" . "\n" .
                    '🗓️ <b>Oxirgi yangilanish sanasi:</b> ' . Integration::formatDate($checkStatus->update_date);

                Telegram::sendMessage([
                    'chat_id' => $chatId,
                    'parse_mode' => 'HTML',
                    'text' => $message,
                ]);

                $this->info('GET so\'rov asosidagi tekshiruv xabari telegramga jo\'natildi.');
            }
        }
    }
}
