@extends('layouts.app')

@section('content')
    <html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="R A N D O M est un réseau social mettant en relation les gamers.">
        <title>A C C U E I L</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset ('/css/Accueil.css') }}">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <link rel="stylesheet" href="{{ URL::asset ('/css/serieresponsive.css') }}">
        <link rel="icon" type="image/png" href="public/img/images/fond1.jpg">
    </head>
    <header>
        <!--<div id="backgroundheader">-->
        <div id="header" style="background-image: url({{asset('/img/images/fond1.jpg')}})">
            <img src="{{asset('img/images/logo.png')}}" href="#textepage1">
            <a href="/">ACCUEIL</a>
            <a href="series">SÉRIES</a>
            <a href="utilisateur">PROFIL</a>
            @guest
                <a href="{{ route('login') }}">SE CONNECTER</a>
                <a href="{{ route('register') }}">S'INSCRIRE</a>
            @else
                @if (Auth::user())
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    DECONNEXION
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <!--<div id="search">
                    <form>
                        <input type="image" id="recherche" alt="search" src="images/recherche.png">
                        <input value="" id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Rechercher...">
                    </form>
                </div>-->
        </div>
        @endguest
    </header>
        <div id="texteseries" style ="background-image: url({{asset ('/img/images/fond2.jpg')}})">

            <div id="texteaccueilseries"><p>Retrouvez toutes les séries !</p></div>

            <div id="soulignement"></div>

            <div id="toutesseries">
                <div id="lesseries">
                    @foreach($series as $serie)
                        <div id="uneserie">
                            <a href ="{{route('detailsSerie',$serie->id)}}">
                                <img src="{{$serie->urlImage}}" alt="Image Serie"></a>
                            <p> <i class="far fa-flag"></i> Langue: {{$serie->langue}} <br>
                                <i class="far fa-star"></i> {{$serie->note}}/10 <br>
                                <i class="fas fa-video"></i> {{$serie->nbEpisodes()}} Episodes <br>
                                <i class="fas fa-film"></i> {{$serie->nbSaisons()}} Saisons <br>
                                Genre: {{$serie->genre}}
                            </p>
                        </div>
                        <div id="soulignement1"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </html>
@endsection
