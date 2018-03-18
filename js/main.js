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
        $('#newCocktail').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("cocktail");
                $('#addCocktail').slideDown(2000);
                $('#addIngredient').fadeOut(2000);
                $('#addUnit').fadeOut(2000);
                $('#listCocktail').fadeOut(2000);
            }).fail(erreurCritique);
            return false;
        });
        $('#newIngredient').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("ing");
                $('#addCocktail').fadeOut(2000);
                $('#addIngredient').slideDown(2000);
                $('#addUnit').fadeOut(2000);
                $('#listCocktail').fadeOut(2000);
            }).fail(erreurCritique);
            return false;
        });
        $('#newUnit').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("unit");
                $('#addCocktail').fadeOut(2000);
                $('#addIngredient').fadeOut(2000);
                $('#addUnit').slideDown(2000);
                $('#listCocktail').fadeOut(2000);
            }).fail(erreurCritique);
            return false;
        });
        $('#listCT').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("ListeCocktail");
                $('#addCocktail').fadeOut(2000);
                $('#addIngredient').fadeOut(2000);
                $('#addUnit').fadeOut(2000);
                $('#listCocktail').slideDown(2000);
            }).fail(erreurCritique);
            return false;
        });
        $('#addIngredient').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("Normalement un ingredient est ajouté");
                $('#addCocktail').fadeOut(2000);
                $('#addIngredient').fadeOut(2000);
                $('#addUnit').fadeOut(2000);
                $('#listCocktail').fadeOut(2000);
            }).fail(erreurCritique);
            return false;
        });
        $('#addUnit').submit(function(){
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize()
            }).done(function(){
                console.log("Normalement une unite est ajouté");
                $('#addCocktail').fadeOut(2000);
                $('#addIngredient').fadeOut(2000);
                $('#addUnit').fadeOut(2000);
                $('#listCocktail').fadeOut(2000);
            }).fail(erreurCritique);
            return false;
        });
        $.ajax({
            url: '/json/est_connecte.php'
        }).done(function(data){
            if (data.est_connecte){
                $('#form-deconnexion').slideDown(2000);
                $('#newCocktail').slideDown(2000);
                $('#newIngredient').slideDown(2000);
                $('#newUnit').slideDown(2000);
                $('#listCT').slideDown(2000);
            } else {
                $('#form-connexion').slideDown(2000);
            }
        }).fail(erreurCritique);
    });
}) ();