<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="container items-center px-5 py-12 lg:px-20">
        @foreach ($errors->all() as $error)
        <span class="block text-red-500">{{ $error }}</span>
        @endforeach
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data"
            class="flex flex-col w-full p-10 px-8 pt-6 mx-auto my-6 mb-4 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-1/2 ">
            @csrf
            <div class="relative pt-4">
                <x-label for="title" value="Titre du post" class="text-base leading-7 text-blueGray-500"/>
                <x-input id="title" name="title" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2"/>
            </div>

            <div class="flex flex-wrap mt-4 mb-6 -mx-3">
                <div class="w-full px-3">

                    <x-label for="content" value="Contenu du post" class="text-base leading-7 text-blueGray-500" />
                    <textarea
                        class="w-full h-32 px-4 py-2 mt-2 text-base text-blueGray-500 transition duration-500 ease-in-out transform bg-white border rounded-lg focus:border-blue-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 apearance-none autoexpand"
                        id="content" name="content">
                    </textarea>
                    
                     <x-label for="image" value="Image du post" class="text-base leading-7 text-blueGray-500 mt-4" />
                     <x-input  type="file" id="image" name="image"/>

                    <select name="category" id="category" class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                        @foreach ($categories as $category)
                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center w-full pt-4">
                    <x-button style="display: block !important;" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800">Créer mon post</x-button>
            </div>
        </form>
    </div>

</x-app-layout>
