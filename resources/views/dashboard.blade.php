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
                    <div class="w-full text-white bg-green-500">
                        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
                            <div class="flex">
                                <svg viewBox="0 0 40 40" class="w-6 h-6 fill-current">
                                    <path
                                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                                    </path>
                                </svg>
                                <p class="mx-3">{{ session('success') }}</p>
                            </div>
                            <button
                                class="p-1 transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-gray-600 focus:outline-none">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    
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
                            <img class="object-fit object-center h-full w-full"
                                src="{{ asset('storage/' . $post->image) }}" alt="">

                        </div>
                        <p class="mb-4 text-base text-gray-700 md:text-lg">
                            {{ Str::limit($post->content, 75) }}
                        </p>

                                {{-- <a href="{{ route('posts.edit', $post) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Editer
                                    le post
                                </a> --}}

                                <a href="{{ route('posts.edit', $post) }}" class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                                    <span class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                                    <span class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                                    <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
                                    <span class="relative">Editer
                                        le post</span>
                                </a>

                                <a href="#" class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block" 
                                onclick="event.preventDefault();
                                    document.getElementById('destroy-post-form').submit();">
                                    <span class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                                    <span class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                                    <span class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                                    <span class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-red-600 from-gray-500"></span>
                                    <span class="relative">Supprimer le post</span>
                                    <form method="post" action="{{ route('posts.destroy', $post) }}"
                                    id="destroy-post-form">
                                    @csrf
                                    @method('delete')
                                </form>
                                </a>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</x-app-layout>
