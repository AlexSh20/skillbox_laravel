@component('mail::message')
    # Ваш отчет:

    @foreach ($report as $string)
        {{ $string}}
    @endforeach

    Спасибо за внимание,<br>
    {{ config('app.name') }}
@endcomponent
