            <!-- TEXTE HEADER BACKGROUND -->

            <div class="row justify-content-center">
                <div class="text-header-back">
                    <h1>ENVOLE TOI VERS LE JAPON</h1>
                    <h5>CARNET DE VOYAGE</h5>
                    <a class="btn" href="?page=quisommesnous" id="bouton">EN SAVOIR PLUS</a>
                </div>
            </div>

            <!-- SCROLLDOWN -->

            <div class="d-flex justify-content-center">
                <a href="#section1">
                    <div class="scrolldown">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="scrolldown2">
                        <i class="fas fa-chevron-down"></i>
                    </div>

                </a>
            </div>
        </div>
    </div>

</header>

<!-- TITRE MOBILE -->

<div class="d-flex justify-content-center">
    <h5 class="titre-mobile">
        BIENVENUE SUR <br>JAPAN-EVASION
    </h5>
</div>

<!-- ARTICLE -->

<div class="container" id="section1">
    <!-- RECHERCHE - FILTRAGE ARTICLE -->

    <form class="row domain-search bg-pblue" id="recherche">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group"> <input type="search" class="form-control" placeholder="Rechercher un article...">
                        <span class="input-group-addon">
                            <input type="submit" value="Rechercher" class="btn btn-dark">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--<div class="row">
        <div class="card-deck">
            {if isset($article)}
                {foreach from=$article item=$value}
            <div class="card shadow  bg-white rounded">
                <img class="card-img-top" src="{$value.photo_article}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><span class="dot">• </span>TOKYO</h5>
                    <h2>{$value.titre_article}</h2>
                    <p class="card-text">{$value.contenu_article}</p>
                    <div class="row justify-content-center">
                        <a class="btn-lire" href="?page=articles&article={$value.id_article}">LIRE L'ARTICLE</a>
                    </div>
                </div>
            </div>
                {/foreach}
            {/if}

        </div>-->
    </div>
</div>