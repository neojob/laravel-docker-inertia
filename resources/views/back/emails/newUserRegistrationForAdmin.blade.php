@component('mail::message')
# New user registration in {{ env('APP_NAME') }}

# User F_Name - {{ $user->first_name }}
# User L_Name - {{ $user->last_name }}
# User Email  - {{ $user->email }}


{{ config('app.name') }}
@endcomponent
