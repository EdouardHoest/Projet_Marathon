<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="R A N D O M est un réseau social mettant en relation les gamers.">
    <meta name="authors" content="Victor Wallart, Léa Henin, Manoi Boinet">
    <meta name="keywords" content="R A N D O M, Mini-Facebook, DUT MMI">
    <title>Action 404</title>
    <link rel="stylesheet" href= "{{ URL::asset('/css/normalize.css') }} ">
    <link rel="stylesheet" href="{{ URL::asset ('/css/404.css') }}">
    <link rel="icon" type="image/png" href="public/img/images/404img.jpg">

</head>


<div id="main404" style="background-image: url({{asset('/img/images/404img.jpg')}})">
    <div class="error-monkey">
        <div id="erreur">
            <h1>404</h1>
            <h1>OUPS !</h1>
            <p>La page que vous recherchez
                semble introuvable</p>
            <a href="/">RETOUR AU SITE</a>
        </div>


    </div>
</div>
</html>