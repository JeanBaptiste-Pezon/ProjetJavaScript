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
        $.ajax({
            url: '/json/est_connecte.php'
        }).done(function(data){
            if (data.est_connecte){
                $('#form-deconnexion').slideDown(2000);
                $('#add').slideDown(2000);
                //$('#form-ingredient').slideDown(2000);
                //$('#form-unite').slideDown(2000);
                //$('#form-cocktail').slideDown(2000);
                $('#list').slideDown(2000);
            } else {
                $('#form-connexion').slideDown(2000);
            }
        }).fail(erreurCritique);
    });

}) ();