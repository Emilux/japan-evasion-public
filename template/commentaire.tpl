<!-- PARTIE COMMENTAIRE -->
    <div class="commentaire container" id="espace_commentaire">
        <div class="row justify-content-center">
            <div class="formulaire col-7">
                <h1 class="commentaire-compteur">
                    {$nombre_commentaire} Commentaires
                </h1>
                {if $commentaires} {foreach from=$commentaires item=commentaire key=i}


                {assign var=nom_role value=$role->getItem('id_role',$commentaire->getId_Role())}


                <div class="com" id="commentaire_{$commentaire->getId_Commentaire()}">
                    <img class="avatar_utilisateur" src="{if $commentaire->getId_Utilisateur() !== NULL} {$commentaire->getAvatar_Utilisateur()}
                    {else} https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128true&name={$commentaire->getPseudo_Visiteur()}
                    {/if}" alt="avatar">
                    <span class="pseudo">
                    <a class="{if $nom_role}{$nom_role->getNom_role()}{/if}" href="?page=profiles&utilisateur={$commentaire->getPseudo_Visiteur()}">
                    {$commentaire->getPseudo_Visiteur()|capitalize}
                    {if $commentaire->getId_Utilisateur() !== NULL}
                    {if $nom_role->getNom_role() === 'redacteur'}
                    <i class="fas fa-feather-alt" style="color: #248899 !important;"></i>
                    {/if}
                    {if $nom_role->getNom_role() === 'administrateur'}
                    <img src="./assets/media/avatar/shield.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">
                    {/if}
                    {if $nom_role->getNom_role() === 'moderateur'}
                    <img src="./assets/media/avatar/shield2.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">
                    {/if}
                    {/if}
                    
                    </a></span>dit:<br>
                    <span class="date">{$commentaire->getDatetime_Commentaire()|date_format : "%e %B  %Y à %T"}</span>

                    {assign var=reponse_de value=$reponse->getItem('id_commentaire',$commentaire->getId_commentaire())}

                    {if $reponse_de}
                        {assign var=commentaire_reponse value=$commentaire->getItem('id_commentaire',$reponse_de->getId_Reponse())}
                    <div class="reponse">
                        <span class="pseudo">{$commentaire_reponse->getPseudo_Visiteur()|capitalize}
                        </span> {$commentaire_reponse->getDatetime_Commentaire()|date_format : "%e %B  %Y à %T"}
                        <p class="reponse-mini">{$commentaire_reponse->getContenu_Commentaire()}</p>
                    </div>
                    {/if}

                    {assign var=nb_aime_commentaire value=$aime_commentaire->count('id_commentaire',$commentaire->getId_Commentaire())}
                    {if isset($smarty.session.utilisateur)}
                    {assign var=is_aime_commentaire value=$aime_commentaire->getItem(null, null, '*', 'id_commentaire = '|cat:$commentaire->getId_commentaire()|cat:' AND id_utilisateur = '|cat:$smarty.session.utilisateur.id_utilisateur)}
                    {/if}
                    <div class="row justify-content-end compteur_like" data-like="{$commentaire->getId_Commentaire()}">    
                        <span class="number_like">
                            {if $nb_aime_commentaire}
                            {$nb_aime_commentaire}
                            {/if}
                        </span>
                        <i class="fas fa-heart" style="{if !isset($is_aime_commentaire) || !$is_aime_commentaire}color : #8c8c8c;{/if}"></i>
                            
                            
                    </div>
                    
                    
                    <p class="contenu_commentaire">{$commentaire->getContenu_Commentaire()}</p>
                    
                </div>

                
                <div class="row justify-content-end">
                {if $connecte}
                    <a href="#"><span class="btn-signaler"><i class="fas fa-flag"></i>Signaler</span></a>
                    <!-- SUPPRESSION DU COMMENTAIRE -->
                    {if $commentaire->getId_Utilisateur() === $sessionUtilisateur.id_utilisateur || ($sessionUtilisateur.role === "administrateur" || $sessionUtilisateur.role === "moderateur")}
                    <a href="?page=articles&id={$article->getId_Article()}&id_commentaire={$commentaire->getId_Commentaire()}"><span class="btn-suppr"><i class="fas fa-trash"></i>Supprimer</span></a>
                    {/if}
                {/if}

                    <!-- REPONDRE A UN COMMENTAIRE -->
                    <a href="#" data-cible="{$commentaire->getId_Commentaire()}" class="reponse-commentaire"><span class="btn-rep"><i class="fas fa-reply"></i>Répondre</span></a>
                </div>

                
                <form style="display: none" method="post" id="form-reponse" class="needs-validation" novalidate id="repondre" data-commentaire="{$commentaire->getId_Commentaire()}">

                        <div class="form-row">
                        <label class="formu">Message *</label>
                        <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="8" name="contenu_commentaire" required></textarea>
                        
                        <input type="hidden" name="id_commentaire" value="{$commentaire->getId_Commentaire()}">
                        
                        {if !$connecte}
                        <label class="formu">Pseudo *</label>
                        <input type="text" class="form-control" name="pseudo_visiteur" id="nom-form" required>
                        <div class="invalid-feedback">
                            Entrer un pseudo
                        </div>

                        <label class="formu">Email *</label>
                        <input type="email" class="form-control" name="email_visiteur" id="mail-form" required>
                        <div class="invalid-feedback">
                            Entrer un e-mail valide
                        </div>

                        {/if}
                            <button class="btn btn-dark" type="submit" name="submit_reponse">REPONDRE</button>
                        </div>

                </form>
                

                <div class="line"></div>
                {/foreach}
                {/if}


            <h2>Laisser un commentaire</h2>
            <h5>Votre adresse de messagerie ne sera pas publiée. Les champs obligatoires sont indiqués avec *</h5>
            {if isset($erreurs)}
                {foreach from=$erreurs item=erreur}
                    <p>{$erreur}</p>
                {/foreach}
            {/if}
            <form method="post" action="#repondre" class="needs-validation" novalidate id="repondre">
                <div class="form-row">

                    <label class="formu">Message *</label>
                    <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="8" name="contenu_commentaire" required></textarea>

                    {if !$connecte}
                    <label class="formu">Pseudo *</label>
                    <input type="text" class="form-control" name="pseudo_visiteur" id="nom-form" required>
                    <div class="invalid-feedback">
                        Entrer un pseudo
                    </div>

                    <label class="formu">Email *</label>
                    <input type="email" class="form-control" name="email_visiteur" id="mail-form" required>
                    <div class="invalid-feedback">
                        Entrer un e-mail valide
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                        Enregistrer mon nom, mon e-mail et mon site web dans le navigateur pour mon prochain commentaire.
                        </label>
                    </div>
                    {/if}

                    <button class="btn btn-dark" type="submit" name="submit_add">ENVOYER</button>
                </div>
            </form>

        </div>
    </div>
</div>





{if $connecte}
<!-- SCRIPT COMMENTAIRE LIKE -->

<script>

$(function(){


        
    




    //COMPTEUR LIKE
    $('.compteur_like').on('click', function(e){
        e.preventDefault();
        $button = $(this);

        $.post('./?ajax=aime_commentaire',
        
        {
            id_commentaire:$(this).data('like')
        }
        
        ,function(data){
            console.log(data);

            data = JSON.parse(data);

            console.log(data);

            if(data['msg'] === 'success'){
                $button.children('.number_like').text(data['number_like']);
                $button.children('.fa-heart').css('color','#91060e');
            }

            if(data['msg'] === 'exist'){
                $button.children('.number_like').text(data['number_like']);
                $button.children('.fa-heart').css('color','#8c8c8c');
            }

        })
    })


})




</script>
{/if}