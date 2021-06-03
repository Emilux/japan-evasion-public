# Japan Evasion

## Bienvenue sur le github de Japan Evasion.

**Japan Evasion** est un blog qui partage des articles sur le Japon en général.
Tout utilisateur ayant effectué un voyage grâce à Japan Évasion sera éligible à devenir rédacteur et ainsi partager son expérience au Japon dans un article qu'il aura écrit.

Afin de créer une communauté autour du Japon, le site permet à n'importe quel visiteur de s'inscrire et avoir la possibilité de liker les articles comme les commentaires, modifier ou supprimer ses commentaires et posséder un profil sur lequel il pourra voir les articles et les commentaires qu'il a posté. Les autres utilisateurs ont aussi la possibilité de le suivre.

## Liens utiles :

### Le site en ligne :
**https://jordanherth.devcolmar.xyz/ProjetPHP**

## Configuration de l'environnement de travail :
Afin que le projet se lance correctement dans votre environnement de travail
il faudra ajouter un fichier **config_bdd** dans le dossier **config**
Dans ce fichier sera stocké les identifiants de connexion à votre BDD.

Avec les mêmes noms de variables qui suivent :
```php
//information de la connexion à la bdd
$bdd = 'nom_base_de_données';
$server = 'hôte_base_de_données';
$user = 'utilisateur_base_de_données';
$password = 'mot_de_passe_base_de_données';
```

## Les fonctionnalités développées et implémentées :

### Espace commentaire

L'utilisateur peut **ajouter un commentaire** sous tous les articles. En étant connecté
il a juste à entrer son message et envoyer, mais sans être connecté il devra
renseigner un pseudo et une e-mail.
Ils ont aussi la possibilité de **répondre à un commentaire**.

Un membre du site peut **aimer les commentaires** ou **supprimer son propre commentaire**.

Dans l'espace commentaire seulement **5 commentaires sont affichés** pour en voir plus 
il faut cliquer sur le bouton "**voir plus de commentaire**" qui permet d'en' charger 5 nouveaux.

***les fichiers gérants l'espace commentaire :***

*Templates :*

[template/commentaire.tpl](template/commentaire.tpl)

Template affichant l'espace commentaire, chargement des j'aimes.

*Controllers :*

[controllers/ArticlesController](controllers/ArticlesController.php#L62-L160) 

Interaction avec l'espace commentaire, chargement de la liste des commentaires, des réponses, fonctionnalité d'envoi
de commentaires, de réponses et suppression de commentaires

[controllers/ajax/Aime_commentaireAjax.php](controllers/ajax/Aime_commentaireAjax.php)

Ajouter un j'aime sur un commentaire (appelé depuis une requête AJAX)

[controllers/ajax/AfficherPlusAjax.php](/controllers/ajax/AfficherPlusAjax.php#L43-L127)

Liste de plus de commentaires

*Models :*

[models/Commentaire.php](models/Commentaire.php)

CRUD de la table commentaires

[models/Aime_Commentaire.php](models/Aime_Commentaire.php)

CRUD de la table Aime_Commentaire

[models/Reponse_de.php](models/Reponse_de.php)

CRUD de la table Reponse_de

*JS :*

[assets/js/commentaire.js](assets/js/commentaire.js)

Ajax de l'ajout d'un like, affichage formulaire de réponse et Ajax afficher plus
de commentaires.








### Partie article

Les articles sont **listés sur la page d'accueil** du site, on peut voir leurs photo de
couverture, l'auteur de l'article, Le titre, les 100 premiers caractères du contenu, et un 
bouton "voir l'article" qui redirige vers la page de l'article.

Seulement **6 articles sont affichés sur la page d'accueil** pour en afficher 6 de plus
il faut cliquer sur le bouton "**voir plus d'articles**".

Il y a **3 types d'articles**, les "**NEW**", "**PUBLISHED**" et "**PENDING**", seuls les "NEW" et
"PUBLISHED" sont visibles par les utilisateurs du site, les "PENDING" sont en attentes
de validation et donc ne sont accessibles que par les modérateurs et administrateurs.

Les articles "NEW" peuvent être vu seulement par les utilisateurs étant connectés, tandis
que les articles "PUBLISHED" sont visibles par tout les mondes.

On accède à la page d'un article en cliquant sur le **bouton "voir l'article"** de celui-ci
ou grace à son id : *?page=article&id=id_article*.

Sur la **page de l'article** est affiché, tout d'abord dans l'entête la photo de couverture
et le titre. Dans le corps on peut voir l'auteur de l'article, le temps de lecture,
le contenu et l'espace commentaire.

### Roles

Sur japan evasion il y a 5 types de rôle : 

**Le visiteur**, qui n'est pas un role à proprement parler mais qui est juste un utilisateur n'étant
pas connecté et qui peut :
- Ecrire un commentaire
- Voir les articles "PUBLISHED"
- Peut voir les profils des utilisateurs inscrits

**Le membre**, qui peut : 
- Faire les mêmes actions que le visiteur
- Aimer un commentaire
- Supprimer son commentaire
- Voir les articles "PUBLISHED" et "NEW"
- Modifier ses informations personnelles et profils
- Suivre d'autres utilisateurs inscrits

**Le rédacteur** :

- Faire les mêmes actions que le membre
- Accéder au panel rédacteur
- Etre différencié des autres grace à son pseudo qui sera affiché dans une couleur
différente et le petit icône à côté de celui-ci.

**Le modérateur** :

- Faire les mêmes actions que le rédacteur
- Accéder au panel modérateur
- Supprimer les commentaires de n'importe qu'elle utilisateur depuis l'espace commentaire
directement.

**L'administrateur** :

- Faire les mêmes actions que le modérateur
- Accéder au panel administrateur

### Panel d'administration

Les panels d'administration permettent à ceux y ayant accès d'**effectuer différentes
actions**. 

Il y a un panel pour chaque roles (Rédacteur, Modérateur, Administrateur) tous avec
des accès différents.

**Sur le panel rédacteur, le rédacteur a accès** :
- à la liste des articles qu'il a créé
- au bouton de suppression de ses articles
- à la création d'un article (il devra renseigner un titre, une photo de couverture,
   un temps de lecture, et le contenu de l'article)


**Sur le panel modérateur, le modérateur a accès** :
- aux mêmes informations et actions que le rédacteur
- aux statistiques du sites (nombre d'utilisateurs inscrit, nombre d'articles sur le site, 
  nombre d'articles en attente, et nombre de commentaires sur le site)
- à la liste de tous les articles crées 
- à la liste des utilisateurs
- à la liste des commentaires
- à la validation des articles
- au bannissement des utilisateurs (seulement les rédacteurs ou simples membres)
- À la promotion des utilisateurs (seulement les rédacteurs ou simples membres)
- À la rétrogradation des utilisateurs (seulement les rédacteurs ou simples membres)
- À la suppression des commentaires

**Sur le panel administrateur, l'administrateur a accès** :
- aux mêmes informations et actions que le modérateur
- aux statistiques d'audience(nombre d'inscriptions par mois) 
  et proportion de rôle sur le site
- à la suppression des articles
- à la suppression des utilisateurs
- à la création d'un membre(il devra renseigner un avatar, un prénom un nom un pseudo
  une e-mail, un mot de passe, et une date de naissance)

### Partie compte utilisateur

Sur le site on peut créer un compte et devenir un membre, pour cela il faut cliquer
sur le bouton "connexion" dans la barre de navigation.

Dans le popup qui s'ouvre il faut aller dans la partie "s'enregistrer" et renseigner :
- un email (on vérifie que l'email est bien unique)
- un pseudo (on vérifie que le pseudo est bien unique)
- un mot de passe et sa confirmation (mot de passe qui est hasher dans la bdd grace à *password_hash*)
- si on veut ou non s'inscrire à la newsletter
- son acceptation des cgu

A l'inscription une session est automatiquement crée pour l'utilisateur avec : 
- Son id d'utilisateur
- Son pseudo d'utilisateur
- Son role
- Son email
- S'il est banni

Les informations de la session sont utilisées pour afficher certaines informations et gérer les
accès.

Quand il s'inscrit le nouveau membre aura un avatar généré automatiquement par rapport
à son pseudo, grace à l'api [UI AVATAR](#ui-avatar).

L'utilisateur est ensuite redirigé vers son profil.

**Sur le profil on peut voir** :
- l'avatar de l'utilisateur
- son pseudo 
- son e-mail
- son nombre de followers
- son nombre d'articles
- son nombre de commentaires
- le bouton follow
- les activités récentes (3 derniers commentaires et 3 derniers articles)
- le bouton modifier ses paramètres, s’il est sur son propre profil

L'utilisateur peut modifier ses informations personnelles sur la page "paramètres"
Il peut changer : 
- Son avatar
- Son email
- Son prénom
- Son nom
- sa date de naissance
- sa description (bio)
- son mot de passe

A coté de l'inscription un utilisateur non connecté peut aussi se connecter au compte
qu'il a créé.

Dans le même popup que pour l'inscription il faut se diriger vers la partie "s'identifier"
et renseigner : 
- son email
- son mot de passe 
- s’il veut rester connecté

S'il coche la case "resté connecté", un cookie comme suit est créé : 
['JUID'] = id_utilisateur::password_hash(email_utilisateur,password_utilisateur,*fingerprint**)

**fingerprint* : afin que le cookie soit unique à chaque utilisateur (pour eviter un vole de cookie)
on a utilisé un fingerprint personnalisé mélangeant les informations suivantes : 

- $_SERVER['HTTP_USER_AGENT']
- $_SERVER['HTTP_ACCEPT']
- $_SERVER['HTTP_ACCEPT_ENCODING']
- $_SERVER['HTTP_ACCEPT_LANGUAGE']

On pourrait aussi ajouter d'autres informations à ce fingerprint comme l'ip de l'utilisateur.

Ce cookie permet, d'abord de savoir quand il revient sur le site, si l'utilisateur est déjà connecté et recupérer ses
informations graçe a son id stocké dans le cookie avant les ::, et que le cookie est bien celui 
de son compte avec la partie après les ::, et finalement lui recréer sa session.

Toujours dans le popup de connexion l'utilisateur peut cliquer sur "Tu n'arrives pas à te connecter ? Mot de passe oublié ?"
s'il a oublié son mot de passe, dans le nouveau popup qui s'ouvre il doit renseigner
l'adresse e-mail de son compte, et si l'adresse mail est bien liée à un compte du site
japan evasion, son mot de passe est réinitialisé avec un nouveau aléatoire et lui envoi par e-mail.

En étant connecté l'utilisateur ne voit plus le bouton "connexion" mais a la place
son avatar sur lequel il peut cliquer pour avoir accès à différentes options :
- mon profil
- paramètres
- panel d'administration (s’il a le role qui permet d'y accéder)
- deconnexion

le bouton "deconnexion" permet de ce deconnecté et de destroy la session en cours. 

A coté de son avatar, il y a une cloche de notification. 


### Barre de recherche

**Pour améliorer son expérience** dans le parcours des articles du site l'utilisateur
peut utiliser la barre de recherche qui se trouve au-dessus de la liste des articles.

Les **critères de recherche** de cette barre sont les suivants : 
- Le pseudo de l'auteur
- Le titre de l'article 
- Le contenu de l'article

Si on tape dans la barre de recherche "loic japon" il affichera tous les articles
contenant le mot "japon" et tous les articles contenant le mot "loic".

### Newsletter

L'inscription à la newsletter ce fait soit à **l'inscription au site via la case
à cocher "Je souhaite m'inscrire à la newsletter quotidienne"** ou par le formulaire
qui se trouve **dans le footer** de chaque page du site si l'utilisateur n'est connecté. 

En renseignant son prénom et son adresse mail et en cliquant sur "s'abonner' l'utilisateur
recevra un mail de "no-reply@japan-evasion.com" directement dans sa boite mail.

S’il est déjà inscrit à la newsletter il ne pourra pas s'y réinscrire.

### Contact

Le formulaire de contact se trouve **sur la page contact** dans celui-ci il faut
renseigner :
- Prénom
- Nom
- E-mail
- Message
- Consentement au CGU

A l'envoi du formulaire l'administrateur reçoit le un mail contenant le contenu 
du formulaire et peut y répondre directement depuis sa boite mail.

### notification

L'utilisateur reçoit une notification **à chaque fois que quelqu'un le suit**.
Il verra la notification "utilisateur vous suit" **dans le dropdown de la cloche de notification** dans 
la barre de navigation. La cloche affichera le nombre de notifications qu'il n'a pas
encore vu. Pour marquer les notifications comme lu il a juste à cliquer sur la cloche
et le chiffre au-dessus de la cloche disparaitra ainsi que la notification.

## Les technologies et API utilisées

### UI Avatar

Pour **générer les avatars avec les initiales** de chaque nouveaux utilisateurs (ou celui d'un visiteur 
dans l'espace commentaire) grace à son pseudo, on utilise l'api de **Ui Avatar**
qui permet de générer une image d'avatar avec une liste de paramètres exhaustifs
et seulement une URL.

Voici un exemple d'url et de paramètres que nous avons utilisé pour nos avatars :

https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128&name=PseudoUtilisateur

![alt test](https://eu.ui-avatars.com/api/?background=1e1e1e&color=ffffff&length=1&bold=true&size=128&name=PseudoUtilisateur)

**Les différents paramètres sont** :

- background : défini la couleur du fond de l'avatar
- color : défini la couleur de l'initiale 
- length : défini le nombre de lettre du pseudo à afficher
- bold : défini si l'initiale doit être en gras ou non
- size : défini la taille de l'avatar
- name : défini le mot du quel ui avatar générera l'avatar

### AJAX

**Les requêtes en ajax sont utilisées sur plusieurs modules de notre site comme:**
- la partie aimer les commentaires
- la barre de recherche
- la connexion et l'inscription
- les actions dans les panels d'administrations
- le hover du pseudo dans l'espace commentaire
- Voir plus d'articles et Voir plus de commentaires
- la newsletter



