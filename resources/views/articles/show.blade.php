@extends('layout.master')

@section('title')
    {{ $article->name }}
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $article->name }}
        </h3>






        <div id="app">
            <article-updated v-bind:article-slug="{{ $article }}"></article-updated>
        </div>


        <script src="{{ asset('js/app.js') }}"></script> <!-- add vue elements -->

        @include('articles.tags', ['tags' =>$article->tags])


        <div class="blog-post">
            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString()  }}</p>
            <p>{{ $article->text }}</p>
            <hr>
        </div>

        @if (Auth::user())

            @include('layout.errors')

            <h3 id="comment-form">Ваш комментарий</h3>
            <form method="post" action="/articles/{{ $article->slug }}/comment">
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

        @forelse($article->comments as $comment)

            <p><b>Комментарий:</b> {{ $comment->text}}</p>
            <p>Дата: {{ $comment->created_at->diffForHumans() }}</p>
            <p>Автор: {{ $comment->user->name }}</p>
        @empty
            <p>К статье нет комментариев</p>
        @endforelse

        <hr>
        @forelse($article->history as $item)
            <p>{{ $item->email}} - {{ $item->pivot->created_at->diffForHumans() }} - {{ $item->pivot->before }}
                - {{ $item->pivot->after }}</p>
        @empty
            <p>Нет истории изменений</p>
        @endforelse

        <nav class="blog-pagination">
            @can('update', $article)
                <a class="btn btn-outline-primary" href="/articles/{{ $article->slug }}/edit">Редактировать статью</a>
            @endcan
            <a class="btn btn-outline-primary" href="/">К списку статей</a>
        </nav>

    </div><!-- /.blog-main -->

@endsection


