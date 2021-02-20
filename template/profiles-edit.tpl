</div>
</div>
</header>

<style>
    #background {
        height: 40vh !important;
    }
</style>

<div class="container ">
    <div class="row  gutters justify-content-center ">
        <div class="col-8 profile">
            <div class="profile-images-card ">
                <div class="profile-images">
                    <img src="{$utilisateur->getAvatar_Utilisateur()}" id="upload-img" alt="" class="img-fluid">
                </div>
                <div class="custom-file">
                    <label for="fileupload"><i class="fas fa-cloud-upload-alt"></i></label>
                    <input type="file" id="fileupload">
                </div>
                <div class="profile-header-info">
                    <h4 class="m-auto">{$utilisateur->getPseudo_Visiteur()|upper}</h4>
                    <a class="text-dark" href="#">{$utilisateur->getEmail_Visiteur()}</a>
                    <p class="m-auto"></p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- MODIFICATION DE PROFILE -->
<div class="container">
    <div class="row gutters justify-content-center">
        <div class="col-8 profile-edit">
            <div class="formulaire col-12">
                <form method="post" class="needs-validation" novalidate>

                    <h3>Modifier mon profil</h3>
                    <div class="form-row">
                        <label>Prénom *</label>
                        <input type="text" class="form-control" id="prenom-form" name="prenom" required>
                        <div class="invalid-feedback">
                            Entrer un prénom
                        </div>

                        <label class="formu">Nom *</label>
                        <input type="text" class="form-control" id="nom-form" name="nom" required>
                        <div class="invalid-feedback">
                            Entrer un nom
                        </div>

                        <label class="formu">Email *</label>
                        <input type="email" class="form-control" id="mail-form" name="emailcntc" required>
                        <div class="invalid-feedback">
                            Entrer un e-mail valide
                        </div>

                        <label class="formu">Message *</label>
                        <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="4" name="msgcntc" required></textarea>
                    </div>

                    <div class="row justify-content-center">
                        <button class="btn btn-dark" type="submit" name="send_message">ENVOYER</button>
                    </div>
                </form>
            </div>
            <form method="post">
                <label for="pseudo">Pseudo</label> <br>
                <input type="text" name="pseudo_utilisateur" value="{$utilisateur->getPseudo_Visiteur()|capitalize}"> <br>
                <label for="nom">Nom</label> <br>
                <input type="text" name="nom_utilisateur" value="{if $utilisateur->getNom_Utilisateur()}{$utilisateur->getNom_Utilisateur()|capitalize}{/if}"> <br>
                <label for="prenom">Prenom</label> <br>
                <input type="text" name="prenom_utilisateur" value="{$utilisateur->getPrenom_Utilisateur()|capitalize}"> <br>
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email_utilisateur" value="{$utilisateur->getEmail_Visiteur()}"><br>
                <label for="psd">Mot de passe</label> <br>
                <input type="password" name="mdp_utilisateur" autocomplete="off"> <br>
                <label for="cpsd">Confirmer le mot de passe</label> <br>
                <input type="password" name="mdp_utilisateur"> <br>
                <label for="text">Votre description</label> <br>
                <textarea name="" cols="30" rows="5"></textarea> <br>
                <div class="row justify-content-center">
                    <button class="btn btn-dark submit_update" type="submit" name="submit_update">MODIFIER</button>
                </div>
            </form>
        </div>
    </div>
    <!-- FUNCTION JS POUR UPLOADER UN AVATAR -->
    <script>
        $(function() {
            $('#fileupload').change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $('#upload-img').attr('src', x);
                console.log(event);
            });
        })
    </script>