<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Turinio valdymas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <a href="/dashboard/content/create">Sukurti</a>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="table-fixed min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium
                                                       text-gray-500 uppercase tracking-wider"
                                            >
                                                Terminas
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium
                                                       text-gray-500 uppercase tracking-wider"
                                            >
                                                Apibrėžimas
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium
                                                       text-gray-500 uppercase tracking-wider"
                                            >
                                                Žymės
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only"></span>
                                            </th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only"></span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($articles as $article)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $article->term }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="truncate max-w-0 px-6 py-4 whitespace-nowrap">
                                                    {{ $article->excerpt }}
                                                </td>
                                                <td class="max-w-0 px-6 py-4 whitespace-nowrap">
                                                    @foreach($article->tag as $tag)
                                                        <span class="px-2 inline-flex text-xs
                                                                     italic leading-5 font-semibold
                                                                     rounded-full bg-gray-100 text-gray-800"
                                                        >
                                                            {{ $tag->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="{{ route('content.edit', $article->id) }}"
                                                       class="text-indigo-600 hover:text-indigo-900">Redaguoti</a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    @can('content_delete')
                                                    <form action="{{ route('content.destroy', $article->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="">Naikinti</button>
                                                    </form>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-4">
                                    {{ $articles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
