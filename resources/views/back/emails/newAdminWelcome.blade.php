@component('mail::message')
# Dear {{ $user->first_name.' '.$user->first_name }}
# You have been registered in {{ env('APP_NAME') }}

Your profile isn't activated. Will activate it ASAP.

<a href="{{ env('APP_URL') }}" class="button button-blue" target="_blank" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; border-radius: 3px; box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16); color: #FFF; display: inline-block; text-decoration: none; -webkit-text-size-adjust: none; background-color: #3097D1; border-top: 10px solid #3097D1; border-right: 18px solid #3097D1; border-bottom: 10px solid #3097D1; border-left: 18px solid #3097D1;">{{ env('APP_NAME') }}</a>

Thank You for registration,<br>
Best Regards!<br>
{{ config('app.name') }}
@endcomponent
