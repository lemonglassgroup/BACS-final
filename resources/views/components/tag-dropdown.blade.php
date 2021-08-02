<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-left text-sm font-semibold w-full lg:w-32 flex lg:inline-flex">
            {{isset($currentTag) ? ucwords($currentTag->name) : 'Tags'}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    {{--    <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>--}}
    <x-dropdown-item href="/?{{ http_build_query(request()->except('tag', 'page')) }}"
                     :active="request()->routeIs('home')">All
    </x-dropdown-item>


    @foreach($tags as $tag)
        <x-dropdown-item
            href="/?tag={{ $tag->slug }}&{{ http_build_query(request()->except('tag', 'page')) }}"
            :active='request()->is("tags/{$tag->slug}")'
        >{{ ucwords($tag->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>
