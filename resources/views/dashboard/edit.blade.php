<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Įrašo redagavimas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="/dashboard/content/{{ $article->id }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="term">Terminas:</label>
                            <input type="text" id="term" name="term" value="{{ $article->term }}">
                        </div>
                        <div>
                            <label for="tag">Žymės:</label>
                            <input type="text" id="tag" name="tag">
{{--                            TODO value and tag overall--}}
                        </div>
                        <div>
                            <label for="excerpt">Apibrėžimas (iškarpa):</label>
                            <textarea id="excerpt" name="excerpt">
                                {{ $article->excerpt }}
                            </textarea>
                        </div>
                        <div>
                            <label for="definition">Apibrėžimas (straipsnis):</label>
                            <textarea id="definition" name="definition">
                                {{ $article->definition }}
                            </textarea>
                        </div>
                        <button>Redaguoti</button>
                    </form>
                    <a href="/dashboard/content">
                        <button type="button" class="">Atšaukti</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
