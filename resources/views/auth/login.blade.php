@extends('layouts.app')

@section('content')
<div id="main404">
    <div class="error-monkey">

        <h1>CONNEXION</h1>
        <form method="POST" action="{{ route('login') }}" id ="connexion">
        @csrf
            <!--<input type="text" class="searchbar" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo" required> <br> -->
            <input type="text" class="searchbar @error('email') is-invalid @enderror" id="email" name="email"
                   placeholder="Entrez votre e-mail" value="{{ old('email') }}"
                   required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <input type="password" class="searchbar @error('password') is-invalid @enderror" id="mdp" name="password"
                   placeholder="Entrez votre Mot De Passe" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Se souvenirs de moi') }}
            </label>
            <br>
            <button type="submit" type="submit" class="searchbar" id="submitconnexion" name="submitconnexion" value="ME CONNECTER">
                {{ __('SE CONNECTER') }}
            </button>
            <!--<input type="password" class="searchbar" id="mdpconfirme" name="mdpconfirme" placeholder="Confirmer Mot De Passe"required> <br>-->
            <br>
        </form>

    </div>
</div>
@endsection

