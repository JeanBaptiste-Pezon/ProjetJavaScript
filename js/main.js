(function(){
    "use strict";
    let erreurCritique = function() {
        $('body').html('Une erreur inattendue est survenue.<br/>' +
            'Merci de contacter le suport à <br/>' +
            'olivier.pons'+'@'+(true ? 'gma' : '')+'il.c' + 'om');
    };
    $(document).ready(function(){
        $('#form-connexion').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(data){
                console.log('data=', data);
                if(data.est_connecte === true){
                    window.location.reload(true);
                } else {
                    $('#form-connexion').append(data.message);
                }
            }).fail(erreurCritique);
            return false;
        });
        $('#form-deconnexion').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(data){
                console.log('data=', data);
                if(data.est_connecte === false){
                    window.location.reload(true);
                } else {
                }
            }).fail(erreurCritique);
            return false;
        });
        $('#add').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(data){
                console.log('data=', data);
                if(data.result == "ct"){
                    let choix = "ct";
                    window.location.reload(true);
                } else if (data.result == "ing"){
                    let choix = "ing";
                    window.location.reload(true);
                }else if (data.result == "unit"){
                    let choix = "unit";
                    window.location.reload(true);
                } else {
                    window.location.reload(true);
                    console.log("shit happend");
                }
            }).fail(erreurCritique);
            return false;
        });
        $.ajax({
            url: '/json/est_connecte.php'
        }).done(function(data){
            if (data.est_connecte){
                $('#form-deconnexion').slideDown(2000);
                $('#add').slideDown(2000);
                $('#list').slideDown(2000);
            } else {
                $('#form-connexion').slideDown(2000);
            }
        }).fail(erreurCritique);
        $.ajax({
            url: '/json/choixBoutton.php'
        }).done(function(data){
            if (data.est_connecte){
                $('#form-deconnexion').slideDown(2000);
                $('#add').slideDown(2000);
                $('#list').slideDown(2000);
                if(choix == "ct"){
                    window.location.reload(true);
                    console.log("ct");
                } else if (choix == "ing"){
                    window.location.reload(true);
                    console.log('ing');
                }else if (choix == "unit"){
                    window.location.reload(true);
                    console.log('unit');
                } else {}
            } else {
                $('#form-connexion').slideDown(2000);
            }
        }).fail(erreurCritique);
    });
}) ();