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
        <div class="profile-images-card ">
            <div class="profile-images">
                <img src="assets/media/profile-image/pngtree-cartoon-european-and-american-character-avatar-design-png-image_4366075.jpg" id="upload-img" alt="">
            </div>
            <div class="custom-file">
                <label for="fileupload"><i class="fas fa-cloud-upload-alt"></i></label>
                <input type="file" id="fileupload">
            </div>
        </div>

        <!--Nombre followers , commentaire, article-->
        <div class="profile-images-card buttons  py-3">
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
            <!--button like & follow-->
            <div class="button mt-4 d-flex flex-row align-items-center py-3">
                <button class="btn btn-sm btn-outline-dark w-100">Follow</button>
            </div>
        </div>
    </div>
</div>

<!--Edit profile -->
<div class="container">
    <div class="row gutters">
        <div class="col-lg-4 profile-edit">
            <div class="profile-header-info">
                <h4 class="m-auto pt-2">Jaculin </h4>
                <h4 class="m-auto pt-2">Fernandos</h4>
                <h3 class="m-auto pt-2">Bio</h3>
                <p class="m-auto pt-2">Graphic Designer</p>
                <p>Teaching Quality designto grow your biz</p>
                <p>Single mama to a human + a dog in MO</p>
                <p>Author of Strong Girls, Brave Girl</p>
                <p>Free Design Workshop</p>
                <a href="#">www.paperondoats.com</a>
                <p>followed by 1200 people</p>
            </div>
        </div>
        <div class="col-1"></div>
        <div class="col-lg-7 carnet-voyage">
            <h3 class="m-auto pt-2">Carnet du Voyage</h3>
            <p class="m-auto pt-2">Nom du Voyage <strong>: Kanazawa</strong> </p>
            <p class="m-auto pt-2">Date du debut <strong>: 1/6/2021</strong> </p>
            <p class="m-auto pt-2">Date du Fin <strong>: 1/7/2021</strong> </p>
            <p class="m-auto pt-2">Prix Total <strong>: 2000 $</strong> </p>
            <p class="m-auto pt-2">Detail du Voyage :
                Kanazawa is an old city. It flourished in the late 16th century under great leadership of the Maeda family.
                Kanazawa is a small city, but you can discover all kinds of Japanese traditional culture, food, and arts in Kanazawa.
                As there are so many places to explore in the city,
                it might be difficult for you to choose where to go. For your information, here are top 7 places you must visit.
            </p>
            <button class="btn btn-dark my-3">Telechargez</button>
        </div>
    </div>
</div>

<!--Article-->
<div class="container">

    <div class="row article">
        <h3 class="col-12 my-3">Activity Recent</h3>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">commentaire</h5>
                    <p class="card-text">T'es vraiment très fort (à Krunker 😉)</p>
                    <a href="#" class="btn btn-dark">Voir Commentaire</a>
                </div>
            </div>
        </div>
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Article : Kanazawa</h5>
                    <p class="card-text mb-2">Kanazawa is an old city. It flourished in the late 16th century under great leadership of the Maeda family.
                        Kanazawa is a small city, but you can discover all kinds of Japanese traditional culture, food, and arts in Kanazawa.</p>
                    <div class="row justify-content-center">
                        <div class="card-body col-3"><img src="assets/media/profile-image/kanazawa1.jpg" class="img-fluid" alt=""></div>
                        <div class="card-body col-3"><img src="assets/media/profile-image/kanazawa1.jpg" class="img-fluid" alt=""></div>
                        <div class="card-body col-3"><img src="assets/media/profile-image/kanazawa1.jpg" class="img-fluid" alt=""></div>
                    </div>
                    <a href="#" class="btn btn-dark ">Voir Article</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Settings-->
<div class="container mb-5">
    <div class="row setting">
        <h3 class="col-12">Setting</h3>
        <div class="col-4">
            <a class="text-dark" href="?page=profiles-edit"><i class="fas fa-cog pr-3"></i>Edit profile</a>
        </div>
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