@component('mail::message')
# На сайте обновлена статья: {{$article->name}}
{{$article->text}}
@component('mail::button', ['url' => '/articles/' . $article->slug])
Посмотреть
@endcomponent

Спасибо за внимание,<br>
{{ config('app.name') }}
@endcomponent
