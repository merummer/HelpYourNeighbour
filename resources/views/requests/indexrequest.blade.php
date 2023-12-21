@php use App\Models\Help; @endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">Offene Hilfsanfragen</h2>
    </x-slot>

    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Willkommen bei Ihren Hilfsanfragen!</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 space-y-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    @foreach(Help::all() as $help)
                        <div class="m-2 dark:bg-gray-200">{{ $help->title }}</div>

                        <div class="flex"></div>
                        <!-- Button zum abschließen der Hilfsanfrage-->
                        <button type="button" class="btn btn-primary ml-3" data-toggle="modal"
                                data-target="#hilfsanfrage{{ $help->id }}">
                            Abschließen
                        </button>

                        <!-- Fenster für die Bewertung der helfenden Person-->
                        <div class="modal fade" id="hilfsanfrage{{ $help->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="hilfsanfrage{{ $help->id }}abschließen"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="hilfsanfrage{{ $help->id }}abschließen">Wie
                                            zufrieden waren Sie mit Ihrem Helfer?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bewerten Sie Ihren Helfer bzw. Ihre Helferin. Anfrage: {{ $help->title }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bewertung
                                            absenden und Anfrage
                                            schließen
                                        </button>
                                        <!-- Weitere Aktionen können hier hinzugefügt werden -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


