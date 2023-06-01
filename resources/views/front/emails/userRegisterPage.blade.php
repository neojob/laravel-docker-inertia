@component('mail::message')
# {{ \App\Library\Translate::text($all_entities[141]['translation'],Config::get('currentLang')) }} {{ $data['first_name'] }} {{ $data['last_name'] }} {{ \App\Library\Translate::text($all_entities[142]['translation'],Config::get('currentLang')) }}
# {{ \App\Library\Translate::text($all_entities[143]['translation'],Config::get('currentLang')) }} <a target="_blank" href="{{URL::to( Config::get('routeLang'))}}">{{ \App\Library\Translate::text($all_entities[144]['translation'],Config::get('currentLang')) }}</a> {{ \App\Library\Translate::text($all_entities[145]['translation'],Config::get('currentLang')) }}.
# {{ \App\Library\Translate::text($all_entities[146]['translation'],Config::get('currentLang')) }}
# {{ \App\Library\Translate::text($all_entities[147]['translation'],Config::get('currentLang')) }}

@endcomponent
