@component('mail::message')
    # Ваш отчет: {{$article->slug}}

    Спасибо за внимание,<br>
    {{ config('app.name') }}
@endcomponent
