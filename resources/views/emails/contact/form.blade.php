@component('mail::message')
# Subject: {{ $subject }}

{{ $message }}

Terima kasih,
{{ config('app.name') }}
@endcomponent
