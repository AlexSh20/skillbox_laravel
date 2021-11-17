@extends('layout.master')

@section('content')
        <div class="col-md-8 blog-main">
            <h3 class="pb-3 mb-4 font-italic border-bottom">
                {{ $title }}
            </h3>

            <div class="blog-post">
                <div class="row">
                    <div class="column col"><b>Email отправителя</b></div>
                    <div class="column col"><b>Текст сообщения</b></div>
                    <div class="column col"><b>Дата получения</b></div>
                </div>
                @foreach($feedBacks as $feedback)

                <div class="row">
                    <div class="column col-sm">{{ $feedback->email }}</div>
                    <div class="column  col-sm">{{ $feedback->message }}</div>
                    <div class="column  col-sm">{{ $feedback->created_at }}</div>
                </div>
                @endforeach

            </div>

        </div><!-- /.blog-main -->

@endsection

