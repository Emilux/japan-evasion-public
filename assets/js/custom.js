//NEWSLETTER
console.log('test');
$('#form-subscribe').on('submit', function(e) {
    e.preventDefault();
    var formdata = $(this).serialize();
    var url = $(this).attr("action");
    console.log(url)
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
