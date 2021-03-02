<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="nofollow, noindex">
    <meta name="description" content="Préparez votre prochain voyage avec Japan Evasion, votre blog de road-trip à destination du Japon.
    Suivez les voyages de Sadaf, Emilien et Jordan à travers leurs expériences et découvrez les destinations les plus
    enchanteresses et insolites que la contrée nipponne a à vous offrir." />

    <title>Japan EVASION - Blog Voyage autour du Japon</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/media/image-index/jp-icon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/japanevasion.css" />
    <!-- JQUERY BOOTSTRAPS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- GOOGLEFONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;800;900&display=swap" rel="stylesheet">
    <!-- FONTAWESOME -->
    <link rel="shortcut icon" href="#" />
    <script src="https://kit.fontawesome.com/1e74e4ad88.js" crossorigin="anonymous"></script>
    <!-- SLIDER -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="SHORTCUT ICON" href="favicon.ico" />
</head>

<body>
    <!-- HEADER -->

    <header>

        <!-- BACKGROUND IMAGE -->

        <div id="background" class="{$page}{if $page !== 'index'} small{/if}" {if isset($background)} style="background-image:url('{$background}')" {/if}>

            <!-- NAVBAR -->

            <div class="container" id="index">
                <div class="row justify-content-center" id="navbar">
                    <nav class="navbar navbar-dark row navbar-expand-sm">

                        <!-- BTN BURGER NAV -->

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <img class="img" id="logo-burger" src="assets/media/image-index/japan-evasion-logo.png" alt="logo">
                        </button>

                        <div class="navburger collapse navbar-collapse" id="navbarContent">

                            <!-- RECHERCHE MOBILE -->



                            <!-- LISTE A PUCE NAV -->

                        <ul class="navbar-nav align-items-center">


                                <!-- DROPDOWN MENU -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ARTICLES
                                </a>
                               <div class="dropdown-menu">
                                    <span class="last-article dropdown-item">NOS DERNIERS ARTICLES</span>
                                    <div class="dropdown-divider"></div>
                                   {if $article_header}
                                    {foreach from=$article_header item=article_value}
                                        <a class="dropdown-item" href="./?page=articles&id={$article_value->getId_Article()}">{$article_value->getTitre_Article()|upper}</a>
                                    {/foreach}
                                   {else}
                                       <p>Pas d'articles pour le moment..</p>
                                   {/if}
                                    <a class="dropdown-item" href="./#article">Voir plus d'articles</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="?page=sejours">SEJOURS</a>
                            </li>

                            <!-- LOGO-->
                                <li class="nav-item">
                                    <div class="logo">
                                        <a href="./">
                                            <img class="img" src="assets/media/image-index/japan-evasion-logo.png" alt="logo">
                                        </a>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    A PROPOS
                                </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="?page=quisommesnous">QUI SOMMES NOUS ?</a>
                                        <a class="dropdown-item" href="?page=contact">CONTACT</a>

                                    </div>
                                </li>


                                <!-- CONNEXION USER -->
                                {if !$connecte_header}
                                <li class="nav-item" id="user">
                                    <a class="nav-link" href="#exampleModal" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user" id="user_icon"></i>CONNEXION</a>
                                </li>

                                <!-- DROPDOWN USER/DECONNEXION -->
                                {else}
                                <li class="nav-item dropdown" >
                                    <a class="nav-link dropdown-toggle" id="avatar_utilisateur" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{$utilisateur_header->getAvatar_Utilisateur()}" width="32" alt="">
                                    </a>
                                    <div class="dropdown-menu deconnexion-user"  id="avatar_utilisateur_dropdown">
                                        <span class="dropdown-pseudo" style="cursor: default;">{$utilisateur_header->getPseudo_Visiteur()|upper}</span>
                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link dropdown-pseudo" href="?page=profiles&utilisateur={$utilisateur_header->getPseudo_Visiteur()}">MON PROFIL</a>
                                        <a class="nav-link dropdown-pseudo" href="?page=profiles-edit">PARAMETRES</a>
                                        {if $sessionUtilisateur.role !== "membre"}
                                            <a class="nav-link dropdown-pseudo" href="./panels">PANEL {$sessionUtilisateur.role|upper}</a>
                                        {/if}

                                        <div class="dropdown-divider"></div>
                                        <a class="nav-link dropdown-pseudo" href="?page=deconnexion"></i>DECONNEXION</a>
                                    </div>
                                </li>
                                <!-- Nav Item - Alerts -->
                                <li class="nav-item dropdown no-arrow ml-3">
                                    <a class="nav-link " href="#" id="alertsDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-bell fa-fw"></i>
                                        <!-- Counter - Alerts -->
                                        {if isset(nbNotif_header) && $nbNotif_header}
                                            <span id="nb-notif" class="badge badge-dark badge-counter">{$nbNotif_header}</span>
                                        {/if}
                                    </a>
                                    <!-- Dropdown - Alerts -->
                                    <div class="dropdown-list dropdown-menu  shadow animated--grow-in"
                                         aria-labelledby="alertsDropdown">
                                        <h6 class="dropdown-header">
                                            Mes notifications
                                        </h6>
                                        {if isset($notifications_header)}
                                        {foreach from=$notifications_header item=notification_header}
                                            <hr>
                                        <div class="dropdown-item d-flex align-items-center">
                                            <div>
                                                <span class="">{$notification_header->getContenu_notification()}</span>
                                            </div>
                                        </div>
                                            <hr>
                                        {/foreach}
                                        {else}
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div>
                                                <span class="">Pas de notifications. :(</span>
                                            </div>
                                        </a>
                                        {/if}
                                    </div>
                                </li>
                                <!-- END OF ALERT NOTIF -->

                                {/if}
                                



                            </ul>
                        </div>
                    </nav>
                </div>

                <!-- SCROLLTOP BTN  -->

                <button id="topBtn">
    <i class="fas fa-chevron-up"></i>
</button>