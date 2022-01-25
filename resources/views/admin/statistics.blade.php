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
                    <div class="column  col-sm">     </div>
                </div>

                <div class="row">
                    <div class="column col-sm">Самая длинная статья:</div>
                    <div class="column  col-sm">   название, ссылка на статью и длина статьи в символах  </div>
                </div>

                <div class="row">
                    <div class="column col-sm">Самая короткая статья:</div>
                    <div class="column  col-sm">   название, ссылка на статью и длина статьи в символах  </div>
                </div>

                <div class="row">
                    <div class="column col-sm">Средние количество статей у активных пользователей (пользователь считается активным, если у него более 1 статьи):</div>
                    <div class="column  col-sm">     </div>
                </div>

                <div class="row">
                    <div class="column col-sm"> Самая непостоянная:</div>
                    <div class="column  col-sm">  название, ссылка на статью, которую меняли больше всего раз   </div>
                </div>


                <div class="row">
                    <div class="column col-sm"> Самая обсуждаемая статья:</div>
                    <div class="column  col-sm">  название, ссылка на статью, у которой больше всего комментариев   </div>
                </div>



            </div>

        </div><!-- /.blog-main -->

@endsection

