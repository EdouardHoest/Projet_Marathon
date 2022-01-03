@extends('layouts.app')

@section('content')
    <html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="R A N D O M est un réseau social mettant en relation les gamers.">
        <title>A C C U E I L</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset ('/css/Accueil.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset ('/css/profilresponsive.css') }}">

    </head>
    <header>

        <!--<div id="backgroundheader">-->
        <div id="header">
            <img src="images/logo.png" href="#textepage1">
            <a href="accueil">ACCUEIL</a>
            <a href="series">SÉRIES</a>
            <a href="index">PROFIL</a>
            <a href="login">SE CONNECTER</a>
            <a href="register">S'INSCRIRE</a>
            <!--<div id="search">
                <form>
                    <input type="image" id="recherche" alt="search" src="images/recherche.png">
                    <input value="" id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Rechercher...">
                </form>
            </div>-->
        </div>
        <!--</div>-->

    </header>
    <content>
        @guest
            <h2>L'accès à cette page vous est interdit!</h2>
        @else
            <div id="texteprofil">
                <p>{{Auth::user()->name}},{{Auth::user()->email}}, <img src="{{Auth::user()->avatar}}" alt="Votre avatar" width="50px" height="50px"> </p><br>
    @guest
        <h2>L'accès à cette page vous est interdit!</h2>
    @else
        <h1>Profil</h1>
        <h2>Liste des informations de l'utilisateur</h2>
        <p>{{Auth::user()->name}},{{Auth::user()->email}} <img src="{{Auth::user()->avatar}}" alt="Votre avatar" width="50px" height="50px"> </p><br>

        <h2>Liste des séries vues: </h2>
        @foreach($tab as $l)
            <a href="../detailsSerie/{{$l->id}}" target="_blank"><img src="{{$l->urlImage}}" alt="Image de la série"></a>
        @endforeach
    @endguest
    @if(Auth::user()->administrateur)
        <h2>Liste des commentaires à valider</h2>
        @foreach($tab as $l1)
            <details>
                <summary>{{$l1->nom}}</summary>
                @foreach($tab2 as $vl)
                    @if($vl->validated and $vl->serie_id == $l1 -> id)
                        {!! $vl->note !!}{!! $vl->content !!}
                    @endif
                @endforeach
            </details>
        @endforeach
    @endif
                <div id="texteaccueilprofil"><p>Mes informations : </p></div>

                <div id="soulignement"></div>

                <div id="infos">
                    <div id="texteinfo"><p><b> Mon adresse mail :</b> manon@gmail.com </p></div>
                    <div id="texteinfo"><p><b> Mon pseudo :</b> manon</p></div>
                    <h1> Les séries que vous avez aimé : </h1>
                </div>
            </div>

            <h2>Liste des séries vues: </h2>
            @foreach($ie as $l)
                @if($l == Episode::id())
                    <p>{{Serie::all()}}</p>
                @endif
            @endforeach
        @endguest
    </content>
    </html>
@endsection