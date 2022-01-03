<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset ("css/normalize.css")}}" />
    <link rel="stylesheet" href="{{asset ("css/Accueil.css")}}">
    <link rel="stylesheet" href="{{asset ("css/connexionresponsive.css")}}">
    <link rel="stylesheet" href="{{asset ("css/accueilresponsive.css")}}">
    <link rel="stylesheet" href="{{asset ("css/inscriptionresponsive.css")}}">
    <link rel="stylesheet" href="{{asset ("css/detailseriesresponsive.css")}}">
    <link rel="stylesheet" href="{{asset ("css/seriesresponsive.css")}}">
    <link rel="stylesheet" href="{{asset ("css/profilresponsive.css")}}">
</head>
<style>
    html {
        background-image: url({{asset('/img/images/fond1.jpg')}});
    }
    @font-face {
        font-family: 'Futura';
        src: url({{asset('/fonts/futura/Futura medium bt.tff')}}) format('truetype');
    }
    #textepage2 {
        background-image: url({{asset('/img/images/fond2.jpg')}});
    }
    #texteseries {
        background-image: url({{asset('/img/images/fond2.jpg')}});

    }
    #main404 {

        background-image: url({{asset ('/img/images/connexionimg.jpg')}});
    }
</style>
<body>
<!-- Authentication Links -->
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->
</body>
</html>
