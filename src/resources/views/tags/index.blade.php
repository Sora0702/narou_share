@section('title', 'タグの一覧')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tags
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                              <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-white">- タグ一覧 -</h1>
                            </div>
                            @include('shared.message')
                            @include('shared.search')
                            @include('shared.tags')
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
