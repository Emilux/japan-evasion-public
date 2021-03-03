
                <!-- Begin Page Content -->
    <div class="container-fluid">

                    

                    <!-- Content Row -->

                <!-- LISTE UTILISATEURS -->


                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste articles</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable-page-articles" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rédacteur</th>
                                            <th>Article</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Signalement</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Rédacteur</th>
                                            <th>Article</th>
                                            <th>Date</th>
                                            <th>Statut</th>
                                            <th>Signalement</th>
                                            <th style="text-align :center;">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    {if $articles}
                                    {foreach from=$articles item=article}
                                    {assign var=signalement_article value=$signalement_articles->count('id_article', $article->getId_Article())}
                                        <tr data-row-article="{$article->getId_Article()}">
                                            <td>{$article->getPseudo_Visiteur()}</td>
                                            <td>{$article->getTitre_Article()} <sup><a href="../?page=articles&id={$article->getId_Article()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$article->getDate_Publication_Article()|date_format:"%d/%m/%Y à %R"}</td>
                                            <td class="statut_article">{if $article->getStatut_Article() === 'PENDING'}
                                                    <span class="text-warning"><i class="fas fa-exclamation-triangle"></i> PENDING</span>
                                                {else}<span>{$article->getStatut_Article()|upper}</span>{/if}</td>
                                            <td>{$signalement_article}</td>

                                            <td style="text-align :center;">
                                                {if ($role_session === "moderateur" || $role_session === "administrateur")}
                                                    {if $article->getStatut_Article() === 'PENDING'}<span data-article="{$article->getId_Article()}" class="validArticle btn-suppr btn btn-success"><i class="fas fa-check"></i></span>
                                                    {else}
                                                        <span data-article="{$article->getId_Article()}" class="validArticle btn-suppr btn btn-danger"><i class="fas fa-times"></i></span>
                                                    {/if}
                                                {/if}
                                                   <span class="btn-suppr btn btn-danger"><i class="fas fa-trash"></i></span>
                                            </div>
                                            </td>
                                        </tr>
                                    {/foreach}
                                    {/if}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>       
    </div>



 
            
            <!-- End of Main Content -->