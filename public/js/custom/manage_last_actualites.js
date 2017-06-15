/**
 * Ce fichier contient un fragment de code nécessaire à l'affichage des dernières actualités.
 * Created by timdlp on 13.06.17.
 */
function manageLatestActus(){
    // On récupère les 4 dernières actus de l'édition courante
    var LATEST_NEWS = CURRENT_ED.actus.slice(0,4);
    //On définit l'année pour la gestion du bouton de retour
    var year = CURRENT_ED.annee;
    //Envoi à la template
    $('#globalNews').append(JST['last_actualites']({actualites:LATEST_NEWS},{year:year}));
    //gestion du bouton du retour vers toutes les news de l'année
    _.each($('.latest_actualite_contenu'), function(actu){
        var articleId = $(actu.parentElement).attr("data-id");
        var viewMoreUrl = "#/editions/"+year+"/actualites/"+articleId;
        $(actu).html($(actu).html().substring(0,160)+"… "+"<div class='latest-news-view-more'><a href='"+viewMoreUrl+"'>Lire la suite</a></div>");
    });
}