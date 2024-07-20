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
        $liqpay = new LiqPay('sandbox_i45981799389', 'sandbox_n14w6WtVDAQW2uFNfFdfMlpEYjQF3IhuSsmJk49y');
        $params = array(
            'public_key'  => 'sandbox_i45981799389',
            'private_key' => 'sandbox_n14w6WtVDAQW2uFNfFdfMlpEYjQF3IhuSsmJk49y',
            'action'      => 'pay',
            'language'    => app()->getLocale(),
            'amount'      => '1',
            'currency'    => 'UAH',
            'description' => 'Оплата за послуги',
            'order_id'    => $orderId,
            'version'     => '3',
            'result_url'  => config('app.url'),
            'server_url'  => 'https://8f72-45-149-25-189.ngrok-free.app/api/liqpay/callback'
        );
        $signature = $liqpay->cnb_signature($params);
        $data = base64_encode(json_encode($params));

        return view('welcome', compact('reviews', 'contacts', 'signature', 'data', 'orderId'));
    }
}
