@component('mail::message')
# Email  From
    Name: {{ $data['name'] }}
    Email: {{ $data['email'] }}
    Phone: {{ $data['phone'] }}
# Subject:  {{ $data['subject'] }}
# Body:
{{ $data['message'] }}

{{ config('app.name') }}
@endcomponent
