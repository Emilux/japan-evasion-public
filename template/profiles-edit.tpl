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
                </div>
                <div class="custom-file">
                    <label for="fileupload"><i class="fas fa-cloud"></i></label>
                    <input type="file" id="fileupload">
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
                <form method="post" class="form-edit">

                    <h3>MODIFIER MON PROFIL</h3>

                    <div class="form-row">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo_visiteur" value="{$utilisateur->getPseudo_Visiteur()|capitalize}"> <br>

                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom_utilisateur" value="{if $utilisateur->getNom_Utilisateur()}{$utilisateur->getNom_Utilisateur()|capitalize}{/if}">

                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom_utilisateur" value="{$utilisateur->getPrenom_Utilisateur()|capitalize}">

                        <label class="formu">Email</label>
                        <input type="email" class="form-control" name="email_visiteur" value="{$utilisateur->getEmail_Visiteur()}">

                        <label class="formu">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off">

                        <label class="formu">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off">

                        <label class="formu">Date de naissance</label>
                        <input type="date" class="form-control" name="date_naissance_utilisateur" >

                        <label for="text">Votre description</label> <br>
                        <textarea class="form-control" name="bio_utilisateur" cols="30" rows="5"></textarea> <br>
                    </div>

                    <div class="row justify-content-center">
                        <button class="btn btn-dark submit_update" type="submit" name="submit_update">MODIFIER</button>
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