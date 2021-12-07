@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $title }}
        </h3>

        @include('layout.errors')

        <div class="blog-post">
            <form method="post" action="/articles">
                @csrf
                @include('layout.articleForm')

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

    </div><!-- /.blog-main -->

@endsection


