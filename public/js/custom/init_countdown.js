/**
 * Ce fichier a pour but l'initialisation du countdown présent sur la page d'accueil
 * Created by timdlp on 13.06.17.
 */
function initCountdown() {
    // On récupère la date dans l'édition courante
    var startTime = new Date(CURRENT_ED.dateDebut);
    //On initialise le countdown
    $('#defaultCountdown').countdown({until: startTime});
}