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

    <form method="get" class="row domain-search bg-pblue mb-4" id="recherche">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group"> <input type="search" name="recherche" class="form-control" placeholder="Rechercher un article...">
                        <span class="input-group-addon">
                            <input type="submit" value="Rechercher" class="btn btn-dark">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="row" id="article">
            {if $article}
                {foreach from=$article item=value}
                    {if $value->getStatut_Article() !== 'PENDING'}
            <div class="p-3 col-4">
                <div class="card h-100 shadow bg-white rounded">
                    <div class="cardy-b">
                        <img class="card-img-top" src="{$value->getPhoto_Article()}" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><span class="dot">• </span>Écrit par <a href="?page=profiles&utilisateur={$value->getPseudo_Visiteur()}">{$value->getPseudo_Visiteur()}</a></h5>
                        <h2>{$value->getTitre_Article()}</h2>
                        <p class="card-text">{$value->getContenu_Article()|truncate:100}</p>
                        <div class="row justify-content-center">
                            <a class="btn-lire" href="?page=articles&id={$value->getId_Article()}">LIRE L'ARTICLE</a>
                        </div>
                    </div>
                </div>
            </div>    
                    {/if}
                {/foreach}
            {else}
                <p>Pas d'articles pour le moment..</p>
            {/if}

        </div>
    </div>
</div>