@extends('layout.master')

@section('title')
    Статистика
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Статистика
        </h3>

        <div class="blog-post">
            <div class="row">
                <div class="column col"><b>Наименование показателя</b></div>
                <div class="column col"><b>Значение</b></div>
            </div>

            <div class="row">
                <div class="column col-sm">Общее количество статей:</div>
                <div class="column  col-sm"> {{ $articlesCount }} </div>
            </div>

            <div class="row">
                <div class="column col-sm">Общее количество новостей:</div>
                <div class="column  col-sm"> {{ $newsCount }} </div>
            </div>

            <div class="row">
                <div class="column col-sm">ФИО автора, у которого больше всего статей на сайте:</div>
                <div class="column  col-sm">  {{ $mostProductiveAuthor->name }}   </div>
            </div>

            <div class="row">
                <div class="column col-sm">Самая длинная статья:</div>
                <div class="column  col-sm"><a
                        href="/articles/{{ $longestArticle->slug }}">{{ $longestArticle->name }}</a>
                    - {{ $longestArticle->length }} симв.
                </div>
            </div>

            <div class="row">
                <div class="column col-sm">Самая короткая статья:</div>
                <div class="column  col-sm"><a
                        href="/articles/{{ $shortestArticle->slug }}">{{ $shortestArticle->name }}</a>
                    - {{ $shortestArticle->length }} симв.
                </div>
            </div>

            <div class="row">
                <div class="column col-sm">Средние количество статей у активных пользователей (пользователь считается
                    активным, если у него более 1 статьи):
                </div>
                <div class="column  col-sm">  {{ round($averageNumberOfArticles->avg('count')) }}   </div>
            </div>

            <div class="row">
                <div class="column col-sm"> Самая непостоянная(изменяемая) статья:</div>
                <div class="column  col-sm"><a
                        href="/articles/{{ $mostChangeableArticle->slug }}">{{ $mostChangeableArticle->name }}</a></div>
            </div>


            <div class="row">
                <div class="column col-sm"> Самая обсуждаемая статья:</div>
                <div class="column  col-sm"><a
                        href="/articles/{{ $mostDiscussedArticle->slug }}">{{ $mostDiscussedArticle->name }}</a>
                    - {{ $mostDiscussedArticle->count }} коммент.
                </div>
            </div>


        </div>

    </div><!-- /.blog-main -->

@endsection

