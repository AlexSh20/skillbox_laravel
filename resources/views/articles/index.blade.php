@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $title }}
        </h3>

        @foreach($articles as $article)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="articles/{{ $article->slug }}">{{ $article->name }}</a></h2>
            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>
            <p>{{ $article->description }}</p>
            <hr>
        </div>
        @endforeach

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


