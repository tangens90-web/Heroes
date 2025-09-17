@component('mail::message')
# Тестовое письмо

Это тестовое сообщение.

@component('mail::button', ['url' => 'https://example.com'])
Перейти на сайт
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
