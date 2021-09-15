<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -mx-4 -mb-10 ">
            <div class="sm:w-1/2 mb-10 px-4">
                <div class="rounded-lg h-64 overflow-hidden">
                    <img class="object-cover object-center h-full w-full" src="{{ asset('storage/' . $post->image) }}"
                        alt="">
                </div>
                <h2 class="text-center title-font text-2xl font-medium text-gray-900 mt-6 mb-3">{{ $post->title }}</h2>
                <p class="leading-relaxed text-base">{{ $post->content }}</p>
                <button
                    class="flex mx-auto mt-6 text-white bg-gray-500 border-0 py-2 px-5 focus:outline-none hover:bg-gray-600 rounded">
                    <a href="{{ route('posts.index', $post) }}">Accueil</a>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
