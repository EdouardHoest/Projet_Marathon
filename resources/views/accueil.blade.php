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
        <link rel="stylesheet" href="{{ URL::asset ('/css/accueilresponsive.css') }}">
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
        <!--</div>-->
    </header>

        <div id="textepage1">

            <div id="texteaccueil"><p>Découvrez vos <br> séries préférées !</p></div>

            <div id="fleche"> <a href="#textepage2"><img src="{{asset("img/images/fleche.png")}}"></a></div>

        </div>

        <div id="textepage2" style="background-image: url({{asset('/img/images/fond2.jpg')}})">

            <div id="texteaccueil"><p>Les 5 séries les mieux notées !</p></div>

            <div id="soulignement"></div>

            <div id="les5images">
                @foreach($series as $serie)
                    <a href ="{{route('detailsSerie',$serie->id)}}"><img src="{{$serie->urlImage}}" alt="Image_série"></a>
                @endforeach
            </div>
        </div>
    </html>
@endsection