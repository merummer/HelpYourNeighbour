@php use Illuminate\Support\Facades\Auth; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">Hilfsanfragen</h2>
    </x-slot>

    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>{{ Auth::user()->name }}, willkommen bei den Hilfsanfragen!</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Bereich für die eigenen Hilfsanfragen -->
    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight m-6">Meine Hilfsanfragen</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    @foreach($helps as $help)
                        <!-- Hier muss auch status ergänzt werden, dass in arbeit und der nutzer ist -->
                        @if($help->user_id == Auth::user()->id)
                            <div class="flex items-center space-x-4 p-4 border-b">
                                <div class="flex-grow">{{ $help->title }}</div>
                                <div class="text-xs flex-grow">{{ $help->content }}</div>
                                <div class="flex flex-grow items-center">{{ $help->location }}</div>

                                <!-- Button zum Abschließen der Hilfsanfrage -->
                                <x-primary-button data-toggle="modal" data-target="#eigenehilfsanfrage{{ $help->id }}">
                                    {{ ('Abschließen') }}
                                </x-primary-button>

                                <!-- Fenster für die Bewertung der helfenden Person -->
                                <div class="modal fade" id="eigenehilfsanfrage{{ $help->id }}" aria-labelledby="eigenehilfsanfrage{{ $help->id }}abschließen"  hidden="hidden">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eigenehilfsanfrage{{ $help->id }}abschließen">Wie zufrieden waren Sie mit Ihrem Helfer?</h5>
                                                <x-secondary-button data-dismiss="modal" aria-label="Close">
                                                    <span>&times;</span>
                                                </x-secondary-button>
                                            </div>
                                            <div class="modal-body">
                                                Bewerten Sie Ihren Helfer bzw. Ihre Helferin. Anfrage: {{ $help->title }}
                                            </div>
                                            <div class="modal-footer">
                                                <x-primary-button data-dismiss="modal">
                                                    {{ ('Bewertung absenden und Anfrage schließen') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>



    <!-- Bereich für offene Hilfsanfragen von anderen Usern -->
    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight m-6">Offene Hilfsanfragen</h1>
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    @foreach($helps as $help)
                        <!-- Status muss bei if noch ergänzt werden, dass nur Anfragen angezeigt werden, die noch nicht in arbeit sind -->
                        @if($help->user_id != Auth::user()->id)
                            <div class="flex items-center space-x-4 p-4 border-b">
                                <div class="flex-grow">{{ $help->title }}</div>
                                <div class="flex flex-grow items-center">{{ $help->location }}</div>


                                <!-- Button zum Anzeigen der Hilfsanfrage -->
                                <x-primary-button data-toggle="modal" data-target="#hilfsanfrage{{ $help->id }}">
                                    {{ ('Anzeigen') }}
                                </x-primary-button>

                                <!-- Fenster für das Anzeigen der Hilfsanfrage -->
                                <div class="modal fade" id="hilfsanfrage{{ $help->id }}" aria-labelledby="hilfsanfrage{{ $help->id }}anzeigen"  hidden="hidden">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hilfsanfrage{{ $help->id }}anzeigen">Welche Hilfe wird benötigt?</h5>
                                                <x-secondary-button data-dismiss="modal" aria-label="Close">
                                                    <span >&times;</span>
                                                </x-secondary-button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Wobei wird Hilfe benötigt?
                                                    Anfrage: {{ $help->title }}
                                                </p>
                                                Beschreibung: {{ $help->content }}
                                            </div>
                                            <div class="modal-footer">
                                                <x-primary-button data-dismiss="modal">
                                                    {{ ('Hilfe anbieten') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</x-app-layout>
