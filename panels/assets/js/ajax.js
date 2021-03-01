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


    $('.promouvoir').on('click', function (e) {
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
})