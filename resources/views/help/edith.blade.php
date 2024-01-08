<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hilfsanfragen') }} &raquo; {{__('Hilfsanfragen')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:p-8">
            <div class="bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-100 border-b border-gray-300">
                    <div class="flex flex-col mt-2 space-y-2">
                        <form method="post" action="/helps/{{ $helps->id }}" method="post">
                            @csrf
                            @method('PATCH')

                            <header>
                                <h2 class="text-2xl text-indigo-600 font-semibold">
                                    Edit "{{$helps->title}}"
                                </h2>
                            </header>

                             @if(session()->has('success'))
                                 <div class="mt-4">
                                     <p class="text-gray-500 text-lg font-semibold">
                                         {{session('success')}}
                                     </p>
                                 </div>
                             @endif

                             <div class="mt-4">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
