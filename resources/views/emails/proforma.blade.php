@component('mail::message')
# Asunto : {{ $data['subject'] }}.

# 


@component('mail::button', ['url' => ''])
CotiFast
@endcomponent

Gracias {{ $data['name'] }},<br>
{{ config('app.name') }}
@endcomponent
