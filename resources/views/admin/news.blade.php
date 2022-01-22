@extends('layout.master')

@section('title')
    Добавление новости
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Управление новостями
        </h3>

        <div><a type="submit" class="btn btn-primary" href="/news/create">Создать новость</a></div>

        <div class="blog-post">
            <div class="row">
                <div class="column col"><b>Заголовок новости</b></div>
                <div class="column col"><b>Текст новости</b></div>
                <div class="column col"><b> </b></div>
                <div class="column col"><b> </b></div>
            </div>
            @foreach($news as $item)

                <div class="row">
                    <div class="column col-sm">{{ $item->name }}</div>
                    <div class="column  col-sm">{{ $item->text }}</div>
                    <div class="column  col-sm"><a type="submit" class="btn btn-primary" href="/news/{{ $item->id }}/edit">Редактировать</a></div>
                    <div class="column  col-sm">
                        <form method="post" action="/news/{{ $item->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>

        {{ $news->links() }}

    </div><!-- /.blog-main -->

@endsection
