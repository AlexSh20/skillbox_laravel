@extends('layout.master')

@section('title')
    Новости
@endsection

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Новости
        </h3>

            @foreach($news as $item)
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="/news/{{ $item->id }}">{{ $item->name }}</a></h2>
                    <p class="blog-post-meta">{{ $item->created_at->toFormattedDateString() }}</p>

                    <p>{{ $item->text }}</p>
                    <hr>
                </div>
            @endforeach

        {{ $news->links() }}

    </div>

@endsection


