<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col w-full">
            <p class="font-medium mb-4 text-white">人気のブックマーグタグ</p>
        </div>
        <div class="flex flex-wrap">
            @foreach($recommend_tags as $recommend_tag)
                <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                    <a class="text-indigo-500 inline-flex items-center mb-2" href="{{ route('tags.show', ['id' => $recommend_tag->id]) }}">{{ $recommend_tag->title }}
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <p class="leading-relaxed text-base mb-4">お気に入り数：{{ $recommend_tag->likes_count }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
