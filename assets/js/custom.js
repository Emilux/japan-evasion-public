//NEWSLETTER
console.log('test');
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



//REPONSE COMMENTAIRE
$('.reponse-commentaire').on('click', function(e) {

    e.preventDefault();
    $(`*[data-commentaire="${$(this).data('cible')}"]`).toggle()
})


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
            window.location.href="./?page=profiles&utilisateur="+result.message;
        } else {
            $('#conError').html("<div class='alert alert-danger'>" + result.message + "</div>");
        }
    }).fail(function(xhr, textStatus, errorThrown) {
        $('#conError').html("<div class='alert alert-danger'>"+errorThrown+"</div>");
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
             window.location.href="./?page=profiles&utilisateur="+result.message;
        } else {
            console.log(result)

            //Change couleur des inputs si une d'elle est vide.
            if (result.emptyPseudo){
                $('#pseudo_utilisateurReg').addClass('wrong')
            } else {
                $('#pseudo_utilisateurReg').removeClass('wrong')
            }

            if (result.emptyMail){
                $('#email_utilisateurReg').addClass('wrong')
            } else {
                $('#email_utilisateurReg').removeClass('wrong')
            }


            if (result.emptyMdp){
                $('#mdp_utilisateurReg').addClass('wrong')
            } else {
                $('#mdp_utilisateurReg').removeClass('wrong')
            }

            if (result.emptyMdp_conf){
                $('#mdp_utilisateur_confirmationReg').addClass('wrong')
            } else {
                $('#mdp_utilisateur_confirmationReg').removeClass('wrong')
            }

            if (result.emptyCheckCgu){
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
$('#followbtn').on('click', function(e){
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
