<x-app-layout>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('css/index_layout.css') }}">
    </head>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ログインに成功しました!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
