@extends('layouts.app')

@section('content')
    @if(!empty($user->id))
        @guest
            <h2>L'accès a cette page vous est interdit!</h2>
        @else
            <h1>Profil</h1>
            <h2>Liste des informations des utilisateurs</h2>
                <p>{{$iu->name}}, {{$iu->email}}, <img src="{{asset($iu->avatar)}}" alt="Votre avatar" width="50px" height="50px"></p><br>

        @endguest
    @else
        Cet id ne correspond a personne, Réessayez!
    @endif
@endsection