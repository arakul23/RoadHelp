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

        return view('welcome', compact('reviews', 'contacts'));
    }
}
