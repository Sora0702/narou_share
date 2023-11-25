@section('title', '小説検索結果')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">- 小説の検索結果 -</h1>
                                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ count($results)-1 }}件の小説が見つかりました！</p>
                            </div>
                            <div class="flex flex-wrap">
                                @php
                                    $i = 0
                                @endphp
                                @foreach($results as $result)
                                    @if($i != 0)
                                        <div class="md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                                            <h2 class="text-lg sm:text-xl text-white font-medium title-font mb-2">{{ $result['title'] }}</h2>
                                            <p class="leading-relaxed text-base mb-4">{{ $result['writer'] }}</p>
                                            <p class="leading-relaxed text-base mb-4">{{ $result['genre'] }}</p>
                                            <form method="post" action="{{ route('bookmarks.send') }}">
                                                @csrf
                                                <input type="hidden" name="title" value="{{ $result['title'] }}">
                                                <input type="hidden" name="writer" value="{{ $result['writer'] }}">
                                                <input type="hidden" name="ncode" value="{{ $result['ncode'] }}">
                                                <input type="hidden" name="genre" value="{{ $result['genre'] }}">
                                                <button class="text-indigo-500 inline-flex items-center">ブックマークに追加する
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                    @php
                                        $i++
                                    @endphp
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
