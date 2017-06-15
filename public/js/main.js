/*
 * Ce fichier contient la logique de base pour l'application WEB
 * Il est en charge du routing, de la navigation (gestion des #) ainsi que des requêtes pour les éléments de la page d'accueil.
 * */

$(function () {
    // Création du router Backbone
    var MaRoute = new MainRouter;
    //Démarrage de la gestion history via Backbone
    Backbone.history.start();


    // GESTION MENU HAMBURGER (RESPONSIVE)
    $("#popup").on("click", "nav.edition_menu",  function () {
        $("body nav.edition_menu ul").toggleClass('isHidden');
        $("html").toggleClass("isNoScroll");
        $("body nav.edition_menu ul").toggleClass("isBlock");

    });


    //Initialisation des réseaux sociaux affichés en en-tête
    var socialNetworks = new ModelReseauxSociaux();
    socialNetworks.fetch({
        success: function () {
            $("#socials").html(JST['reseauxSociaux']({reseauxSociaux:socialNetworks.toJSON()}));
        }
    });

    //Appel de la fonction de gestion des popstate pour les routes non gérées par Backbone.
    managePopState();


    //Initialisation des éléments nécessaires à la fabrication de la timeline.
    var editionsTimeline = new ModelEditions();
    editionsTimeline.fetch({
        success: function(){
            $('#timeline').append(JST['timeline']({timeline:editionsTimeline.toJSON()}));
            initTimeline();
        }
    });
});
