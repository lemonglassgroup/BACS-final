<header class="max-w-xl mx-auto mt-20 text-center">
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        {{--        <!--  Category TODO make tag search-->--}}
        {{--        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">--}}
        {{--            <x-tag-dropdown/>--}}
        {{--        </div>--}}
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <div x-data="{open: false}" @click.away="open = false">
                <button @click="open = ! open"
                        class="py-2 pl-3 pr-9 text-left text-sm
                               font-semibold w-full lg:w-32 flex lg:inline-flex"
                >
                    {{ isset($currentTag) ? ucwords($currentTag->name) : 'Žymės' }}

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>
                </button>

                <div x-show="open" class="py-2 absolute bg-gray-300 z-50" style="display: none">
                    <a href="/" class="block hover:text-blue-50">
                        Pagrindinis
                    </a>

                    @foreach ($tags as $tag)
                        <a href="/tags/{{ $tag->slug }}"
                           class="block hover:text-blue-50"
                            {{ isset($currentTag) && $currentTag->is($tag) ? 'bg-red-500 text-white' : 'bg-blue-500'}}
                        >
                            {{ ucwords($tag->name) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if(request('tag'))
                    <input type="hidden" name="tag" value="{{ request('tag') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Įveskite ieškomą terminą arba frazę"
                       class="bg-transparent w-full placeholder-gray-500 font-semibold text-sm"
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>