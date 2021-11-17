@extends('layout.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $title }}
        </h3>

        @include('layout.errors')

        <div class="blog-post">
            <form method="post" action="/admin/feedback">
                @csrf
                <div class="form-group">
                    <label for="inputTitle">Название</label>
                    <input type="email" class="form-control" id="inputEmail" name="email"
                           placeholder="Укажите Вашу почту">
                </div>

                <div class="form-group">
                    <label for="inputBody">Текст сообщения</label>
                    <textarea class="form-control" id="inputBody" name="message" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>

    </div><!-- /.blog-main -->

@endsection

