@section('title', 'ブックマークタグを探す')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Search bookmark tags
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font overflow-hidden">
                        @include('shared.search_likes')
                        @include('shared.keyword_likes')
                        @include('shared.genre_likes')
                        @if(isset($tags))
                        <div class="container px-5 py-24 mx-auto">
                            <div class="-my-8 divide-y-2 divide-gray-100">
                                @php
                                    $counter = 0;
                                @endphp
                                @foreach($tags as $tag)
                                    <div class="py-8 flex flex-wrap md:flex-nowrap">
                                        <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                            <span class="font-semibold title-font text-white">{{ $tag->title }}</span>
                                            <span class="mt-4 text-gray-500 text-sm">{{ $tag->user->name }}</span>
                                            @if($tag->likes_count)
                                                <span class="mt-4 text-gray-500 text-sm">お気に入り数：{{ $tag->likes_count }}</span>
                                            @endif
                                            <a class="text-indigo-500 mt-4 flex items-center" href="{{ route('tags.show', ['id' => $tag->id]) }}">
                                                <span>さらに見る</span>
                                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M5 12h14"></path>
                                                    <path d="M12 5l7 7-7 7"></path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="md:flex-grow ">
                                            @foreach($tag->bookmarks as $bookmark)
                                                <p class="leading-relaxed mt-4">{{ $bookmark->title }}</p>
                                                <p class="leading-relaxed mt-2">{{ $bookmark->writer }}</p>
                                                @php
                                                if ($counter >= 1){break;}
                                                    $counter++;
                                                @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{$tags->links()}}
                        @else
                            @include('shared.recommend')
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
