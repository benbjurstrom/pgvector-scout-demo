<x-app-layout>
    <div class="pb-12 py-6 px-4 text-gray-900">
        <div class="sm:flex items-center justify-between mb-6">
            <div>
{{--                <div class="text-sm text-gray-500 mb-2">Dataset</div>--}}
{{--                <p class="font-medium text-zinc-800 text-base">Amazon Fine Food Reviews</p>--}}
            </div>
            <div class="grid grid-cols-2 gap-2 sm:grid-cols-5 text-center">
                <a href="{{ request()->fullUrlWithQuery(['query' => null]) }}"
                   class="col-span-2 sm:col-span-1 px-4 py-2 text-sm font-medium rounded-md {{ !request()->query('query') ? 'bg-gray-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All Reviews
                </a>
                <a href="{{ request()->fullUrlWithQuery(['query' => 'breakfast']) }}"
                   class="px-4 py-2 text-sm font-medium rounded-md {{ request()->query('query') === 'breakfast' ? 'bg-gray-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Breakfast
                </a>
                <a href="{{ request()->fullUrlWithQuery(['query' => 'pet-food']) }}"
                   class="px-4 py-2 text-sm font-medium rounded-md {{ request()->query('query') === 'pet-food' ? 'bg-gray-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Pet Food
                </a>
                <a href="{{ request()->fullUrlWithQuery(['query' => 'unhappy']) }}"
                   class="px-4 py-2 text-sm font-medium rounded-md {{ request()->query('query') === 'unhappy' ? 'bg-gray-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Unhappy
                </a>
                <a href="{{ request()->fullUrlWithQuery(['query' => 'happy']) }}"
                   class="px-4 py-2 text-sm font-medium rounded-md {{ request()->query('query') === 'happy' ? 'bg-gray-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Happy
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-gray-100">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Score</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{!empty($query) ? 'Distance' : 'Date'}}</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($reviews as $review)
                    <tr onclick="window.location='{{ route('reviews.show', $review) }}'" class="hover:bg-gray-50 cursor-pointer transition-colors duration-150 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $review->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $review->score >= 4 ? 'bg-green-100 text-green-800' : ($review->score <= 2 ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ $review->score }}/5
                                        </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 truncate max-w-lg">{{ $review->summary }}</div>
                            <div class="text-sm text-gray-700 line-clamp-3 max-w-lg">{{ $review->text }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{!empty($query) ? round($review->embedding->neighbor_distance, 6) : $review->time->format('Y-m-d')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $reviews->links() }}
        </div>
    </div>
</x-app-layout>
