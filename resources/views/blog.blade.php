<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blogbereich') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Wilkommen im Blogbereich!") }}

                    <form action="/addblog" method="post">
                        @csrf
                        <div>
                            @error('title')
                            <div class="text-2xl text-red-500 font-medium">
                                {{ $message }}
                            </div>
                            @enderror
                            <label for="title">
                                {{ __('Title') }}
                            </label>
                            <input  class="text-black ml-11 mb-1 mt-1 rounded-md"
                                    type="text"
                                    id="title"
                                    value="{{ old('title') }}"
                                    name="title">
                        </div>
                        <div>
                            @error('content')
                            <div class="text-2xl text-red-500 font-medium">
                                {{ $message }}
                                @enderror
                                <label for="content">
                                    {{ __('Content') }}
                                </label>
                                <input  class="text-black ml-4 mb-1 mt-1 rounded-md"
                                        type="text"
                                        id="content"
                                        value="{{ old('content', 'Vorgabe') }}"
                                        name="content">
                            </div>
                            <div> </div>

                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach(Auth::user()->posts as $post)
                        <div >
                            <h2>{{ $post->title }}</h2>
                            <div >
                                <p>{{$post->content}}</p>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
