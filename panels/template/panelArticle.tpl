
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

                                    
                                    {foreach from=$articles item=article}
                                    {assign var=signalement_article value=$signalement_articles->count('id_article', $article->getId_Article())}
                                        <tr>
                                            <td>{$article->getPseudo_Visiteur()}</td>
                                            <td>{$article->getTitre_Article()} <sup><a href="../?page=articles&id={$article->getId_Article()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$article->getDate_Publication_Article()|date_format:"%d/%m/%Y à %R"}</td>   
                                            <td>{if $article->getStatut_Article() === 'PENDING'}


                                            <span class="text-warning"><i class="fas fa-exclamation-triangle"></i> PENDING</span>
                                            
                                            
                                            {else}<span>PUBLISHED</span>{/if}</td>
                                            <td>{$signalement_article}</td>
                                            
                                            <td style="text-align :center;">
                                                   <span class="btn-modif btn btn-primary"><i class="fas fa-pen"></i></span>
                                                   {if $article->getStatut_Article() === 'PENDING'}<span class="btn-suppr btn btn-success"><i class="fas fa-check"></i></span>{/if}
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