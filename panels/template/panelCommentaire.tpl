
                <!-- Begin Page Content -->
                <div class="container-fluid">


               
                <!-- LISTE COMMENTAIRES -->

            <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste commentaires</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable-page-coms" width="100%" cellspacing="0">
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
                                    {if $commentaires}
                                    {foreach from=$commentaires item=commentaire}
                                    {assign var=estRole value=$role->getItem('id_role',$commentaire->getId_Role())}
                                    {assign var=articleTitre value=$titreArticle->getItem('id_article',$commentaire->getId_Article())}
                                        <tr data-row-commentaire="{$commentaire->getId_Commentaire()}">
                                            <td>{$commentaire->getPseudo_Visiteur()}</td>
                                            <td>{$commentaire->getEmail_Visiteur()|lower}</td>
                                            <td>{$commentaire->getContenu_Commentaire()} <sup><a href="../?page=articles&id={$commentaire->getId_Article()}#commentaire_{$commentaire->getId_Commentaire()}"><i class="fas fa-sign-out-alt"></i></a></sup></td>
                                            <td>{$commentaire->getDatetime_Commentaire()|date_format:"%d/%m/%Y à %R"}</td>   
                                            <td>{$articleTitre->getTitre_Article()|truncate:20}</td>
                                            <td>{if $estRole}{$estRole->getNom_Role()|capitalize}{else}Visiteur{/if}</td>
                                            <td>{if $commentaire->getBanni_Utilisateur() === 0}Banni{else}Non banni{/if}</td>
                                            <td style="text-align :center;">
                                                   <span data-commentaire="{$commentaire->getId_Commentaire()}" class="supprCom btn-suppr btn btn-danger"><i class="fas fa-trash"></i></span>
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



 
            
            <!-- End of Main Content -->