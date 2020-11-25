<?php ob_start();?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">BLOG</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/articles">Tout les articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/articles/create">Ajouter un article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/articles/generate">Générer un article</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<?php $nav = ob_get_clean();?>