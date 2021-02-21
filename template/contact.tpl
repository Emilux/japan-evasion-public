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
                <li class="breadcrumb-item"><a href="./">ACCUEIL</a></li>
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
                <form method="post" class="needs-validation" novalidate>
                    <div class="form-row">

                        <label>Prénom *</label>
                        <input type="text" class="form-control" id="prenom-form" name="prenom" required>
                        <div class="invalid-feedback">
                            Entrer un prénom
                        </div>
                        <label class="formu">Nom *</label>
                        <input type="text" class="form-control" id="nom-form" name="nom" required>
                        <div class="invalid-feedback">
                            Entrer un nom
                        </div>

                        <label class="formu">Email *</label>
                        <input type="email" class="form-control" id="mail-form" name="emailcntc" required>
                        <div class="invalid-feedback">
                            Entrer un e-mail valide
                        </div>

                        <label class="formu">Message *</label>
                        <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="4" name="msgcntc" required></textarea>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="invalidCheck2" name="cgu" required>
                            <label class="form-check-label" for="invalidCheck2">
                                    En soumettant ce formulaire, vous acceptez les conditions d'utilisation du site. 
                                    </label>
                        </div>
                        {if isset($error)}
                        <h6 class="errormail">{$error}</h6>
                        {else}
                        <br><h5>Les champs obligatoires sont indiqués avec *</h5><br>
                        {/if}
                    </div>
                    <div class="row justify-content-center">
                        <button class="btn btn-dark" type="submit" name="send_message">ENVOYER</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
