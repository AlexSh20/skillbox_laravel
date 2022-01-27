@extends('layout.master')

@section('title')
    {{ $news->name }}
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $news->name }}
        </h3>
        @include('articles.tags', ['tags' =>$news->tags])

        <div class="blog-post">
            <p class="blog-post-meta">{{ $news->created_at->toFormattedDateString()  }}</p>
            <p>{{ $news->text }}</p>
            <hr>
        </div>

        @if (Auth::user())

            @include('layout.errors')
        <h3 id="comment-form">Ваш комментарий</h3>
        <form method="post" action="/news/{{ $news->id }}/comment">
            @csrf

            <div class="form-group">
        <textarea class="form-control" name="text" placeholder="Текст комментария"
                  maxlength="500" rows="4">{{ old('text', $comment->text ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
        @endif

        <hr>

        @forelse($news->comments as $comment)

            <p><b>Комментарий:</b>  {{ $comment->text}}</p>
            <p>Дата: {{ $comment->created_at->diffForHumans() }}</p>
            <p>Автор: {{ $comment->user->name }}</p>
        @empty
            <p>К статье нет комментариев</p>
        @endforelse

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="/news">К списку новостей</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


