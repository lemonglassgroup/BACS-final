<x-layout>
    @include('articles._header')

<article>

    <h1>{{ $article->term }}</h1>
    <p>
        Žymės:
        @foreach($article->tag as $tag)
            {{--                            https://laracasts.com/series/laravel-6-from-scratch/episodes/32 01:30--}}
{{--            <a href="{{ route('home', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>--}}
            <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
        @endforeach
    </p>

    <p>{{ $article->definition }}</p>

    <a href="/">Grįžti atgal</a>
</article>

</x-layout>
