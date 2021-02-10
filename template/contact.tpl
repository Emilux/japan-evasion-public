 <!-- HEADER -->

    <header>

        <!-- BACKGROUND IMAGE -->

        <div id="background" class="small contact">

            <!-- NAVBAR -->

            <div class="container" id="index">
                <div class="row justify-content-center" id="navbar">
                    <nav class="navbar navbar-dark row navbar-expand-sm">

                        <!-- BTN BURGER NAV -->

                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <img class="img" id="logo-burger" src="assets/media/image-index/japan-evasion-logo.png" alt="logo">
                            </button>

                        <div class="navburger collapse navbar-collapse" id="navbarContent">

                            <!-- RECHERCHE MOBILE -->

                            <div id="recherche-mobile" class="row justify-content-center">
                                <input class="form-control" type="text" placeholder="Recherche sur le site..." aria-label="Search">
                            </div>

                            <!-- LISTE A PUCE NAV -->

                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" id="accueil" href="index.html">ACCUEIL</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            A PROPOS
                                          </a>
                                    <div class="dropdown-menu" id="dropdown-left">
                                        <a class="dropdown-item" href="quisommesnous.html">QUI SOMMES NOUS ?</a>
                                        <a class="dropdown-item" href="contact.html">CONTACT</a>

                                    </div>
                                </li>

                                <!-- LOGO-->

                                <li class="nav-item">
                                    <div class="logo">
                                        <img class="img" src="assets/media/image-index/japan-evasion-logo.png" alt="logo">
                                    </div>
                                </li>

                                <!-- DROPDOWN MENU -->

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          BLOG
                                        </a>
                                    <div class="dropdown-menu">
                                        <span class="last-article dropdown-item">NOS DERNIERS ARTICLES</span>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="article1.html">Magome : visiter la préfecture de Nakasendo</a>
                                        <a class="dropdown-item" href="article2.html">Voyage nature sur l’île de Kyushu au Japon</a>
                                        <a class="dropdown-item" href="article3.html">5 lieux à visiter à Okayama</a>
                                        <a class="dropdown-item" href="article4.html">Hors des sentiers battus dans la préfecture de Mie</a>
                                        <a class="dropdown-item" href="article5.html">Wakayama, un secret méconnu au Japon</a>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="sejours.html">SÉJOURS</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- TEXT HEADER BACK -->

                <div class="d-flex justify-content-center">
                    <div class="text-header-back">
                        <h1>CONTACT</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- SCROLLTOP BTN  -->

    <button id="topBtn">
            <i class="fas fa-chevron-up"></i>
    </button>

    <!-- TITRE MOBILE -->

    <div class="d-flex justify-content-center">
        <h5 class="titre-mobile">
            NOUS CONTACTER
        </h5>
    </div>

    <!-- BREACRUMB -->

    <div class="d-flex justify-content-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">ACCUEIL</a></li>
                <li class="breadcrumb-item active" aria-current="page">CONTACT</li>
            </ol>
        </nav>
    </div>

    <!-- FORMULAIRE CONTACT -->

    <div class="container">
        <div class="row justify-content-around">

            <div class="text-contact col-5">
                <h1>Amis lecteurs</h1>
                <p>Nous sommes toujours heureux de recevoir les messages de nos lecteurs. Vous êtes nombreux à nous écrire pour partager une anecdote ou nous poser des questions sur le Japon, et ce sera toujours avec grand plaisir de vous répondre.
                </p>
                <div class="part2">
                    <h1>Ecrivez-nous</h1>
                    <p>Vous voyagez au Japon, et vous êtes capable d'immortaliser vos histoires par l'écrit et l'image ? Alors vous pouvez nous proposer votre récit. Contactez-nous pour connaitre les conditions d'admission.
                    </p>
                </div>
            </div>

            <div class="formulaire col-5">
                <form class="needs-validation" novalidate>
                    <div class="form-row">

                        <label>Prénom *</label>
                        <input type="text" class="form-control" id="prenom-form" required>
                        <div class="invalid-feedback">
                            Entrer un prénom
                        </div>

                        <label class="formu">Nom *</label>
                        <input type="text" class="form-control" id="nom-form" required>
                        <div class="invalid-feedback">
                            Entrer un nom
                        </div>

                        <label class="formu">Email *</label>
                        <input type="email" class="form-control" id="mail-form" required>
                        <div class="invalid-feedback">
                            Entrer un e-mail valide
                        </div>

                        <label class="formu">Message *</label>
                        <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="4" required></textarea>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                    En soumettant ce formulaire, vous acceptez les conditions d'utilisation du site. 
                                    </label>
                        </div>
                        <h5>Les champs obligatoires sont indiqués avec *</h5>
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-dark" type="submit">ENVOYER</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
