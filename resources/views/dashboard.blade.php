<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Vous êtes connecté en tant que {{ Auth::user()->name }}.
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20 ">
        <div class="grid gap-10 row-gap-8 lg:grid-cols-5">
            <div class="flex flex-col space-y-8 lg:col-span-3">

                @if (session('success'))
                    {{ session('success') }}
                @endif
                <div>
                    @foreach ($posts as $post)
                        <div class="mb-3">
                            <a href="{{ route('posts.edit', $post) }}"
                                class="inline-block text-black transition-colors duration-200 hover:text-deep-purple-accent-400">
                                <h3
                                    class="font-sans text-xl font-extrabold leading-none tracking-tight lg:text-2xl  mt-6">
                                    {{ $post->title }}
                                </h3>
                            </a>
                        </div>
                        <p class="mb-4 text-base text-gray-700 md:text-lg">
                            {{ Str::limit($post->content, 75) }} 
                        </p>
                        <div class="flex items-center">
                            <a href="/" aria-label="Author" class="mr-3">
                            </a>
                            <div>
                                <a href="{{ route('posts.edit', $post) }}" aria-label="Author"
                                    class="font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-400">Editer
                                    votre post</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
