@extends('layout.master')

@section('title')
    Редактирование статьи
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Редактирование статьи
        </h3>

        @include('layout.errors')

        <div class="blog-post">
            <form method="post" action="/articles/{{ $article->slug }}">
                @csrf
                @method('PATCH')

                @include('layout.articleForm')

                <button type="submit" class="btn btn-primary">Редактировать статью</button>
            </form>

            <form method="post" action="/articles/{{ $article->slug }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Удалить</button>
            </form>


        </div>

    </div><!-- /.blog-main -->

@endsection


