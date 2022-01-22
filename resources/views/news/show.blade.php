@extends('layout.master')

@section('title')
    {{ $news->name }}
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $news->name }}
        </h3>

        <div class="blog-post">
            <p class="blog-post-meta">{{ $news->created_at->toFormattedDateString()  }}</p>
            <p>{{ $news->text }}</p>
            <hr>
        </div>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/news">К списку новостей</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


