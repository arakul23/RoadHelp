<?php

namespace App\Http\Controllers;


use App\ClientStatus;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use LiqPay;

class PayController
{
    protected $liqpay;

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

        $status = $decodedData['status'];
        $orderId = $decodedData['order_id'];

        $clientInfo = json_decode($decodedData['info'], true);
        $clientInfo['order_id'] = $orderId;
        $clientInfo['status'] = ClientStatus::PAID;

        if ($status == 'success') {
            $client = new Client();
            $client->fill($clientInfo);
            $client->save();
        } elseif ($status == 'failure') {
            // Платеж не удался
        } elseif ($status == 'processing') {
            // Платеж в процессе
        }

        return response('OK', 200);
    }

    public function preparePaymentData(ClientRequest $request, LiqPay $liqpay): array
    {
        $orderId = Str::random();
        $langs = ['uk', 'en'];

        $clientInfo = json_encode([
            'name'         => $request->validated('name'),
            'surname'      => $request->validated('surname'),
            'car_model'    => $request->validated('car_model'),
            'car_number'   => $request->validated('car_number'),
            'email'        => $request->validated('email'),
            'phone_number' => $request->validated('phone_number'),
        ]);
        $params = array(
            'info'        => $clientInfo,
            'public_key'  => config('liqpay.public_token'),
            'private_key' => config('liqpay.private_token'),
            'action'      => 'pay',
            'language'    => in_array(app()->getLocale(), $langs) ? app()->getLocale() : 'en',
            'amount'      => '365',
            'currency'    => 'UAH',
            'description' => __('translations.texts.order_description'),
            'order_id'    => $orderId,
            'version'     => '3',
            'result_url'  => config('app.url'),
            'server_url'  => config('app.url') . '/api/liqpay/callback'
        );
        $signature = $liqpay->cnb_signature($params);
        $data = base64_encode(json_encode($params));

        return ['data' => $data, 'signature' => $signature];
    }
}
