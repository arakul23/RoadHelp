<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create(ReviewRequest $request)
    {
        $created = Review::create([
            'name' => $request->getName(),
            'text' => $request->getText()
        ]);

        if ($created) {
            return true;
        }
    }
}
