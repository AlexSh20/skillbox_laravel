@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $slug->name }}
        </h3>


        <div class="blog-post">
            <p class="blog-post-meta">{{ $slug->created_at->toFormattedDateString()  }}</p>
            <p>{{ $slug->text }}</p>
            <hr>
        </div>

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/articles/{{ $slug->slug }}/edit">Редактировать статью</a>
            <a class="btn btn-outline-primary" href="/">К списку статей</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


