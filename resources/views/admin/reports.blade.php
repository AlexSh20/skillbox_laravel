@extends('layout.master')

@section('title')
    Отчеты
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Отчеты
        </h3>

        @if($errors->count())

            @include('layout.errors')

        @else
            <p>Отчен направлен Вам на почту</p>
        @endif

        <div class="blog-post">
            <form method="post" action="/admin/reports">
                @csrf

                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                           name="articles_checkbox">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Статьи</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                           name="news_checkbox">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Новости</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                           name="comments_checkbox">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Комментарии</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                           name="tags_checkbox">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Тэги</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                           name="users_checkbox">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Пользователи</label>
                </div>

                <button type="submit" class="btn btn-primary">Сгенерировать отчёт</button>
            </form>


        </div>

    </div><!-- /.blog-main -->

@endsection

