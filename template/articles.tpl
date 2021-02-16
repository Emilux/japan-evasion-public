            <!-- TEXT HEADER BACK -->

            <div class="d-flex justify-content-center">
                <div class="text-header-back">
                    <h1>{$article.titre_article|upper}</h1>
                </div>
            </div>
        </div>
    </div>
</header>



<!-- TITRE MOBILE -->

<div class="d-flex justify-content-center">
    <h5 class="titre-mobile">
        NOUS CONTACTER
    </h5>
</div>

<!-- BREACRUMB -->

<div class="d-flex justify-content-center">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">ACCUEIL</a></li>
            <li class="breadcrumb-item active" aria-current="page">{$article.titre_article|upper}</li>
        </ol>
    </nav>
</div>

<!-- EDIT ARTICLE -->

<div class="article-blog container">
    <div class="editer-par row justify-content-center">
        <h5>Publié le {$article.date_publication_article|date_format:"%A %e %B  %Y"|utf8_encode|lower}</h5>
    </div>
    <div class="editer-par row justify-content-center">
        <h3>par {$redacteur.pseudo_utilisateur|capitalize}</h3>
    </div>
    <div class="editer-par row justify-content-center">
        <h4>{$article.temps_lecture_article} min de lecture</h4>
    </div>

    <div class="partage row justify-content-center">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fas fa-share-alt"></i></a>
    </div>


{include file='template/commentaire.tpl'}

</div>