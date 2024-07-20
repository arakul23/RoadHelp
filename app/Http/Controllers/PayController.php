<?php

namespace App\Http\Controllers;


use App\ClientStatus;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LiqPay;
use Throwable;

class PayController
{
    protected $liqpay;

    public function __construct()
    {
        $this->liqpay = new LiqPay(config('liqpay.public_token'), config('liqpay.private_token'));
    }

    public function callback(Request $request)
    {
        $data = $request->input('data');
        $signature = $request->input('signature');

        $expectedSignature = base64_encode(sha1(
            (config('liqpay.private_token')) . $data . config('liqpay.private_token'),
            true
        ));

        if ($signature !== $expectedSignature) {
            return response('Invalid signature', 403);
        }

        $decodedData = json_decode(base64_decode($data), true);

        // Пример обработки статуса
        $status = $decodedData['status'];
        $orderId = $decodedData['order_id'];
        Log::info(Client::where('order_id', $orderId)->get());
        Log::info($orderId);
        if ($status == 'success') {
            Client::where('order_id', $orderId)->update(['status' => ClientStatus::PAID]);
        } elseif ($status == 'failure') {
            // Платеж не удался
        } elseif ($status == 'processing') {
            // Платеж в процессе
        }

        return response('OK', 200);
    }

    public function addClient(ClientRequest $request, Client $client)
    {
        $client = $client->fill($request->validated());
        $client->status = ClientStatus::NOT_PAID;
        $client->save();
        $c = 23;
    }
}
