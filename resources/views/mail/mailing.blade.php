@component('mail::message')
    # Новые статьи за {{$period}} дней
    @foreach($articles as $article)
        {{$article->name}}
    @endforeach
    
    Спасибо за внимание,<br>
    {{ config('app.name') }}
@endcomponent<?php
