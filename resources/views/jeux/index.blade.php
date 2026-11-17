<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

</head>
<body>
    <h1>Page d'accueil du projet</h1>
    <a href="{{ route('jeux.create') }}" class="btn btn-primary bouton-ajout">
        <i class="bi bi-plus-circle"></i>
        Ajouter un jeu
    </a>
    <a href="{{ route('jeux.modifier', $jeu->id) }}" class="btn btn-warning">
        Modifier
    </a>
</body>
</html>