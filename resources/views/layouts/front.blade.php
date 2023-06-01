<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,  initial-scale=1">

    {{-- <title>{{ isset($meta_title) ? $meta_title : $page_title }}</title>
    <meta name="Description" content="{{ /*isset($meta_description) ? $meta_description : null */}}">
    <meta name="Keywords" content="{{ /*isset($meta_key) ? $meta_key : null */}}">
    <meta name="_token" content="{{csrf_token()}}">
    <link rel="shortcut icon" href="/public/frontCssJsFonts/assets/img/favicon.ico" type="image/x-icon"> --}}


</head>
<body class=""  data-lang="<?php echo Config::get('currentLang')?>" >

    @yield('content')

{{--    <script src="{{ mix('/js/app.js') }}"></script>--}}
{{--</div>--}}

</body>
</html>
