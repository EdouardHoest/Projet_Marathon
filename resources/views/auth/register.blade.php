@extends('layouts.app')

@section('content')
    <html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="R A N D O M est un réseau social mettant en relation les gamers.">
        <meta name="authors" content="Victor Wallart, Léa Henin, Manoi Boinet">
        <meta name="keywords" content="R A N D O M, Mini-Facebook, DUT MMI">
        <title>CONNEXION</title>
        <link rel="stylesheet" href="{{ URL::asset('/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ URL::asset ('/css/Accueil.css') }}">
        <link rel="stylesheet" href="{{ URL::asset ('/css/inscriptionresponsive.css') }}">
        <link rel="icon" type="image/png" href="public/img/images/connexionimg.jpg" />
    </head>

    <div id="main404">
        <div class="error-monkey">


            <h1 id="form1">INSCRIPTION</h1>
            <form id="connexion" action="{{ route('register') }}" method="POST">
                @csrf
                <input type="text" class="searchbar @error('name') is-invalid @enderror" id="pseudo" name="name" placeholder="Entrez votre pseudo"  value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="text" class="searchbar @error('email') is-invalid @enderror" id="email" name="email" placeholder="Entrez votre e-mail" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <input type="password" class="searchbar @error('password') is-invalid @enderror" id="mdp" name="password" placeholder="Entrez votre Mot De Passe" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
                <input type="password" class="searchbar" id="mdpconfirme" name="password_confirmation" placeholder="Confirmer Mot De Passe" required autocomplete="new-password">
                <br>
                <button type="submit" class="searchbar" id="submitconnexion" name="submitconnexion" value="S'INSCRIRE">
                    {{ __('Inscription') }}
                </button>
                <br>
            </form>
        </div>
    </div>
    </html>
@endsection
