<x-layout>
    @include('articles._header')

    <main class="max-w-6xl mx-auto sm:px-6 lg:px-8">
{{--        <table class="table-auto">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Term</th>--}}
{{--                <th>Tag</th>--}}
{{--                <th>Definition</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
            @foreach($articles as $article)
                <article>
                    <h1 class="text-xl font-bold">
                        <a href="/articles/{{ $article->slug }}">{{ $article->term }}</a>
                    </h1>

                    <div class="text-sm italic">
                        @foreach($article->tag as $tag)
{{--                            https://laracasts.com/series/laravel-6-from-scratch/episodes/32 01:30--}}
{{--                            <a href="{{ route('home', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>--}}
                            <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                        @endforeach
                    </div>

                    <div class="">
                        {{ $article->excerpt }}
                    </div>
                    <hr>
                </article>
                {{--                <tr>--}}
                {{--                    <td><a href="/articles/{{ $article->slug }}">{{ $article->term }}</a></td>--}}
                {{--                    <td>--}}
                {{--                        @foreach($article->tag as $tag)--}}
                {{--                            --}}{{-- https://laracasts.com/series/laravel-6-from-scratch/episodes/32 01:30--}}
                {{--                            <a href="{{ route('home', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>--}}
                {{--                        @endforeach--}}
                {{--                    </td>--}}
                {{--                    <td>{{ $article->excerpt }}</td>--}}
                {{--                </tr>--}}
            @endforeach
{{--            </tbody>--}}
{{--        </table>--}}
    </main>
</x-layout>
