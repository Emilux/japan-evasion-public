function truncateString(str, num) {
    // If the length of str is less than or equal to num
    // just return str--don't truncate it.
    if (str.length <= num) {
        return str
    }
    // Return str truncated with '...' concatenated to the end of str.
    return str.slice(0, num) + '...'
}

//NEWSLETTER
$('#form-subscribe').on('submit', function(e) {
    e.preventDefault();
    let formdata = $(this).serialize();
    $.ajax("./?ajax=newsletter", {
        method: "POST",
        dataType: "JSON",
        data: formdata,
        beforeSend: function() {
            $('#msg').html("<div class='alert alert-info'>Attendez...</div>");
        }
    }).done(function(result) {
        if (result.success) {
            $('#msg').html("<div class='alert alert-success'>" + result.message + "</div>");
            $('#form-subscribe')[0].reset();
        } else {
            $('#msg').html("<div class='alert alert-danger'>" + result.message + "</div>");
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        $('#msg').html("<div class='alert alert-danger'>Une erreur est survenue, veuillez réessayer !</div>");
    });
});

//CONNEXION
$('#connexion_form_submit').on('click', function(e) {
    e.preventDefault();
    let formdata = $('#connexion_form').serialize();
    $.ajax("./?ajax=auth", {
        method: "POST",
        dataType: "JSON",
        data: formdata,
        beforeSend: function() {
            $('#conError').html("<div class='alert alert-info'>Attendez...</div>");
        }
    }).done(function(result) {
        if (result.success) {
            window.location.href = "./?page=profiles&utilisateur=" + result.message;
        } else {
            $('#conError').html("<div class='alert alert-danger'>" + result.message + "</div>");
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        $('#conError').html("<div class='alert alert-danger'>" + errorThrown + "</div>");
    });
});

//INSCRIPTION
$('#submit_creer_compte').on('click', function(e) {
    console.log('clickclick')
    e.preventDefault();
    let formdata = $('#creer_compte_form').serialize();
    $.ajax("./?ajax=auth", {
        method: "POST",
        dataType: "JSON",
        data: formdata,
        beforeSend: function() {
            $('#regError').html("<div class='alert alert-info'>Attendez...</div>");
        }
    }).done(function(result) {
        if (result.success) {
            window.location.href = "./?page=profiles&utilisateur=" + result.message;
        } else {
            console.log(result)

            //Change couleur des inputs si une d'elle est vide.
            if (result.emptyPseudo) {
                $('#pseudo_utilisateurReg').addClass('wrong')
            } else {
                $('#pseudo_utilisateurReg').removeClass('wrong')
            }

            if (result.emptyMail) {
                $('#email_utilisateurReg').addClass('wrong')
            } else {
                $('#email_utilisateurReg').removeClass('wrong')
            }


            if (result.emptyMdp) {
                $('#mdp_utilisateurReg').addClass('wrong')
            } else {
                $('#mdp_utilisateurReg').removeClass('wrong')
            }

            if (result.emptyMdp_conf) {
                $('#mdp_utilisateur_confirmationReg').addClass('wrong')
            } else {
                $('#mdp_utilisateur_confirmationReg').removeClass('wrong')
            }

            if (result.emptyCheckCgu) {
                $('#cgu').addClass('wrong')
            } else {
                $('#cgu').removeClass('wrong')
            }

            $('#regError').html("<div class='alert alert-danger mt-3'>" + result.message.join('<br><hr>') + "</div>");
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        $('#regError').html("<div class='alert alert-danger'>Une erreur est survenue, veuillez réessayer !</div>");
    });
});

//FOLLOWING BUTTON
$('#followbtn').on('click', function(e) {
    e.preventDefault();
    var formdata = $('#form-follow').serialize();
    console.log(formdata)

    $.ajax("./?ajax=follow", {
        method: "GET",
        dataType: "JSON",
        data: formdata,
    }).done(function(follower) {
        if (follower.success) {
            console.log(follower.count);
            $('#nbFollower').text(follower.count);
            $('#followButtonText').text(follower.message);
        } else {
            console.log(follower);
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        console.log(errorThrown);
    });
});

//NOTIFICATION BUTTON
$('#alertsDropdown').on('click', function(e) {
    e.preventDefault();
    var formdata = $('#form-follow').serialize();
    console.log(formdata)

    $.ajax("./?ajax=notification", {
        method: "POST",
        dataType: "JSON",
        data: formdata,
    }).done(function(result) {
        if (result.success) {
            $('#nb-notif').hide();
        } else {
            console.log(result);
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        console.log(errorThrown);
    });
});

function voirArticle(tag){
    $.ajax("./?ajax=afficherPlus", {
        method: "POST",
        dataType: "JSON",
        data:{
            plusArticle : true,
            row:$(tag).data('row')
        },
        beforeSend: function() {
            $(tag).text("Chargement...");
        }
    }).done(function(result) {
        $(tag).text("VOIR PLUS D'ARTICLE");
        if (result.success) {
            $('#plus-article').data('row', $('#plus-article').data('row')+6)
            result.article.forEach(function (article) {
                $('#article').append(
                    `<div class="p-3 col-4">
                    <div class="card h-100 shadow bg-white rounded">
                        <div class="cardy-b">
                            <img class="card-img-top" src="${article.cover}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><span class="dot">• </span>Écrit par <a
                                href="?page=profiles&utilisateur={$value->getPseudo_Visiteur()}">${article.pseudo}</a>
                            </h5>
                            <h2>${article.titre}</h2>
                            <p class="card-text">${truncateString(article.contenu, 100)}</p>
                            <div class="row justify-content-center">
                                <a class="btn-lire" href="?page=articles&id=${article.id}">LIRE
                                    L'ARTICLE</a>
                            </div>
                        </div>
                    </div>
                </div>`
                );
            })

        } else {

            console.log(result);
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        console.log(errorThrown);
        $(tag).text("VOIR PLUS D'ARTICLE");
    });
}

//VOIR PLUS ARTICLE BUTTON
$('#plus-article').on('click', function(e) {
    e.preventDefault();
    voirArticle(this);
});

//BARRE DE RECHERCHE DYNAMIQUE
$('#recherche-text').on('change paste keyup', function(e) {
    $.ajax("./?ajax=recherche", {
        method: "GET",
        dataType: "JSON",
        data:{
            recherche : $('#recherche-text').val()
        }
    }).done(function(result) {
        if (result.success) {
            $('#article').html('');
            if (result.article !== '' ){
                $('#plus-article').remove();
                result.article.forEach(function (article) {
                    $('#article').append(
                        `
                    <div class="p-3 col-4">
                        <div class="card h-100 shadow bg-white rounded">
                            <div class="cardy-b">
                                <img class="card-img-top" src="${article.cover}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><span class="dot">• </span>Écrit par <a
                                    href="?page=profiles&utilisateur={$value->getPseudo_Visiteur()}">${article.pseudo}</a>
                                </h5>
                                <h2>${article.titre}</h2>
                                <p class="card-text">${truncateString(article.contenu, 100)}</p>
                                <div class="row justify-content-center">
                                    <a class="btn-lire" href="?page=articles&id=${article.id}">LIRE
                                        L'ARTICLE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                    );
                })
                if ($('#recherche-text').val() === ''){
                    $('#voir-plus-article').html(`<a data-row="6" id="plus-article" href="#" class="btn btn-dark">VOIR PLUS D'ARTICLE</a>`);
                    $('#plus-article').on('click', function(e) {
                        e.preventDefault();
                        voirArticle(this);
                    });
                }
            }

        } else {
            console.log(result);
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        console.log(errorThrown);
    });

});

//MODAL MOT DE PASS OUBLIE 

$(document).ready(function() {

    $(document).on('show.bs.modal', '.modal', function(event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });


});