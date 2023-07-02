<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(): View
    {
        $reviews = Review::skip(0)->take(10)->get();

        return view('welcome', compact('reviews'));
    }
}
