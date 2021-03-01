
    <div class="container-fluid">     
            <div class="card shadow mb-5 mt-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Gestionnaire d'article</h6>
            </div> 
            <div class="row gutters justify-content-center">
                <div class="col-8 profile-edit">
                    <div class="formulaire col-12">
                        <form method="post" class="form-edit" enctype="multipart/form-data">

                            <h3></h3>

                            <div class="form-row mt-5">
                                <label for="titre">Titre article</label>
                                <input type="text" class="form-control"  id="titre" name="titre_article">

                                <label for="fileupload">Photo de couverture</label>
                                <input type="file" id="fileupload" class="form-control" name="photo_article" > <br>

                                <label for="temps_lecture">Temps de lecture article</label>
                                <input type="number" id="temps_lecture" class="form-control" name="temps_lecture_article" max="60">

                                <label for="contenu_article">Contenu article</label> <br>
                                <textarea class="form-control" id="contenu_article" name="contenu_article" cols="30" rows="5"></textarea> <br>

                                <label for="tag_article">Tag article</label> <br>
                                <input type="text" class="form-control" id="tag_article" name="tag_article"> <br>
                            </div>

                            <div class="row">
                                <button class="btn btn-dark submit_update mt-3 mb-5" type="submit" name="submit_article">PUBLIER</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div> 
        </div>
    </div>

