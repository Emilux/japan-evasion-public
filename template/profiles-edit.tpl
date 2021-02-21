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
                    <img src="{$utilisateur.avatar_utilisateur}" id="upload-img" alt="" class="img-fluid">
                </div>
                <div class="custom-file">
                    <label for="fileupload"><i class="fas fa-cloud"></i></label>
                    <input type="file" id="fileupload">
                </div>
                <div class="profile-header-info">
                    <h4 class="m-auto">{$utilisateur.pseudo_utilisateur}</h4>
                    <i class="fas fa-envelope"></i><a class="text-dark" href="#">{$utilisateur.email_utilisateur}</a>
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
                        <input type="text" class="form-control" name="pseudo_utilisateur" value="{$utilisateur.pseudo_utilisateur|capitalize}"> <br>

                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="nom_utilisateur" value="{$utilisateur.nom_utilisateur|capitalize}">

                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="prenom_utilisateur" value="{$utilisateur.prenom_utilisateur|capitalize}">

                        <label class="formu">Email</label>
                        <input type="email" class="form-control" name="email_utilisateur" value="{$utilisateur.email_utilisateur}">

                        <label class="formu">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off">

                        <label class="formu">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off">

                        <label for="text">Votre description</label> <br>
                        <textarea name="bio_utilisateur" cols="30" rows="5"></textarea> <br>
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