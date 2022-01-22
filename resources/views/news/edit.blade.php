@extends('layout.master')

@section('title')
    Редактирование новости
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Редактирование новости
        </h3>

        @include('layout.errors')

        <div class="blog-post">
            <form method="post" action="/news/{{ $news->id }}">
                @csrf
                @method('PATCH')

                @include('layout.newsForm')

                <button type="submit" class="btn btn-primary">Редактировать новость</button>
            </form>

        </div>

    </div><!-- /.blog-main -->

@endsection


