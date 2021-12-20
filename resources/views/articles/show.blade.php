@extends('layout.master')

@section('title')
    {{ $article->name }}
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->name }}
        </h3>

        @include('articles.tags', ['tags' =>$article->tags])

        <div class="blog-post">
            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString()  }}</p>
            <p>{{ $article->text }}</p>
            <hr>
        </div>

        <nav class="blog-pagination">
            @can('update', $article)
            <a class="btn btn-outline-primary" href="/articles/{{ $article->slug }}/edit">Редактировать статью</a>
            @endcan
            <a class="btn btn-outline-primary" href="/">К списку статей</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


