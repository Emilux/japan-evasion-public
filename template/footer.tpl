 <!-- POP UP CONNEXION/INSCRIPTION -->
 {if !isset($smarty.session.utilisateur)}
  <div class="popup modal rounded-0 fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content rounded-0">
                <div class="modal-body p-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <!-- FORMULAIRE DE CONNEXION -->
                        <div class="col p-5 log">
                            <h2>S'IDENTIFIER</h2>
                            <form method="post" id="connexion_form">
                                <div class="form-group">
                                     <label for="email_utilisateur">E-mail</label>
                                    <input class="form-control" id="email_utilisateur" type="text" name="email_utilisateur" placeholder="Votre e-mail ici..">
                                </div>

                                <div class="form-group">
                                    <label for="mdp_utilisateur">Mot de passe</label>
                                    <input class="form-control" id="mdp_utilisateur" type="password" name="mdp_utilisateur" placeholder="Votre mot de passe ici..">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="reste_connecte" name="reste_connecte">
                                        <label class="form-check-label pt-0" for="reste_connecte">Rester connecté</label>
                                    </div>
                                </div>

                                <input type="hidden" name="connexion">
                                <input id="connexion_form_submit" class="btn btn-dark" type="submit" name="connexion_form_submit" value="CONNEXION">
                                <div id="conError">
                                </div>
                            </form>
                        </div>

                        <!-- FORMULAIRE D'INSCRIPTION -->
                        <div class="col p-5 register">
                            <h2>S'ENREGISTRER</h2>
                            <form id="creer_compte_form" method="post">
                                <div class="form-group">
                                    <label for="email_utilisateurReg">E-mail</label>
                                    <input class="form-control" id="email_utilisateurReg" type="email" name="email_utilisateur" placeholder="Votre e-mail ici..">
                                </div>

                                <div class="form-group">
                                    <label for="pseudo_utilisateurReg">Pseudo</label>
                                    <input class="form-control" id="pseudo_utilisateurReg" type="text" name="pseudo_utilisateur" placeholder="Votre pseudo ici..">
                                </div>

                                <div class="form-group">
                                    <label for="mdp_utilisateurReg">Mot de passe</label>
                                    <input class="form-control" id="mdp_utilisateurReg" type="password" name="mdp_utilisateur" placeholder="Votre mot de passe ici..">
                                </div>

                                <div class="form-group">
                                    <label for="mdp_utilisateur_confirmationReg">Confirmer le mot de passe</label>
                                    <input class="form-control" id="mdp_utilisateur_confirmationReg" type="password" name="mdp_utilisateur_confirmation" placeholder="Votre mot de passe ici..">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="newsletter_utilisateurReg" name="newsletter_utilisateur">
                                        <label class="form-check-label pt-0" for="newsletter_utilisateurReg">Je souhaite m'inscrire à la newsletter quotidienne</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cgu" name="cgu">
                                        <label class="form-check-label pt-0" for="cgu">J'ai lu et accepte les conditions générales d'utilisation</label>
                                    </div>
                                </div>
                                <input type="hidden" name="creer_compte">
                                <input id="submit_creer_compte" class="btn btn-dark" type="submit" name="creer_compte" value="CRÉER UN COMPTE">
                            </form>
                            <div id="regError">
                            </div>
                            <p>{if isset($smarty.get.creer_compte)}
                                    {$smarty.get.creer_compte}
                            {/if}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 bg-white rounded-0">
                    <a class="mx-auto"href="#myModal2"  data-toggle="modal">Tu n'arrives pas à te connecter ? Mot de passe oublié ?</a>
                </div>
            </div>
        </div>
        <div class="modal" id="myModal2" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content" id="second-modal">
                    <div class="modal-header">
                    <h4 class="modal-title">REINITIALISATION DU MOT DE PASSE</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                    Veuillez renseigner l'adresse mail liée à votre compte pour recevoir un nouveau mot de passe.
                    </div>
                    <form method="post" class>
                        <div class="form-group px-5">
                            <label for="email_reini">Email</label>
                            <input class="form-control" id="email_reini" type="email" name="email_utilisateur" placeholder="Votre email...">
                        </div>
                        <div class="modal-footer">
                            <input id="submit_reinitialisation" class="btn btn-dark" type="submit" name="submit_reinitialisation" value="VALIDER">
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 {/if}


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
        {if !$connecte_header}
            <div class="container">
                <div class="row justify-content-center">
                    <div class="email">
                        <h1>Abonnez-vous à ce blog par e-mail</h1>
                        <h5>Recevez une notification par email à chaque publication d'un nouvel article</h5>
                        <div id="msg"></div>
                        <form method="post" id="form-subscribe" action="./?ajax=newsletter">
                            <div class="row justify-content-center" id="email-form">
                                <div class="col-9 py-2">
                                    <input type="text" class="form-control form-input" id="email" name="name" placeholder="Prenom...">
                                </div>
                                <div class="col-9 py-2">
                                    <input type="email" class="form-control form-input" id="email" name="email" placeholder="Adresse e-mail...">
                                </div>
                                <div class="col-9 py-2" id="abonne">
                                    <button type="submit" name="submitnewsletter" class="btn btn-danger" id="btn-subscriber">Je m'abonne !</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {/if}

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
                            <a href="./">
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
                                        <a href="?page=plan">PLAN DU SITE</a>
                                    </li>
                                    <li>
                                        <a href="?page=contact">CONTACT</a>
                                    </li>
                                    <li>
                                        <a href="?page=sejours">SÉJOURS</a>
                                    </li>
                                    <li>
                                        <a href="?page=mentions-legales">MENTIONS LÉGALES</a>
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
                let hashText = window.location.hash.substr();

                if (hashText){
                    let hashAttr = $(hashText)[0].attributes

                    if ($(hashText).length && hashAttr.role !== undefined){

                        if (hashAttr.role.value === 'dialog'){
                            $(hashText).modal(
                                'show'
                            );
                            $(hashText).on(
                                'hide.bs.modal', function () {
                                    window.location.hash = '';
                                }
                            );
                        }


                    }


                }
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
        <!-- NEWSLETTER AJAX -->
        <script src="assets/js/custom.js"></script>
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