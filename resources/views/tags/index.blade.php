@extends('layout.master')

@section('title')
    Сортировка по тэгам
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Сортировка по тэгам
        </h3>

        <div class="blog-post">
            <div class="row">
                <div class="column col"><b>Статьи</b></div>
                <div class="column col"><b>Новости</b></div>
            </div>
            <div class="row">
                <div class="column col-sm">
                    @foreach($articles as $article)
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a
                                    href="/articles/{{ $article->slug }}">{{ $article->name }}</a></h2>
                            <p class="blog-post-meta">{{ $article->created_at->toFormattedDateString() }}</p>

                            @include('articles.tags', ['tags' =>$article->tags])

                            <p>{{ $article->description }}</p>
                            <hr>
                        </div>
                    @endforeach
                </div>

                <div class="column col-sm">
                    @foreach($news as $item)
                        <div class="blog-post">
                            <h2 class="blog-post-title"><a href="/news/{{ $item->id }}">{{ $item->name }}</a></h2>
                            <p class="blog-post-meta">{{ $item->created_at->toFormattedDateString() }}</p>

                            @include('articles.tags', ['tags' =>$item->tags])

                            <p>{{ $item->text }}</p>
                            <hr>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div><!-- /.blog-main -->

@endsection


