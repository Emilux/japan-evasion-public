            <!-- TEXT HEADER BACK -->

            <div class="d-flex justify-content-center">
                <div class="text-header-back">
                    <h1>{$article->getTitre_Article()|upper}</h1>
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
            <li class="breadcrumb-item active" aria-current="page">{$article->getTitre_Article()|upper}</li>
        </ol>
    </nav>
</div>

<!-- EDIT ARTICLE -->

<div class="article-blog container">
    <div class="editer-par row justify-content-center">
        <h5>Publié le {$article->getDate_Publication_Article()|date_format:"%A %e %B  %Y"|lower}</h5>
    </div>
    <div class="editer-par row justify-content-center">
        <h3>par {$redacteur->getPseudo_Visiteur()|capitalize}</h3>
    </div>
    <div class="editer-par row justify-content-center">
        <h4>{$article->getTemps_Lecture_Article()} min de lecture</h4>
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