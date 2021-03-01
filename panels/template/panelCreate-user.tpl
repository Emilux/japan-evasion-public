
    <div class="container-fluid">
        <div class="card shadow mb-5 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gestionnaire utilisateur</h6>
            </div>     
            <div class="row gutters justify-content-center">
                <div class="col-6 profile-edit mt-3">
                    <div class="formulaire col-12">
                        <form method="post" class="form-edit" enctype="multipart/form-data">


                        <div class="form-row mt-5">
                            <label for="fileupload">Avatar</label>
                            <input type="file" id="fileupload"  class="form-control" name="avatar_utilisateur">

                            <label for="pseudo">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo_visiteur"> <br>

                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom_utilisateur">

                            <label for="prenom">Prenom</label>
                            <input type="text" class="form-control" name="prenom_utilisateur">

                            <label class="formu">Email</label>
                            <input type="email" class="form-control" name="email_visiteur">

                            <label class="formu">Date de naissance</label>
                            <input type="date" class="form-control" name="date_naissance_utilisateur">

                            <label class="formu">Mot de passe</label>
                        <input type="password" class="form-control" name="mdp_utilisateur" autocomplete="off">
                        </div>



                        <div class="row mt-3 mb-5">
                            <button class="btn btn-dark submit_update" type="submit" name="submit_utilisateur">AJOUTER</button>
                        </div>

                    </form>

                    </div>
                </div>
            </div> 
        </div>
    </div>

