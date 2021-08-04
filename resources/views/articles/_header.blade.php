<header class="max-w-xl mx-auto mt-20 text-center">
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
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

        <!-- Tags -->
        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-tag-dropdown />
        </div>
    </div>
</header>
