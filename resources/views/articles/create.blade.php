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
                <div class="form-group">
                    <label for="inputTitle">Символьный код</label>
                    <input type="text" class="form-control" id="inputTitle" name="slug"
                           placeholder="Добавьте символьный код">

                </div>

                <div class="form-group">
                    <label for="inputTitle">Название</label>
                    <input type="text" class="form-control" id="inputTitle" name="title"
                           placeholder="Добавьте название статьи">

                </div>

                <div class="form-group">
                    <label for="inputDescription">Описание</label>
                    <textarea class="form-control" id="inputDescription" name="description" rows="3"
                              placeholder="Краткое описание"></textarea>
                </div>

                <div class="form-group">
                    <label for="inputBody">Текст</label>
                    <textarea class="form-control" id="inputBody" name="text" rows="3"></textarea>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="inputCheckbox" name="release">
                    <label class="form-check-label" for="inputCheckbox">Опубликовать статью</label>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

    </div><!-- /.blog-main -->

@endsection


