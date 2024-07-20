<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use LiqPay;

class IndexController extends Controller
{
    public function index(): View
    {
        $reviews = Review::skip(0)->take(10)->get();
        $contacts = Contact::first();
        $orderId = Str::random();
        $liqpay = new LiqPay(config('liqpay.public_token'), config('liqpay.private_token'));
        $params = array(
            'public_key'  => config('liqpay.public_token'),
            'private_key' => config('liqpay.private_token'),
            'action'      => 'pay',
            'language'    => app()->getLocale(),
            'amount'      => '365',
            'currency'    => 'UAH',
            'description' => 'Оплата за послуги',
            'order_id'    => $orderId,
            'version'     => '3',
            'result_url'  => config('app.url'),
            'server_url'  => config('app.url') . '/api/liqpay/callback'
        );
        $signature = $liqpay->cnb_signature($params);
        $data = base64_encode(json_encode($params));

        return view('welcome', compact('reviews', 'contacts', 'signature', 'data', 'orderId'));
    }
}
