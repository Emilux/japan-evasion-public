</div>
</div>
</header>

<style>
    #background {
        height: 15vh !important;
    }
</style>

<!--Profile image followers like and follow buttons-->
<div class="container mt-4">
    <div class="row profile">
        <div class="profile-images-card ">
            <div class="profile-images mt-4">
                <!--<img src="assets/media/profile-image/pngtree-cartoon-european-and-american-character-avatar-design-png-image_4366075.jpg" id="upload-img" alt="">-->
                <img src="{$utilisateur.avatar_utilisateur}" alt="">
            </div>
            <div class="pseudo-user mt-4">
                <h3 class="m-auto bio-title ">{$utilisateur.pseudo_utilisateur|upper}</h3>
            </div>
        </div>

        <!--Nombre followers , commentaire, article-->
        <div class="profile-images-card buttons  py-3">
            <div class="row">

                <ul class="text-center pr-3 pl-3">
                    <li class="number-profil">{$follow}</li>
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
                    <li class="number-profil">{$article}</li>
                    <li>
                        <h3 class="mt-3">ARTICLE</h3>
                    </li>
                </ul>

            </div>

            <!--button like & follow-->
            <div class="button ml-0 mt-4 d-flex flex-row align-items-center py-3 ">
                <button class="btn-dark btn-sm btn-outline-dark w-100 "><i class="fas fa-bell "></i>  SUIVRE</button>
            </div>
        </div>
    </div>
</div>

<!--Edit profile -->
<div class="container ">
    <div class="row gutters ">
        <div class="col-lg-4 profile-edit ">
            <div class="profile-header-info ">
                <h4 class="m-auto ">BIO</h4>
                <div class="bio ">
                    <p class="m-auto pt-2 " id="bio_user ">{$utilisateur.bio_utilisateur}</p>
                </div>
            </div>
        </div>
        <div class="col-1 "></div>

        <div class="col-lg-7 carnet-voyage ">
            <h3 class="m-auto ">CARNET DE VOYAGE</h3>
            {if $carnet}
            <a href="{$carnet.contenu_carnet} " class="btn btn-dark my-3 ">Telechargez</a> {else}
            <p>Pas encore de carnet de voyage!</p>
            {/if}
        </div>
    </div>
</div>
</div>

<!--Article-->
<div class="container ">

    <div class="row article ">
        <h3 class="col-12 my-3 ">Activité</h3>
        <div class="col-12 ">
            <div class="card ">
                <div class="card-body ">
                    <h3 class="card-title ">COMMENTAIRE</h3>
                    <p class="card-text ">T'es vraiment très fort (à Krunker 😉)<br/><i class="fas fa-comment "> Publié le </i></p>

                    <a href="# " class="btn btn-dark ">Voir Commentaire</a>
                </div>
            </div>
        </div>
        <div class="col-12 my-3 ">
            <div class="card ">
                <div class="card-body ">
                    <h3 class="card-title ">ARTICLE</h3>
                    <div class="photo-text no-gutter d-flex justify-content-center ">

                        <div class="col-8 " id="photo-text-img2 ">
                            <h2>
                                5 LIEUX À VISITER À OKAYAMA
                            </h2>
                            <div class="editer-par-profil ">
                                <h5>Publié le mercredi 2 décembre 2020</h5>

                            </div>
                            <div class="editer-par-profil ">
                                <h3>par BigorneauVoyageur</h3>
                            </div>
                            <div class="editer-par-profil ">
                                <h4>8 min de lecture</h4>
                            </div>
                            <p>
                                Kurashiki est une ville japonaise de 476.000 habitants située dans la préfecture d'Okayama sur l'île de Honshu. Cœur historique traversé par le fleuve Takahashi et ses canaux, le quartier Bikan témoigne des heures glorieuses du Japon féodal et accueille
                                aujourd'hui plusieurs musées d'art réputés.
                            </p>
                        </div>
                        <div class="col-4 " id="photo-text-img ">
                            <a href="./assets/media/image-article4/image-art3-2.png " target="_blank ">
                                <img src="./assets/media/image-article4/image-art3-2.png " class="img-fluid " style="border:2px black solid" alt="Meow ">
                            </a>
                        </div>

                    </div>
                    <a href="# " class="btn btn-dark ">Voir Article</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Settings-->
{if $connecte && $smarty.session.utilisateur.id_utilisateur === $utilisateur.id_utilisateur}
<div class="container mb-5 ">
    <div class="row setting ">
        <h3 class="col-12 ">PARAMETRE</h3>
        <div class="col-4 ">
            <a class="text-dark " href="?page=profiles-edit "><i class="fas fa-cog pr-3 "></i>Modifier mon profil</a></a>
        </div>
    </div>
</div>
{/if}

<!--js function for image upload-->
<script>
    $(function() {
        $('#fileupload').change(function(event) {
            var x = URL.createObjectURL(event.target.files[0]);
            $('#upload-img').attr('src', x);
            console.log(event);
        });
    })
</script>