/**
 * Ce fichier contient un fragment de code permettant l'écoute des événements popstate.
 *
 * Son but est de fournir une expérience de navigation correcte lors de l'utilisation (par exemple du bouton retour depuis une "popup")
 *
 *
 * Created by timdlp on 14.06.17.
 */
function managePopState(){
    //On écoute sur popstate
    $(window).on("popstate", function(e){
        //Fabrication de l'identifiant de page
        var idPage = location.hash;
        idPage = idPage.substring(1);
        //Les événements qui doivent déclancher ici sont uniquement ceux qui ne sont pas gérés par Backbone -> pas de / après le #.
        if (idPage.charAt(0) != '/'){
            $("section").show();
            $("section#popup").hide();
            var tag = $("#"+idPage+"");
            $('html,body').animate({scrollTop: tag.offset().top},'slow');
        }
        else{
            return false;
        }
    });
}