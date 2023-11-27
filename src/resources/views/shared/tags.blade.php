<div class="flex flex-wrap mt-10">
    @foreach($tags as $tag)
        <div class="md:w-full px-8 py-6">
            <div class="flex justify-between">
                <a  class="text-lg sm:text-xl font-medium title-font mb-2 text-indigo-500" href="{{ route('tags.show', ['id' => $tag->id]) }}">
                    {{ $tag['title'] }}
                </a>
                <div class="flex justify-end">
                    @if(auth()->user()->id == $tag->user_id)
                        <div class="p-2">
                            <button class="flex mx-auto text-white bg-opacity-0 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded">
                                <a href="{{ route('tags.edit', ['id' => $tag->id]) }}">タグ名称の更新</a>
                            </button>
                        </div>
                        <form method="post" action="{{ route('tags.destroy', ['id' => $tag->id]) }}">
                            @csrf
                            <div class="p-2">
                                <button class="flex mx-auto text-white bg-opacity-0 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded">タグの削除</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
            @php
                $counter = 0;
            @endphp
            @foreach($tag->bookmarks as $bookmark)
                <div class="md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                    <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">{{ $bookmark['title'] }}</h2>
                    <p class="leading-relaxed text-base mb-4">作者：{{ $bookmark['writer'] }}</p>
                    <p class="leading-relaxed text-base mb-4">ジャンル：{{ MyUtil::checkGenre($bookmark) }}</p>
                    <div class="mb-4">
                        <span>登録タグ：</span>
                        @foreach($bookmark->tags as $tag)
                            <a href="{{ route('tags.show', ['id' => $tag->id]) }}" class="leading-relaxed text-base mb-4 text-indigo-500">{{ $tag->title }}</a>
                            <span>/</span>
                        @endforeach
                    </div>

                    <a href="https://ncode.syosetu.com/{{ strtolower($bookmark['ncode']) }}" class="leading-relaxed text-base mb-4 text-indigo-500 flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        <span>この小説を読む</span>
                    </a>
                    @if(auth()->user()->id == $tag->user_id)
                        <form method="get" action="{{ route('bookmarks.edit', ['id' => $bookmark->id]) }}">
                            @csrf
                            <div class="w-full">
                                <button class="mb-4 mx-auto text-indigo-500 bg-opacity-0 border-0 focus:outline-none hover:bg-white-600 rounded">登録タグの変更</button>
                            </div>
                        </form>
                        <form method="post" action="{{ route('bookmarks.destroy', ['id' => $bookmark->id]) }}">
                            @csrf
                            <div class="w-full">
                                <button class="mx-auto text-indigo-500 bg-opacity-0  border-0 focus:outline-none hover:bg-white-600 rounded">ブックマークを解除する</button>
                            </div>
                        </form>
                    @endif
                </div>
                @php
                    if ($counter >= 1){break;}
                    $counter++;
                @endphp
            @endforeach
        </div>
    @endforeach
</div>
{{ $tags->links() }}
