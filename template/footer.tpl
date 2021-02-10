 <!-- POP UP CONNEXION/INSCRIPTION -->

  <div class="modal rounded-0 fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" style="background-color: rgba(255,255,255,0.9);">
                <div class="modal-body p-0">
                    <button type="button" class="close" style="position: absolute;right: 10px;top: 10px;z-index: 10;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col p-5" style="border-right: white solid 2px;">
                            <h2>S'identifier</h2>
                            <form action="">
                                <div class="form-group">
                                    <label for="usernameLog">Pseudo ou e-mail</label>
                                    <input class="form-control" id="usernameLog" type="text" name="usernameLog" placeholder="Votre pseudo ou e-mail ici..">
                                </div>

                                <div class="form-group">
                                    <label for="passwordLog">Mot de passe</label>
                                    <input class="form-control" id="passwordLog" type="password" name="passwordLog" placeholder="Votre mot de passe ici..">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="stillConnect" name="stillConnect">
                                        <label class="form-check-label" for="stillConnect">Resté connecté</label>
                                    </div>
                                </div>

                                <input class="btn btn-dark" type="submit" value="Connexion">
                            </form>
                        </div>
                        <div class="col p-5" style="border-left: white solid 2px;">
                            <h2>S'enregistrer</h2>
                            <form action="">
                                <div class="form-group">
                                    <label for="emailReg">E-mail</label>
                                    <input class="form-control" id="emailReg" type="email" name="emailReg" placeholder="Votre e-mail ici..">
                                </div>

                                <div class="form-group">
                                    <label for="usernameReg">Pseudo</label>
                                    <input class="form-control" id="usernameReg" type="text" name="usernameReg" placeholder="Votre pseudo ici..">
                                </div>

                                <div class="form-group">
                                    <label for="passwordReg">Mot de passe</label>
                                    <input class="form-control" id="passwordReg" type="password" name="passwordReg" placeholder="Votre mot de passe ici..">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                        <label class="form-check-label" for="newsletter">Je souhaite m'inscrire à la newsletter quotidienne</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cgu" name="cgu">
                                        <label class="form-check-label" for="cgu">j'ai lu et accepte les conditions générales d'utilisation</label>
                                    </div>
                                </div>

                                <input class="btn btn-dark" type="submit" value="Créer un compte">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 bg-white">
                    <a class="mx-auto" style="color: black!important;" href="#">Tu n'arrives pas à te connecter ? Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
    </div>
 
 
 <!-- FOOTER -->

    <footer>

        <!-- NOUS SUIVRE -->

        <div class="container nous-suivre">
            <div class="row justify-content-center">
                <h4 id="nous-suivre">NOUS SUIVRE</h4>
            </div>
            <div class="row justify-content-center">

                <div class="follow">
                    <a href="#"><i class="fab fa-twitter" id="twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook" id="fb"></i></a>
                    <a href="#"><i class="fab fa-instagram" id="instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in" id="linkedin"></i></a>
                </div>
            </div>
        </div>

        <!-- NEWSLETTER -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="email">
                    <h1>Abonnez-vous à ce blog par e-mail</h1>
                    <h5>Recevez une notification par email à chaque publication d'un nouvel article</h5>
                    <div class="row justify-content-center" id="email-form">
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" placeholder="Adresse e-mail...">
                        </div>
                        <div class="col-3" id="abonne">
                            <button type="submit" class="btn btn-danger">Je m'abonne !</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SLIDER ARTICLE -->

        <div class="slider-article">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="carou-titre">
                        À DÉCOUVRIR
                    </div>
                </div>
                <div class="slider">
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-KOBE.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">KOBE</a>
                    </div>
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-NAGOYA.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">NAGOYA</a>
                    </div>
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-HIMEJI.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">HIMEJI</a>
                    </div>
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-FUJI.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">FUJI</a>
                    </div>
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-KUMAMOTO.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">KUMAMOTO</a>
                    </div>
                    <div class="carousel">
                        <img class="card-img" src="assets/media/image-slider/PHOTO-AKITA.png" alt="Ville Caroussel">
                        <a class="carou-ville" href="#">AKITA</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BACKGROUND FOOTER -->

        <div id="background-footer">
            <div class="footer-bottom-back position-relative">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="titre-footer">
                            <h1>PARTAGEZ L'EXPERIENCE JAPAN EVASION</h1>
                            <h5>Plus de conseils et de retours d'expérience en nous retrouvant sur les réseaux sociaux</h5>

                            <!-- SOCIALS -->

                            <div class="socials">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TEXTE FOOTER -->

                <div class="container position-relative" id="text-footer">
                    <div class="row justify-content-center">
                        <div class="logo-footer">
                            <a href="index.html">
                                <img class="img " src="assets/media/image-index/japan-evasion-logo.png" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6" id="text-left">
                            <div class="justify-content-start">
                                &copy; 2020 - Japan <span id="dot">• </span> Evasion 
                            </div>
                        </div>
                        <div class="col-6" id="text-right">
                            <div class="justify-content-end">
                                <ul>
                                    <li>
                                        <a href="plan-du-site.html">PLAN DU SITE</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">CONTACT</a>
                                    </li>
                                    <li>
                                        <a href="sejours.html">SÉJOURS</a>
                                    </li>
                                    <li>
                                        <a href="mentions-legales.html">MENTIONS LÉGALES</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- SCROLLTOP JAVASCRIPT -->
        <script>
            $(document).ready(function() {

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 40) {
                        $('#topBtn').fadeIn();
                    } else {
                        $('#topBtn').fadeOut();
                    }
                });

                $("#topBtn").click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800)
                });
            });
        </script>

        <!-- SLIDER JAVASCRIPT -->
        <script src="assets/js/slick.js"></script>
        <script>
            $('.slider').slick({

                dots: false,
                infinite: true,
                speed: 1000,
                slidesToShow: 4,
                slidesToScroll: 1,
                draggable: true,
                autoplay: true,
                autoplaySpeed: 2000,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                touchThreshold: 1000,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }]
            });
        </script>
        </body>