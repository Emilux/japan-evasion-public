
                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="row">
                        {if $role_session === "moderateur" || $role_session === "administrateur"}
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                NOMBRE D'UTILISATEURS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{$nbUtilisateur}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {/if}


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                            NOMBRE D'ARTICLES
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{$nbArticle}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                            ARTICLE EN ATTENTE
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{$nbArticlePending} / {$nbArticle}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: {($nbArticlePending / $nbArticle) * 100}%" aria-valuenow="{($nbArticlePending / $nbArticle) * 100}" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                NOMBRE DE COMMENTAIRES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{$nbCommentaire}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    {if $role_session === "administrateur"}
                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Audience {$smarty.now|date_format:"%Y "}</h6>

                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area" id="compteGraphique">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Proportions rôles</h6>

                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2" id="proportionGraphique">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle " style="color : #787878;"></i> Visiteurs
                                        </span>
                                            <span class="mr-2">
                                            <i class="fas fa-circle " style="color : #1e1e1e;"></i> Membres
                                        </span>
                                            <span class="mr-2">
                                            <i class="fas fa-circle " style="color : #248899;"></i> Rédacteurs
                                        </span>
                                            <span class="mr-2">
                                            <i class="fas fa-circle" style="color : #03384C;"></i> Modérateurs
                                        </span>
                                            <span class="mr-2">
                                            <i class="fas fa-circle" style="color : #7A0A11;"></i> Administrateurs
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {/if}



                <!-- LISTE UTILISATEURS -->
                    {if $role_session === "moderateur" || $role_session === "administrateur"}
            <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste utilisateurs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Nom / Prénom</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Date création compte</th>
                                            <th>Rôle</th>
                                            <th>Newsletter</th>
                                            <th>Banni</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Avatar</th>
                                            <th>Nom / Prénom</th>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Age</th>
                                            <th>Date création compte</th>
                                            <th>Rôle</th>
                                            <th>Newsletter</th>
                                            <th>Banni</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    {foreach from=$utilisateurs item=utilisateurInfo}
                                    {assign var=estRole value=$role->getItem('id_role',$utilisateurInfo->getId_Role())}
                                        <tr data-row-user="{$utilisateurInfo->getId_Utilisateur()}">
                                            <td><div style="width : 64px; height : 64px;"><img style="width : 100%; height : 64px; object-fit : cover;" src="{if strpos($utilisateurInfo->getAvatar_Utilisateur(),'assets')}.{/if}{$utilisateurInfo->getAvatar_Utilisateur()}"/></div></td>
                                            <td>{$utilisateurInfo->getNom_Utilisateur()} {$utilisateurInfo->getPrenom_Utilisateur()}</td>
                                            <td>{$utilisateurInfo->getPseudo_Visiteur()} <sup><a href="../?page=profiles&utilisateur={$utilisateurInfo->getPseudo_Visiteur()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$utilisateurInfo->getEmail_Visiteur()|lower}</td>
                                            <td>{if $utilisateurInfo->getDate_Naissance_Utilisateur() !== null}{floor((time() - strtotime($utilisateurInfo->getDate_Naissance_Utilisateur())) / 31556926)}{/if}</td>
                                            <td>{$utilisateurInfo->getDate_Creation_Utilisateur()|date_format:"%d/%m/%Y à %R"}</td>
                                            <td class="role-user">{$estRole->getNom_Role()|capitalize}</td>
                                            <td>{if $utilisateurInfo->getNewsletter_Visiteur() === 0}Inscrit{else}Non inscrit{/if}</td>
                                            <td class="banni">{if $utilisateurInfo->getBanni_Utilisateur()}Banni{else}Non banni{/if}</td>
                                            <td>
                                            <div class="dropdown no-arrow">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <span class="btn-action btn-japan-dark btn btn-dark">Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i> </span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Action :</div>

                                                    {if $estRole->getNom_Role() !== "membre" }
                                                        {if (($role_session === "moderateur" && ($estRole->getNom_Role() === "redacteur" || $estRole->getNom_Role() === "membre")) || $role_session === "administrateur")}
                                                            <a data-utilisateur="{$utilisateurInfo->getId_Utilisateur()}" class="dropdown-item retrograder" href="#">Rétrograder</a>
                                                        {/if}
                                                    {/if}

                                                    {if $estRole->getNom_Role() !== "administrateur" }
                                                        {if (($role_session === "moderateur" && $estRole->getNom_Role() === "membre") || $role_session === "administrateur")}
                                                            <a data-utilisateur="{$utilisateurInfo->getId_Utilisateur()}" class="dropdown-item promouvoir" href="#">Promouvoir</a>
                                                        {/if}
                                                    {/if}

                                                    <a data-utilisateur="{$utilisateurInfo->getId_Utilisateur()}" class="dropdown-item bannir" href="#">{if $utilisateurInfo->getBanni_Utilisateur()}Débannir{else}Bannir{/if}</a>
                                                    {if $role_session === "administrateur"}<a data-utilisateur="{$utilisateurInfo->getId_Utilisateur()}" class="dropdown-item text-danger delete_user" href="#">Supprimer</a>{/if}
                                                </div>
                                            </div>


                                            </td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                {/if}
                <!-- LISTE COMMENTAIRES -->
                    {if $role_session === "moderateur" || $role_session === "administrateur"}
            <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste commentaires</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable-coms" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Commentaire</th>
                                            <th>Date</th>
                                            <th>Article</th>
                                            <th>Rôle</th>
                                            <th>Banni</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Pseudo</th>
                                            <th>Email</th>
                                            <th>Commentaire</th>
                                            <th>Date</th>
                                            <th>Article</th>
                                            <th>Rôle</th>
                                            <th>Banni</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    {foreach from=$commentaires item=commentaire}
                                    {assign var=estRole value=$role->getItem('id_role',$utilisateurInfo->getId_Role())}
                                    {assign var=articleTitre value=$titreArticle->getItem('id_article',$commentaire->getId_Article())}
                                        <tr>
                                            <td>{$commentaire->getPseudo_Visiteur()}</td>
                                            <td>{$utilisateurInfo->getEmail_Visiteur()|lower}</td>
                                            <td>{$commentaire->getContenu_Commentaire()} <sup><a href="../?page=articles&id={$commentaire->getId_Article()}#commentaire_{$commentaire->getId_Commentaire()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$commentaire->getDatetime_Commentaire()|date_format:"%d/%m/%Y à %R"}</td>
                                            <td>{$articleTitre->getTitre_Article()|truncate:20}</td>
                                            <td>{$estRole->getNom_Role()|capitalize}</td>
                                            <td>{if $utilisateurInfo->getBanni_Utilisateur() === 0}Banni{else}Non banni{/if}</td>
                                            <td style="text-align :center;">
                                                   <span class="btn-suppr btn btn-danger"><i class="fas fa-trash"></i></span>
                                            </div>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                {/if}

                <!-- LISTE ARTICLES -->

                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Liste articles</h6>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable-articles" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rédacteur</th>
                                            <th>Article</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rédacteur</th>
                                            <th>Article</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    {foreach from=$articles item=article}
                                        <tr>
                                            <td>{$article->getPseudo_Visiteur()}</td>
                                            <td>{$article->getTitre_Article()} <sup><a href="../?page=articles&id={$article->getId_Article()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$article->getDate_Publication_Article()|date_format:"%d/%m/%Y à %R"}</td>
                                            <td>{if $article->getStatut_Article() === 'PENDING'}
                                            <span data-article="{$article->getId_Article()}" class="text-warning"><i class="fas fa-exclamation-triangle"></i> PENDING</span>
                                            {else}<span data-article="{$article->getId_Article()}">{$article->getStatut_Article()|upper}</span>{/if}</td>
                                            <td style="text-align :center;">
                                                   <span class="btn-modif btn btn-primary"><i class="fas fa-pen"></i></span>
                                                   {if $article->getStatut_Article() === 'PENDING' && ($role_session === "moderateur" || $role_session === "administrateur")}<span data-article="{$article->getId_Article()}" class="validArticle btn-suppr btn btn-success"><i class="fas fa-check"></i></span>{/if}
                                                   <span class="btn-suppr btn btn-danger"><i class="fas fa-trash"></i></span>
                                            </div>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>





            <!-- End of Main Content -->