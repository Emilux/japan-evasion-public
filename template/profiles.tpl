</div>
</div>
</header>

<style>
    #background {
        height: 15vh !important;
    }
</style>

<!-- PROFILE -->

<div class="container mt-4">
    <div class="row profile">
        <div class="profile-images-card ">
            <div class="profile-images mt-4">
                <img src="{$utilisateur->getAvatar_Utilisateur()}" alt="">
            </div>
            <div class="pseudo-user mt-4">
                <h3 class="m-auto bio-title ">
                
                {$utilisateur->getPseudo_Visiteur()|capitalize}
                {if $nom_role->getNom_role() === 'redacteur'}
                <i class="fas fa-feather-alt" style="color: #248899 !important;"></i>
                {/if}
                {if $nom_role->getNom_role() === 'administrateur'}
                <img src="./assets/media/avatar/shield.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">
                {/if}
                {if $nom_role->getNom_role() === 'moderateur'}
                <img src="./assets/media/avatar/shield2.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">
                {/if}
                </h3>
                <i class="fas fa-envelope"></i><a class="text-dark" href="#">{$utilisateur->getEmail_Visiteur()}</a>
            </div>
        </div>

        <!-- FOLLOWERS, ARTICLES, LIKE -->

        <div class="profile-images-card buttons  py-3">
            <form method="get" id="form-follow" action="./?ajax=follow">
                <div class="row">

                    <ul class="text-center pr-3 pl-3">
                        <li class="number-profil">{$followers}</li>
                        <li>
                            <h3 class="mt-3">FOLLOWERS</h3>
                        </li>
                    </ul>

                    <ul class="text-center pr-3 pl-3">
                        <li class="number-profil">{$commente}</li>
                        <li>
                            <h3 class="mt-3">COMMENTAIRE</h3>
                        </li>
                    </ul>

                    <ul class="text-center pr-3 pl-3">
                        <li class="number-profil">{$nbArticle}</li>
                        <li>
                            <h3 class="mt-3">ARTICLE</h3>
                        </li>
                    </ul>

                </div>

                <!-- BUTTON FOLLOW -->
                {if $connecte && $smarty.session.utilisateur.pseudo_visiteur !== $utilisateur->getPseudo_Visiteur()}
                <div class="button ml-0 mt-4 d-flex flex-row align-items-center py-3 ">
                    <input type="hidden" name="id_followed" value="{$utilisateur->getId_Utilisateur()}" >
                    <button class="btn-dark btn-sm btn-outline-dark following w-100" id="followbtn" name="followbtn"><i class="fas fa-bell "></i>  SUIVRE</button>
                </div>
                {/if}
            </form>    
        </div>
    </div>
</div>

<!-- BIO UTILISATEUR -->
<div class="container ">
    <div class="row gutters ">
        <div class="col-lg-4 profile-edit ">
            <div class="profile-header-info ">
                <h4 class="m-auto ">BIO</h4>
                <div class="bio ">
                    <p class="m-auto pt-2 " id="bio_user ">{$utilisateur->getBio_Utilisateur()}</p>
                </div>
            </div>
        </div>
        <div class="col-1 "></div>

        <div class="col-lg-7 carnet-voyage ">
            <h3 class="m-auto ">CARNET DE VOYAGE</h3>
            {if $carnet}
            <a href="{$carnet->getContenu_Carnet()} " class="btn btn-dark my-3 ">Telechargez</a> {else}
            <p>Pas encore de carnet de voyage!</p>
            {/if}
        </div>
    </div>
</div>

<!-- ACTIVITE -->
<div class="container ">

    <div class="row article ">
        <h3 class="col-12 my-3 ">Activité</h3>

        <!-- COMMENTAIRE -->

        <div class="col-12 ">

            {if $commentaires}
            <div class="card ">
                
                {foreach from=$commentaires item=commentaire key=i}

                <div class="card-body">
                    <h3 class="card-title ">COMMENTAIRE</h3>
                    <p class="card-text ">« {$commentaire->getContenu_Commentaire()} »<br/><i class="fas fa-comment mt-3"> Publié le {$commentaire->getDatetime_Commentaire()|date_format : "%e %B  %Y à %T"}</i></p>

                    <a href="?page=articles&id={$commentaire->getId_Article()}#commentaire_{$commentaire->getId_Commentaire()}" class="btn btn-dark ">Voir Commentaire</a>
                </div>

                {/foreach}
                
            </div>
            {/if}

        </div>


        <!-- ARTICLE -->

        <div class="col-12 my-3 ">

            {if $articles} <!-- Si il y a un article, affiche les articles-->
            <div class="card ">

                {foreach from=$articles item=article key=i}

                <div class="card-body ">
                    <h3 class="card-title ">ARTICLE</h3>
                    <div class="photo-text no-gutter d-flex justify-content-center ">

                        <div class="col-7 " id="photo-text-img2 ">
                            <h2>
                                {$article->getTitre_Article()}
                            </h2>
                            <div class="editer-par-profil ">
                                <h5>Publié le {$article->getDate_Publication_Article()|date_format : "%e %B  %Y à %T"}</h5>
                            </div>
                            <div class="editer-par-profil ">
                                <h4>{$article->getTemps_Lecture_Article()} min de lecture</h4>
                            </div>
                            <p>
                            {$article->getContenu_Article()|truncate:200}
                            </p>
                        </div>
                        <div class="col-5 " id="photo-text-img ">
                            <a href={$article->getTemps_Lecture_Article()} target="_blank ">
                                <img src={$article->getPhoto_Article()} class="img-fluid " style="border:2px black solid; height: 231px; object-fit: cover; width: 350px;" >
                            </a>
                        </div>

                    </div>
                    <a href="?page=articles&id={$article->getId_Article()}" class="btn btn-dark ">Voir Article</a>
                </div>

                {/foreach}
                
            </div>
            {/if}

        </div>
    </div>
</div>
</div>

<!-- PARAMETRE -->

<!--
Affichera le bouton "Parametre" pour les utilisateurs présent sur leurs propre page de profil, le cachera pour les autres pages.
-->


<!-- PARAMETRES -->
{if $connecte && $smarty.session.utilisateur.id_visiteur === $utilisateur->getId_Visiteur()}
<div class="container mb-5 ">
    <div class="row setting ">
        <h3 class="col-12 ">PARAMETRES</h3>
        <div class="col-4 mt-2">
            <a class="text-dark" href="?page=profiles-edit "><i class="fas fa-cog pr-3 "></i>Modifier mon profil</a></a>
        </div>
    </div>
</div>
{/if}


<!-- FUNCTION UPLOAD IMAGE -->
<script>
    $(function() {
        $('#fileupload').change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $('#upload-img').attr('src', x);
            console.log(event);
        });
    })
</script>


<!-- SLIDER SLICK -->

<script src="assets/js/slick.js"></script>
<script>
    $('.card').slick({

        infinite: true,

    });
</script>