        </div>
    </div>
</header>

        <style>

            #background {

                height : 40vh !important;

            }

        </style>

<!--Profile image followers like and follow buttons-->
<div class="container mt-5">
    <div class="row profile">
        <div class="profile-images-card">
            <div class="profile-images">
                <img src="assets/media/profile-image/avatar.jpg" id="upload-img" alt="" class="img-fluid">
            </div>
            <div class="custom-file">
                <label for="fileupload"><i class="fas fa-cloud-upload-alt"></i></label>
                <input type="file" id="fileupload">
            </div>
            <div class="profile-header-info">
                <h4 class="m-auto">Jaculin Fernandos</h4>
                <a class="text-dark" href="#">Jaculin-fernandos@gmail.com</a>
                <p class="m-auto">Frontend & Backend Developer</p>
            </div>
        </div>

        <!--Nombre followers , commentaire, article-->
        <div class="profile-images-card buttons py-3">
            <div class="row">
                <ul class="text-center">
                    <li>100</li>
                    <li>Followers</li>
                </ul>

                <ul class="text-center">
                    <li>80</li>
                    <li>Commentaire</li>
                </ul>

                <ul class="text-center">
                    <li>30</li>
                    <li>Article</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Edit profile -->
<div class="container">
    <div class="row gutters justify-content-center">
        <div class="col-6 profile-edit">
            <form action="">
                <h3>Edit Profile</h3>
                <label for="name">Nom</label> <br>
                <input type="text" name="name"> <br>
                <label for="prename">Prenom</label> <br>
                <input type="text" name="prenom"> <br>
                <label for="email">Email</label> <br>
                <input type="email" id="email"> <br>
                <label for="psd">Password</label> <br>
                <input type="password" name="psd"> <br>
                <label for="cpsd">Confirm Password</label> <br>
                <input type="password" name="cpsd"> <br>
                <label for="text">Add bio</label> <br>
                <textarea name="" cols="30" rows="10"></textarea> <br>
                <button class="btn btn-dark" type="submit" name="submit">Submit</button>
            </form>
        </div>
</div>
<!--js function for image upload-->
<script>
    $(function(){
        $('#fileupload').change(function(event){
            var x = URL.createObjectURL(event.target.files[0]);
            $('#upload-img').attr('src', x);
            console.log(event);
        });
    })
</script>