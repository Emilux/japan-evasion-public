$(function (){
    $('.bannir').on('click', function (e) {
        e.preventDefault();
        let thisButton = $(this);
        $.ajax("./?ajax=action", {
            method: "POST",
            dataType: "JSON",
            data:{
                bannir:true,
                id_utilisateur:$(this).data('utilisateur')
            },
            beforeSend: function(e) {
                $('.btn-action').text('Loading...');
            }
        }).done(function(result) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            if (result.success) {
                console.log(result);
                if (result.message === "banni"){
                    $(`*[data-row-user="${result.id}"]`).children(`.banni`).text('Banni');
                    $(`.bannir[data-utilisateur="${result.id}"]`).text('Débannir');
                } else if (result.message === "non banni") {
                    $(`*[data-row-user="${result.id}"]`).children(`.banni`).text('Non banni');
                    $(`.bannir[data-utilisateur="${result.id}"]`).text('Bannir');
                }


            } else {
                console.log(result);
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            console.log(errorThrown);
            console.log(xhr);
            console.log(textStatus);
        });
    })

    /** Promouvoir un utilisateur
     *
     * @param e event javascript
     * @param obj object jquery
     * @constructor
     */
    function Promouvoir(e,obj){
        e.preventDefault();
        thisButton = $(obj)
        $.ajax("./?ajax=action", {
            method: "POST",
            dataType: "JSON",
            data:{
                promouvoir:true,
                id_utilisateur:thisButton.data('utilisateur')
            },
            beforeSend: function(e) {
                $('.btn-action').text('Loading...');
            }
        }).done(function(result) {
            //Loading fini reafficher boutton action
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');

            //Si l'utilisateur est promu
            if (result.success) {
                //Afficher son nouveau role
                $(`*[data-row-user="${result.id}"]`).children(`.role-user`).text(result.message.charAt(0).toUpperCase() + result.message.substr(1).toLowerCase());

                //Si son nouveau rôle est administrateur toggle du bouton promouvoir pour le hide si il est déjà afficher.
                if (result.message === "administrateur") {

                    //Si le bouton retrograder n'existe pas encore le crée et lui assigner un nouveau on click
                    if ($(`.retrograder[data-utilisateur="${result.id}"]`).length === 0){
                        $(`.promouvoir[data-utilisateur="${result.id}"]`).before(`<a data-utilisateur="${result.id}" class="dropdown-item retrograder" href="#">Rétrograder</a>`);
                        $(`.retrograder[data-utilisateur="${result.id}"]`).on('click', function (e){
                            Retrograder(e,this)
                        })
                    }

                    //Cacher le bouton promouvoir
                    $(`.promouvoir[data-utilisateur="${result.id}"]`).remove()

                //Sinon afficher le bouton retrograder.
                } else {
                    if ($(`.retrograder[data-utilisateur="${result.id}"]`).length === 0){
                        $(`.promouvoir[data-utilisateur="${result.id}"]`).before(`<a data-utilisateur="${result.id}" class="dropdown-item retrograder" href="#">Rétrograder</a>`);
                        $(`.retrograder[data-utilisateur="${result.id}"]`).on('click', function (e){
                            Retrograder(e,this)
                        })
                    }
                }
                if (result.message === "redacteur" && result.role !== "administrateur"){
                    $(`.promouvoir[data-utilisateur="${result.id}"]`).remove()
                }

            } else {
                console.log(result.message);
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            console.log(errorThrown);
            console.log(xhr);
            console.log(textStatus);
        });
    }

    /** Retrograder un utilisateur
     *
     * @param e event javascript
     * @param obj object jquery
     * @constructor
     */
    function Retrograder(e, obj){
        e.preventDefault();
        thisButton = $(obj)
        $.ajax("./?ajax=action", {
            method: "POST",
            dataType: "JSON",
            data:{
                retrograder:true,
                id_utilisateur:thisButton.data('utilisateur')
            },
            beforeSend: function(e) {
                $('.btn-action').text('Loading...');
            }
        }).done(function(result) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');

            if (result.success) {
                $(`*[data-row-user="${result.id}"]`).children(`.role-user`).text(result.message.charAt(0).toUpperCase() + result.message.substr(1).toLowerCase());
                console.log(result)
                if (result.message === 'membre') {

                    if ($(`.promouvoir[data-utilisateur="${result.id}"]`).length === 0){
                        $(`.retrograder[data-utilisateur="${result.id}"]`).after(`<a data-utilisateur="${result.id}" class="dropdown-item promouvoir" href="#">Promouvoir</a>`);
                        $(`.promouvoir[data-utilisateur="${result.id}"]`).on('click', function (e){
                            new Promouvoir(e,this)
                        })
                    }
                    $(`.retrograder[data-utilisateur="${result.id}"]`).remove()

                } else {
                    if (result.role === "administrateur"){
                        if ($(`.promouvoir[data-utilisateur="${result.id}"]`).length === 0){
                            $(`.retrograder[data-utilisateur="${result.id}"]`).after(`<a data-utilisateur="${result.id}" class="dropdown-item promouvoir" href="#">Promouvoir</a>`);
                            $(`.promouvoir[data-utilisateur="${result.id}"]`).on('click', function (e){
                                new Promouvoir(e,this)
                            })
                        }
                    }

                }

            } else {
                console.log(result);
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            console.log(errorThrown);
            console.log(xhr);
            console.log(textStatus);
        });
    }

    //Appel a la fonction promouvoir si on clique sur le bouton
    $('.promouvoir').on('click', function (e){
        new Promouvoir(e,this)
    })

    //Appel a la fonction retrograder si on clique sur le bouton
    $('.retrograder').on('click', function (e){
        new Retrograder(e,this)
    })

    //Bouton supprimer utilisateur
    $('.delete_user').on('click', function (e){
        e.preventDefault();
        let thisButton = $(this);
        $.ajax("./?ajax=action", {
            method: "POST",
            dataType: "JSON",
            data:{
                supprimer:true,
                id_utilisateur:$(this).data('utilisateur')
            },
            beforeSend: function(e) {
                $('.btn-action').text('Loading...');
            }
        }).done(function(result) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            if (result.success) {
                $(`*[data-row-user="${result.id}"]`).remove();
            } else {
                console.log(result);
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            $('.btn-action').html('Action <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>');
            console.log(errorThrown);
            console.log(xhr);
            console.log(textStatus);
        });
    })
})