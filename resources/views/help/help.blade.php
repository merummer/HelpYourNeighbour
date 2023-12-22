<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hilfsanfragen') }}
        </h2>
    </x-slot>
    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ Auth::user()->name }}, willkommen bei Ihren Hilfsanfragen!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session()->has('success'))
            <div class="p-6 font-medium text-2xl text-green-500">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                                name="title"/>
                    </div>
                    <div>
                        @error('content')
                        <div class="text-2xl text-red-500 font-medium">
                            {{ $message }}
                        @enderror
                        <label for="content">
                            {{ __('Beschreibung der Anfrage') }}
                        </label>
                        <input  class="text-black ml-4 mb-1 mt-1 rounded-md"
                                type="text"
                                id="content"
                                value="{{ old('content') }}"
                                name="content">
                        </div>
                    </div>
                    <div>
                        @error('location')
                        <div class="text-2xl text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                        <label for="location">
                            {{ __('Ort') }}
                        </label>
                        <input  class="text-black ml-11 mb-1 mt-1 rounded-md"
                                type="text"
                                id="location"
                                value="{{ old('location') }}"
                                name="location">
                    </div>
                    <div>
                        <x-primary-button>
                            {{ __('Save') }}
                        </x-primary-button>
                    </div>
                </form>
        </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    @foreach($helps as $help)
                        <div class="flex space-x-5">
                            <div class="flex justify-between ">
                                <p class="text-gray-500 "><a href="/helps/{{$help->id}}">{{$help->title}} </a></p>
                                <span class="text-right text-gray-500 dark:text-gray-700">{{$help->content}}</span>
                            </div>


                            <div class="text-sm flex ">
                                <a href="/helps/{{$help->id}}/edit">
                                <x-pencil />
                                <span class="sr-only">{{ __('Edit help') }}</span>
                                </a>
                                <form action="/helps/{{ $help->id }}" method="post">
                                @csrf
                                @method('DELETE')

                                 <button>
                                    <x-trash class="text-red-500 jus"></x-trash>
                                    <span class="sr-only">{{ __('Remove help') }}</span>
                                 </button>

                                </form>
                            </div>
                        </div>
                    @endforeach

            </div>
            </div>
    </div>
</x-app-layout>
