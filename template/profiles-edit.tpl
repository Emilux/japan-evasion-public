        </div>
    </div>
</header>

        <style>

            #background {

                height : 40vh !important;

            }

        </style>

<div class="container ">
    <div class="row  gutters justify-content-center ">
        <div class="col-8 profile">
            <div class="profile-images-card ">
                <div class="profile-images">
                    <img src="{$utilisateur.avatar_utilisateur}" id="upload-img" alt="" class="img-fluid">
                </div>
                <div class="custom-file">
                    <label for="fileupload"><i class="fas fa-cloud-upload-alt"></i></label>
                    <input type="file" id="fileupload">
                </div>
                <div class="profile-header-info">
                    <h4 class="m-auto">{$utilisateur.pseudo_utilisateur}</h4>
                    <a class="text-dark" href="#">{$utilisateur.email_utilisateur}</a>
                    <p class="m-auto"></p>
                </div>
            </div>

            <!-- NOMBRE FOLLOWERS, COMMENTAIRE, ARTICLE -->
            <div class="profile-images-card buttons py-3">
                <div class="row justify-content-center">
                    <ul class="text-center pl-3 pr-3">
                        <li>100</li>
                        <li>Followers</li>
                    </ul>

                    <ul class="text-center pl-3 pr-3">
                        <li>80</li>
                        <li>Commentaire</li>
                    </ul>

                    <ul class="text-center pl-3 pr-3">
                        <li>30</li>
                        <li>Article</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODIFICATION DE PROFILE -->
<div class="container">
    <div class="row gutters justify-content-center">
        <div class="col-8 profile-edit">
            <form method="post">
                <h3>Modifier mon profil</h3>
                <label for="pseudo">Pseudo</label> <br>
                <input type="text" name="pseudo_utilisateur" value="{$utilisateur.pseudo_utilisateur|capitalize}"> <br>
                <label for="nom">Nom</label> <br>
                <input type="text" name="nom_utilisateur" value="{$utilisateur.nom_utilisateur|capitalize}"> <br>
                <label for="prenom">Prenom</label> <br>
                <input type="text" name="prenom_utilisateur" value="{$utilisateur.prenom_utilisateur|capitalize}"> <br>
                <label for="email">Email</label> <br>
                <input type="email" id="email" name="email_utilisateur" value="{$utilisateur.email_utilisateur}"> <br>
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
    $(function(){
        $('#fileupload').change(function(event){
            var x = URL.createObjectURL(event.target.files[0]);
            $('#upload-img').attr('src', x);
            console.log(event);
        });
    })
</script>