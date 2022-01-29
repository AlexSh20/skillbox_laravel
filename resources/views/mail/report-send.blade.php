@component('mail::message')
    # Ваш отчет: {{$report}}

    Спасибо за внимание,<br>
    {{ config('app.name') }}
@endcomponent
