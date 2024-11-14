<x-app-layout>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold">Review Details</h2>
                    <a href="{{ route('reviews.index') }}" class="px-4 py-2 text-sm bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-150 ease-in-out">
                        ← Back to Reviews
                    </a>
                </div>

                <div class="bg-white border border-gray-100 rounded-lg shadow-sm mb-8">
                    <div class="p-6 space-y-6">
                        <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-2">Summary</div>
                                <p class="text-lg font-medium">{{ $review->summary }}</p>
                            </div>
                            <span class="px-3 py-1 text-sm font-semibold rounded-full {{ $review->score >= 4 ? 'bg-green-100 text-green-800' : ($review->score <= 2 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ $review->score }}/5
                            </span>
                        </div>

                        <div>
                            <div class="text-sm text-gray-500 mb-2">Full Review</div>
                            <p class="text-gray-700 whitespace-pre-line">{{ $review->text }}</p>
                        </div>
                    </div>
                </div>

                @if($relatedReviews->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold mb-4">Related Reviews</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach($relatedReviews as $relatedReview)
                                @if($relatedReview->id !== $review->id)
                                    <div
                                        onclick="window.location='{{ route('reviews.show', $relatedReview) }}'"
                                        class="bg-white border border-gray-100 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-150 ease-in-out cursor-pointer"
                                    >
                                        <div class="p-4">
                                            <div class="flex items-center justify-between mb-3">
                                                <span class="text-sm font-medium text-gray-600">{{ $relatedReview->summary }}</span>
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $relatedReview->score >= 4 ? 'bg-green-100 text-green-800' : ($relatedReview->score <= 2 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                    {{ $relatedReview->score }}/5
                                                </span>
                                            </div>
                                            <p class="text-sm text-gray-500 line-clamp-3">{{ $relatedReview->text }}</p>
                                            <div class="mt-3 text-xs text-gray-500 flex justify-between">
                                                <div>
                                                    {{ $relatedReview->time->format('M j, Y') }}
                                                </div>
                                                <div>
                                                   Distance: {{ round($relatedReview->embedding->neighbor_distance, 5) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
