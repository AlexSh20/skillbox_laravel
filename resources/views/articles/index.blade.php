@extends('layout.master')

@section('title')
    Главная страница
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Главная страница
        </h3>

            @foreach($articles as $article)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/articles/{{ $article->slug }}">{{ $article->name }}</a></h2>
                    <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

                    @include('articles.tags', ['tags' =>$article->tags])

                    <p>{{ $article->description }}</p>
                    <hr>
                </div>
            @endforeach

        {{ $articles->links() }}

    </div><!-- /.blog-main -->

@endsection


