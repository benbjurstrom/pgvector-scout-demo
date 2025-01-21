<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->query('query');

        if ($query) {
            $reviews = Review::search($query)
                ->paginate(50)
                ->withQueryString();
        } else {
            $reviews = Review::query()
                ->orderBy('id', 'asc')
                ->paginate(50);
        }

        return view('reviews.index', [
            'reviews' => $reviews,
            'query' => $query,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::findOrFail($id);

        $relatedReviews = Review::search($review->embedding->vector)
            ->take(7)
            ->get();

        return view('reviews.show', compact('review', 'relatedReviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
