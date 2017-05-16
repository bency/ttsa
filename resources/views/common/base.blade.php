<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:url" content="{{ url()->current() }}">
        @yield('inhead')
        <meta property="og:title" content="{{ isset($qa) ? $qa->subject : ''}}">
        <meta property="og:description" content="{{ isset($qa) ? $qa->response : '' }}">

        <title>{{ env('APP_NAME', "交通安全協會") }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            @yield('container')
        </div>
    </body>
</html>
