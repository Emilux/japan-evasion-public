</div>
</div>
</header>

<style>
    #background {
        height: 15vh !important;
    }
</style>


<div class="container mt-4 ">
    <div class="row  gutters justify-content-center ">
        <div class="col-8 profile">
            <div class="profile-images-card ">
                <div class="profile-images">
                    <img src="{$utilisateur->getAvatar_Utilisateur()}" id="upload-img" alt="" class="img-fluid">

                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="custom-file">
                </div>
                <div class="profile-header-info">
                    <h4 class="m-auto">{$utilisateur->getPseudo_Visiteur()|upper}</h4>
                    <i class="fas fa-envelope"></i><a class="text-dark" href="#">{$utilisateur->getEmail_Visiteur()}</a>
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
                <form method="post" class="form-edit" enctype="multipart/form-data">

                    <h3>MODIFIER MON PROFIL</h3>

                    <div class="form-row">
                        <label for="fileupload">Avatar</label>
                        <input type="file" id="fileupload" name="avatar_utilisateur">

                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo_visiteur" value="{$utilisateur->getPseudo_Visiteur()|capitalize}"> <br>

                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom_utilisateur" value="{if $utilisateur->getNom_Utilisateur()}{$utilisateur->getNom_Utilisateur()|capitalize}{/if}">

                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom_utilisateur" value="{$utilisateur->getPrenom_Utilisateur()|capitalize}">

                        <label class="formu">Email</label>
                        <input type="email" class="form-control" name="email_visiteur" value="{$utilisateur->getEmail_Visiteur()}">

                        <label class="formu">Date de naissance</label>
                        <input type="date" class="form-control" name="date_naissance_utilisateur" value="{$utilisateur->getDate_Naissance_Utilisateur()}">

                        <label for="text">Votre description</label> <br>
                        <textarea class="form-control" name="bio_utilisateur" cols="30" rows="5">{$utilisateur->getBio_Utilisateur()}</textarea> <br>
                    </div>



                    <div class="row justify-content-center">
                        <button class="btn btn-dark submit_update" type="submit" name="submit_update">MODIFIER</button>
                    </div>

                </form>

                <form method="post" class="form-edit">

                    <label class="formu">Ancien mot de passe</label>
                    <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off" placeholder="********">

                    <label class="formu">Nouveau mot de passe</label>
                    <input type="password" class="form-control" name="new_mdp_utilisateur" autocomplete="off">

                    <label class="formu">Confirmer le nouveau mot de passe</label>
                    <input type="password" class="form-control" name="confirmation_mdp_utilisateur" autocomplete="off">

                    <div class="row justify-content-center">
                        <button class="btn btn-dark submit_update" type="submit" name="submit_password">MODIFIER MOT DE PASSE</button>
                    </div>

                </form>

            </div>
        </div>
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