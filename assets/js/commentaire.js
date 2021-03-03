
$(function(){

    //REPONSE COMMENTAIRE
    $('.reponse-commentaire').on('click', function(e) {

        e.preventDefault();
        $(`*[data-commentaire="${$(this).data('cible')}"]`).toggle()
        console.log('click')
    })

    //COMPTEUR LIKE
    function like(tag){
        $button = $(tag);

        $.ajax('./?ajax=aime_commentaire',{
            method:'POST',
            dataType: "JSON",
            data: {
            id_commentaire:$(tag).data('like')
            }}).done(function (data) {
                console.log(data);

                if(data.success){
                    if(data.add){
                        $button.children('.number_like').text(data['number_like']);
                        $button.children('.fa-heart').css('color','#91060e');
                    }

                    if(data.delete){
                        $button.children('.number_like').text(data['number_like']);
                        $button.children('.fa-heart').css('color','#8c8c8c');
                    }
                }


            })


    }

    $('.compteur_like').on('click', function(e){
        e.preventDefault();
        like(this);
    })

    //NOTIFICATION BUTTON
    $('#plus-commentaire').on('click', function(e) {
        e.preventDefault();

        $.ajax("./?ajax=afficherPlus", {
            method: "POST",
            dataType: "JSON",
            data:{
                plusCommentaire : true,
                row:$(this).data('row'),
                id_article:$(this).data('idarticle')
            }
        }).done(function(result) {
            if (result.success) {
                $('#plus-commentaire').data('row', $('#plus-commentaire').data('row')+6)
                result.commentaire.forEach(function (commentaire) {

                    $('#commentaire').append(
                        `<div class="com" id="commentaire_${commentaire.id}">
                    <img class="avatar_utilisateur" src="${commentaire.avatar}" alt="avatar">
                    <span class="pseudo">
                    <a class="${commentaire.role}" href="?page=profiles&amp;utilisateur=${commentaire.pseudo}">
                    ${commentaire.pseudo}
                    ${commentaire.role === "redacteur" ? '<i class="fas fa-feather-alt" style="color: #248899 !important;" aria-hidden="true"></i>'
                            : commentaire.role === "administrateur" ? '<img src="./assets/media/avatar/shield.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">'
                                : commentaire.role === "moderateur" ? '<img src="./assets/media/avatar/shield2.png" style="height : 25px; widht : 25px; margin-bottom : 10px;">'
                                    : ''
                        }
                    
                                                                                                    
                    </a></span>dit:<br>
                    <span class="date">${commentaire.datetime}</span>
                    
                    ${commentaire.estReponse ? 
                            `
                            <div class="reponse">
                                <span class="pseudo">${commentaire.reponsePseudo}
                                </span>  ${commentaire.reponseDatetime}
                                <p class="reponse-mini">${commentaire.reponseContenu}</p>
                            </div>
                    
                            ` : ''
                        }                    
                    
                    <div class="row justify-content-end compteur_like" data-like="${commentaire.id}">    
                        <span class="number_like">${commentaire.nblike}</span>
                        <i class="fas fa-heart" style="color : ${(commentaire.estLike) ? 'red' : '#8c8c8c'};" aria-hidden="true"></i>
                    </div>
                    
                    
                    <p class="contenu_commentaire">${commentaire.contenu}</p>
                    
                </div>
                <div class="row justify-content-end">
                                    <a href="#"><span class="btn-signaler"><i class="fas fa-flag" aria-hidden="true"></i>Signaler</span></a>
                    <!-- SUPPRESSION DU COMMENTAIRE -->
                                        <a href="?page=articles&amp;id=3&amp;id_commentaire=10"><span class="btn-suppr"><i class="fas fa-trash" aria-hidden="true"></i>Supprimer</span></a>
                                    
                    <!-- REPONDRE A UN COMMENTAIRE -->
                    <a href="#" data-cible="${commentaire.id}" class="reponse-commentaire"><span class="btn-rep"><i class="fas fa-reply" aria-hidden="true"></i>Répondre</span></a>
                </div>
            
                <form style="display: none" method="post" id="form-reponse" class="needs-validation" novalidate="" data-commentaire="${commentaire.id}">

                        <div class="form-row">
                        <label class="formu">Message *</label>
                        <textarea class="form-control" id="textArea" maxlength="1000" minlength="10" rows="8" name="contenu_commentaire" required=""></textarea>
                        
                        <input type="hidden" name="id_commentaire" value="10">
                        
                                                    <button class="btn btn-dark" type="submit" name="submit_reponse">REPONDRE</button>
                        </div>

                </form>
                <div class="line"></div>    
                `
                    );
                    //Appel aux event
                    $(`#commentaire_${commentaire.id} .compteur_like`).on('click', function(e){
                        e.preventDefault();
                        like(this);
                        console.log('click')
                    })

                    $(`.reponse-commentaire[data-cible="${commentaire.id}"]`).on('click', function(e) {
                        e.preventDefault();
                        $(`*[data-commentaire="${$(this).data('cible')}"]`).toggle()
                    })
                })

            } else {
                console.log(result);
            }
        }).fail(function(xhr, textStatus, errorThrown) {
            console.log(errorThrown);
        });
    });

    $('.overProfile').on( 'mouseenter mouseleave',function (e){
        e.preventDefault();
        let over = $(this)
        $.ajax('./?ajax=afficherPlus',{
            method:'POST',
            dataType: "JSON",
            data: {
                overProfile:true,
                pseudo_utilisateur:$(this).data('utilisateur')

            },
            beforeSend(jqXHR, settings) {
                $(over).attr('data-content','Wait...');
            }
        }).done(function (data) {

            if(data.success){

                $(over).attr('data-content',`
                    <div class="profile-images-card buttons  py-3">
                   
                                    <div class="row">
                    
                                        <ul class="text-center pr-1 pl-1">
                                            <li id="nbFollower" class="number-profil">${data.follow}</li>
                                            <li>
                                                <h3 class="mt-3">FOLLOWERS</h3>
                                            </li>
                                        </ul>
                    
                                        <ul class="text-center pr-1 pl-1">
                                            <li class="number-profil">${data.commentaire}</li>
                                            <li>
                                                <h3 class="mt-3">COMMENTAIRE</h3>
                                            </li>
                                        </ul>
                    
                                        <ul class="text-center pr-1 pl-1">
                                            <li class="number-profil">${data.article}</li>
                                            <li>
                                                <h3 class="mt-3">ARTICLE</h3>
                                            </li>
                                        </ul>
                    
                                    </div>
         
                            </div>          
            `);
                $(over).popover('toggle')
            }


        })


    })




})