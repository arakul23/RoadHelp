<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LiqPay;

class PayController
{
    protected $liqpay;

    public function __construct()
    {
        $this->liqpay = new LiqPay('sandbox_i45981799389', 'sandbox_n14w6WtVDAQW2uFNfFdfMlpEYjQF3IhuSsmJk49y');
    }

    public function callback(Request $request)
    {
        $data = $request->input('data');
        $signature = $request->input('signature');

        $expectedSignature = base64_encode(sha1(
            env('sandbox_i45981799389') . $data . env('sandbox_n14w6WtVDAQW2uFNfFdfMlpEYjQF3IhuSsmJk49y'),
            true
        ));

        if ($signature !== $expectedSignature) {
            return response('Invalid signature', 403);
        }

        $decodedData = json_decode(base64_decode($data), true);

        // Обработка данных о платеже
        Log::info('LiqPay callback data:', $decodedData);

        // Пример обработки статуса
        $status = $decodedData['status'];
        $orderId = $decodedData['order_id'];

        if ($status == 'success') {
            // Платеж успешно завершен
            // Обновите статус заказа в базе данных
        } elseif ($status == 'failure') {
            // Платеж не удался
        } elseif ($status == 'processing') {
            // Платеж в процессе
        }

        return response('OK', 200);
    }
}
