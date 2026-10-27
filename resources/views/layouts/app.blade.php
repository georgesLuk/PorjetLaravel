<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('titre', 'Steam - Jeux vidéo')</title>
<link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
<header class="header">
<a href="{{ url('/') }}" class="logo">
<span class="logo-icon">N</span>

NOVA PLAY
</a>
<nav class="navigation">
<a href="{{ url('/') }}">Accueil</a>
<a href="{{ url('/jeuxGabarits') }}">Bibliothèque</a>
<a href="{{ url('/jeuxGabarits') }}#categories">Catégories</a>
</nav>
<a href="{{ url('/jeuxGabarits') }}" class="header-button">Explorer</a>
</header>
<main>

@yield('contenu')
</main>
<footer class="footer">
<a href="{{ url('/') }}" class="footer-logo">STEAM</a>
<p>Découvre ton prochain jeu préféré.</p>
<p class="copyright">© {{ date('Y') }} Steam – Projet étudiant Laravel</p>
</footer>
</body>
</html>
 