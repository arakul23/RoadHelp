<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use LiqPay;

class PayController
{
    public function pay()
    {
        $liqpay = new LiqPay('sandbox_i45981799389', 'sandbox_n14w6WtVDAQW2uFNfFdfMlpEYjQF3IhuSsmJk49y');
        $params = array(
            'action'         => 'pay',
            'amount'         => '365',
            'currency'       => 'UAH',
            'description'    => 'description text',
            'order_id'       => Str::random(),
            'version'        => '3',
            'result_url' => config('app.url')
        );
        $liqpay->cnb_signature($params);
        $a = 23;
    }

    public function payResult(Request $request) {
        $a = 23;
        $b = 23;
    }
}
