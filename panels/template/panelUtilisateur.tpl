
   <div class="container-fluid">

            <div class="card shadow mb-4">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Liste utilisateurs</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable-utilisateur" width="100%" cellspacing="0">
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
                                    {if $utilisateurs}
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
                                    {/if}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>



 
            
            <!-- End of Main Content -->