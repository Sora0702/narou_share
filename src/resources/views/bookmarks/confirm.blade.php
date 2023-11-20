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
                    <section class="text-gray-600 body-font relative">
                        <form method="post" action="{{ route('bookmarks.store') }}">
                            @csrf
                            <div class="container px-5 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-white">小説タイトル</label>
                                                <p class="leading-relaxed text-base mb-4 text-white">{{ $data['title'] }}</p>
                                                <input value="{{ $data['title'] }}" type="hidden" id="title" name="title">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="writer" class="leading-7 text-sm text-white">作者</label>
                                                <p class="leading-relaxed text-base mb-4 text-white">{{ $data['writer'] }}</p>
                                                <input value="{{ $data['writer'] }}" type="hidden" id="writer" name="writer">
                                            </div>
                                        </div>
                                        <input value="{{ $data['ncode'] }}" type="hidden" name="ncode">
                                        <input value="{{ $data['genre'] }}" type="hidden" name="genre">
                                        <div class="p-2 w-full">
                                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">ブックマークを登録する</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
