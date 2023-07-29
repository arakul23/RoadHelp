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
            return response()->json(['message' => __('translations.texts.review_created')], 201);
        }

        return response()->json(['message' => __('translations.texts.review_not_created'), 500]);

    }
}
