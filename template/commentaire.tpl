<!-- PARTIE COMMENTAIRE -->

    <div class="commentaire container">

        <div class="row justify-content-center">
            <div class="formulaire col-7">
                <h1 class="commentaire-compteur">
                    {$nombre_commentaire} Commentaires
                </h1>
                {foreach from=$commentaires item=commentaire key=i}
                <div class="com">
                    <img class="avatar_utilisateur" src="{if $commentaire.pseudo_visiteur === NULL} {$commentaire.avatar_utilisateur}
                    {else} https://eu.ui-avatars.com/api/?background=random&color=random&length=1&bold=true&name={$commentaire.pseudo_visiteur}
                    {/if}" alt="avatar">
                    <p><span class="pseudo">
                    {if $commentaire.pseudo_visiteur === NULL} {$commentaire.pseudo_utilisateur|capitalize}
                    {else} {$commentaire.pseudo_visiteur|capitalize}
                    {/if} 
                      </span>dit:</p>
                    <span class="date">{$commentaire.datetime_commentaire|date_format : "%e %B  %Y à %T"}</span>
                    {if $commentaire.id_reponse !== NULL} 
                    <div class="reponse">
                        <span class="pseudo">{if $commentaires[$commentaire.id_reponse-1].pseudo_visiteur === NULL} {$commentaires[$commentaire.id_reponse-1].pseudo_utilisateur|capitalize}
                    {else} {$commentaires[$commentaire.id_reponse-1].pseudo_visiteur|capitalize}
                    {/if} 
                        </span> 01/12/2020 03:33
                        <p class="reponse-mini">{$commentaires[$commentaire.id_reponse-1].contenu_commentaire}</p>
                    </div>
                    {var_dump($commentaires['id_reponse'])};
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
            <form class="needs-validation" novalidate>
                <div class="form-row">

                    <label class="formu">Message *</label>
                    <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="8" required></textarea>

                    <label class="formu">Nom *</label>
                    <input type="text" class="form-control" id="nom-form" required>
                    <div class="invalid-feedback">
                        Entrer un nom
                    </div>

                    <label class="formu">Email *</label>
                    <input type="email" class="form-control" id="mail-form" required>
                    <div class="invalid-feedback">
                        Entrer un e-mail valide
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                        Enregistrer mon nom, mon e-mail et mon site web dans le navigateur pour mon prochain commentaire.
                        </label>
                    </div>

                    <button class="btn btn-dark" type="submit">ENVOYER</button>
                </div>
            </form>
        </div>
    </div>