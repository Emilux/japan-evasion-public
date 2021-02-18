<!-- PARTIE COMMENTAIRE -->
    <div class="commentaire container" id="espace_commentaire">
        <div class="row justify-content-center">
            <div class="formulaire col-7">
                <h1 class="commentaire-compteur">
                    {$nombre_commentaire} Commentaires
                </h1>
                {foreach from=$commentaires item=commentaire key=i}
                    {$commentaire.aime_commentaire}
                <div class="com" id="commentaire_{$commentaire.commentaire}">
                    <img class="avatar_utilisateur" src="{if $commentaire.pseudo_visiteur === NULL} {$commentaire.avatar_utilisateur}
                    {else} https://eu.ui-avatars.com/api/?background=random&color=random&length=1&bold=true&name={$commentaire.pseudo_visiteur}
                    {/if}" alt="avatar">
                    <p><span class="pseudo">
                    {if $commentaire.pseudo_visiteur === NULL} {$commentaire.pseudo_utilisateur|capitalize}
                    {else} {$commentaire.pseudo_visiteur|capitalize}
                    {/if} 
                      </span>dit:</p>
                    <span class="date">{$commentaire.datetime_commentaire|date_format : "%e %B  %Y à %T"}</span>
                    {if $commentaire.reponse !== NULL}
                    <div class="reponse">
                        <span class="pseudo">{if $commentaires[array_search($commentaire.reponse,array_column($commentaires, 'commentaire'))].pseudo_visiteur === NULL} {$commentaires[array_search($commentaire.reponse,array_column($commentaires, 'commentaire'))].pseudo_utilisateur|capitalize}
                    {else} {$commentaires[array_search($commentaire.reponse,array_column($commentaires, 'commentaire'))].pseudo_visiteur|capitalize}
                    {/if} 
                        </span> {$commentaires[array_search($commentaire.reponse,array_column($commentaires, 'commentaire'))].datetime_commentaire}
                        <p class="reponse-mini">{$commentaires[array_search($commentaire.reponse,array_column($commentaires, 'commentaire'))].contenu_commentaire}</p>
                    </div>
                    {/if}
                    <div class="compteur_like"> <i class="fas fa-thumbs-up"></i></div>
                    
                    <p class="contenu_commentaire">{$commentaire.contenu_commentaire}</p>
                    
                </div>
                <div class="row justify-content-end">
                    <a href="#"><span class="btn-rep"><i class="fas fa-reply"></i>Répondre</span></a>
                </div>

                <div class="line"></div>
                {/foreach}

            <h2>Laisser un commentaire</h2>
            <h5>Votre adresse de messagerie ne sera pas publiée. Les champs obligatoires sont indiqués avec *</h5>
            <form method="post" class="needs-validation" novalidate>
                <div class="form-row">

                    <label class="formu">Message *</label>
                    <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="8" name="contenu_commentaire" required></textarea>
                    {if !connecte}
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