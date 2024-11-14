<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('reviews', ReviewController::class);

Route::get('/search', function (Request $request) {
    if (!$request->has('q')) {
        return response()->json([
            'error' => 'Search query is required'
        ], 400);
    }

    $results = Post::search($request->input('q'))->get();

    return response()->json($results->first()->embedding->neighbor_distance);
});
