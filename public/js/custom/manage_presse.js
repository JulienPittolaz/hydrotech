/**
 * Created by timdlp on 11.06.17.
 * Ce fichier est en charge de l'initialisation du module jQuery Gridder pour la page de la revue de presse
 */
function managePresse(){
    // Initialisation de Gridder avec les valeurs personnalisées.
    $('.gridder').gridderExpander({
        scroll: true,
        scrollOffset: 30,
        scrollTo: "panel", // panel or listitem
        animationSpeed: 400,
        animationEasing: "easeInOutExpo"
    });

    //Ouverture automatique du premier article présenté
    $('#popup > div > div.container > div > ul > li:nth-child(1)').trigger('click');
}