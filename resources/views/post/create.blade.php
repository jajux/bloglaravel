<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="relative" style="background: #96bbbb">
        <div class="absolute inset-x-0 bottom-0">
            <svg viewBox="0 0 224 12" fill="currentColor" class="w-full -mb-1 text-white" preserveAspectRatio="none">
                <path
                    d="M0,0 C48.8902582,6.27314026 86.2235915,9.40971039 112,9.40971039 C137.776408,9.40971039 175.109742,6.27314026 224,0 L224,12.0441132 L0,12.0441132 L0,0 Z">
                </path>
            </svg>
        </div>
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="relative max-w-2xl sm:mx-auto sm:max-w-xl md:max-w-2xl sm:text-center">
                <h2 class="mb-6 font-sans text-3xl font-bold tracking-tight text-white sm:text-4xl sm:leading-none">
                    <span class="relative text-teal-900 ">{{ Auth::user()->name }} <br class="hidden md:block" /></span>
                    <span class="mt-5"> Votre page d'édition d' articles</span>
                </h2>
                <p class="mb-6 text-base text-indigo-100 md:text-lg">
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae. explicabo. Sed ut perspiciatis unde omnis.
                </p>
            </div>
        </div>
    </div>


    <div class="container items-center px-5 py-12 lg:px-20">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
            class="flex flex-col w-full p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-1/2 ">
            @csrf
            <div class="relative pt-4">
                <x-label for="title" value="Titre du post" class="text-base leading-7 text-blueGray-500" />
                <x-input id="title" name="title"
                    class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" />
            </div>

            <div class="flex flex-wrap mt-4 mb-6 -mx-3">
                <div class="w-full px-3">

                    <x-label for="content" value="Contenu du post" class="text-base leading-7 text-blueGray-500" />
                    <textarea
                        class="w-full h-32 px-4 py-2 mt-2 text-base text-blueGray-500 transition duration-500 ease-in-out transform bg-white border rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 apearance-none autoexpand"
                        id="content" name="content">
                    </textarea>

                    <x-label for="image" value="Image du post" class="text-base leading-7 text-blueGray-500 mt-4" />
                    <x-input type="file" id="image" name="image" />

                    <select name="category" id="category"
                        class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center w-full pt-4">

                <x-button style="display: block !important;"
                    class="px-5 py-2.5 relative rounded group font-medium text-white font-medium inline-block">
                    <span
                        class="absolute top-0 left-0 w-full h-full rounded opacity-50 filter blur-sm bg-gradient-to-br from-purple-600 to-blue-500"></span>
                    <span
                        class="h-full w-full inset-0 absolute mt-0.5 ml-0.5 bg-gradient-to-br filter group-active:opacity-0 rounded opacity-50 from-purple-600 to-blue-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition-all duration-200 ease-out rounded shadow-xl bg-gradient-to-br filter group-active:opacity-0 group-hover:blur-sm from-purple-600 to-blue-500"></span>
                    <span
                        class="absolute inset-0 w-full h-full transition duration-200 ease-out rounded bg-gradient-to-br to-purple-600 from-blue-500"></span>
                    <span class="relative">Créer un post</span>
                </x-button>
            </div>
            <a class="mt-5 text-indigo-500" href="{{ route('posts.index') }}">Retour à l'accueil
            </a>
        </form>
    </div>
@include('partials.footer')
</x-app-layout></i>
