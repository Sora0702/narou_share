<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bookmarks
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">- ブックマーク一覧 -</h1>
                            </div>
                            @if (session('flash_message'))
                                    <div class="mb-3 flash_message text-red-600 text-center">
                                        {{ session('flash_message') }}
                                    </div>
                                @endif
                            <div class="flex flex-wrap">
                                @foreach($bookmarks as $bookmark)
                                    <div class="md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                                        <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">{{ $bookmark['title'] }}</h2>
                                        <p class="leading-relaxed text-base mb-4">{{ $bookmark['writer'] }}</p>
                                        <p class="leading-relaxed text-base mb-4">{{ MyUtil::checkGenre($bookmark) }}</p>
                                        <a href="https://ncode.syosetu.com/{{ strtolower($bookmark['ncode']) }}" class="leading-relaxed text-base mb-4 text-indigo-500">作品ページはこちら</a>
                                        <form method="post" action="{{ route('bookmarks.destroy', ['id' => $bookmark->id]) }}">
                                            @csrf
                                            <div class="p-2 w-full">
                                                <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">ブックマークから削除する</button>
                                            </div>
                                        </form>
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
