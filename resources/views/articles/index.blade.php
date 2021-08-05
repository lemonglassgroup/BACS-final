<x-layout>
    @include('articles._header')

    <main class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if($articles->count())
            @foreach($articles as $article)
                <article>
                    <h1 class="text-xl font-bold">
                        <a href="/articles/{{ $article->slug }}">{{ $article->term }}</a>
                    </h1>

                    <div class="text-sm italic">
                        @foreach($article->tag as $tag)
                            {{--                            https://laracasts.com/series/laravel-6-from-scratch/episodes/32 01:30--}}
                            {{--                            <a href="{{ route('home', ['tag' => $tag->slug]) }}">{{ $tag->name }}</a>--}}
                            <a href="/?tag={{ $tag->slug }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <div class="">
                        {{ $article->excerpt }}
                    </div>
                    <hr>
                </article>
            @endforeach
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @else
            <p class="text-center">Tokio įrašo nėra.</p>
        @endif
    </main>
</x-layout>
