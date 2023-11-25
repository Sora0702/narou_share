@section('title', 'ブックマークタグ詳細')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $tag->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">- {{ $tag->title }}ブックマーク一覧 -</h1>
                            </div>
                            @if (session('flash_message'))
                                <div class="mb-3 flash_message text-red-600 text-center">
                                    {{ session('flash_message') }}
                                </div>
                            @endif
                            <x-input-error :messages="$errors->get('ncode')" class="mt-2 text-center" />
                            @include('shared.like')
                            <div class="flex flex-wrap">
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
                                        @if($tag->user_id !== auth()->user()->id)
                                            <form method="post" action="{{ route('bookmarks.store') }}">
                                                @csrf
                                                <input value="{{ $bookmark['title'] }}" type="hidden" name="title">
                                                <input value="{{ $bookmark['writer'] }}" type="hidden" name="writer">
                                                <input value="{{ $bookmark['ncode'] }}" type="hidden" name="ncode">
                                                <input value="{{ $bookmark['genre'] }}" type="hidden" name="genre">
                                                <div class="w-full">
                                                    <button class="flex text-indigo-500 p-0 bg-opacity-0 border-0 focus:outline-none hover:bg-white-600 rounded">
                                                        ブックマーク登録
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                        @if($tag->user_id == auth()->user()->id)
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
                                @endforeach
                            </div>
                            {{ $bookmarks->links() }}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
