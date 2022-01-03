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
        <link rel="stylesheet" href="{{ URL::asset ('/css/detailserieresponsive.css') }}">
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
        <div id="textedetail">

            <div id="texteaccueilseries"><p>Détails de la série !</p></div>

            <div id="soulignement"></div>
            <div id="caracteristiques">
                <img src="{{asset($detailsSeries->urlImage)}}" alt="Image Serie">
                <div>
                    <div>
                        <div><i class="far fa-calendar-alt"></i> {{$detailsSeries->premiere}} </div>
                        <div><i class="far fa-flag"></i>{{$detailsSeries->langue}} </div>
                        <div><i class="far fa-star"></i> {{$detailsSeries->note}}/10 </div><br>
                    </div>
                    <div>
                        <div><i class="fas fa-video"></i> {{$detailsSeries->nbEpisodes()}} Épisodes</div>
                        <div><i class="fas fa-film"></i> {{$detailsSeries->nbSaisons()}} Saisons </div>
                        <div>Genre : {{$detailsSeries->genre}}</div>
                    </div>
                    <p>Resume: {!! $detailsSeries->resume !!}</p>
                </div>
            </div>

            @auth
                <div id="commentaire">
                    <div >
                        <form action="{{route('detailsSerie.commenter',[$detailsSeries->id])}}" method="post">
                            @csrf
                            <input type="hidden" value="{{$detailsSeries->id}}" id="id" name="id">
                            <input type="number" min="0" max="10" value="5" id="note" name="note" />
                            <textarea id="content" name="content"> </textarea>

                            <input type="submit" />
                        </form>
                    </div>
                </div>


        @foreach($detailsSeries->comments as $c)
            {!! $c->content !!}
            @if(Auth::user()->administrateur)
            @endif
        @endforeach

                <p><b> Listes des épisodes : </b></p>
                <div id="episodes">
                        @foreach($detailsSeries->episodes as $ep)
                            <p>{{$ep->nom}}, Saison: {{$ep->saison}}</p>
                            <input type="checkbox" id="vu" name="vu">
                            <label for="vu"><img src="{{asset($ep->urlImage)}}" alt="Image Episodes"></label>
                        @endforeach
                    @endauth
                </div>
    @guest
        @foreach($detailsSeries->comments as $c)
            {!! $c->content !!}
        @endforeach
            <p><b> Listes des épisodes : </b></p>
            <div id="episodes">
                @foreach($detailsSeries->episodes as $ep)
                    <p>{{$ep->nom}}, Saison: {{$ep->saison}}</p>
                    <p><img src="{{asset($ep->urlImage)}}" alt="Image Episodes"></p>
                @endforeach
            </div>
        </div>
    </header>
    @endguest
    </html>
@endsection