/**
 *
 * Ce fichier contient le fragment de code responsable de l'affichage de la page d'erreur
 * Created by timdlp on 15.06.17.
 */

function showErrorPage(POPUP){
    POPUP.empty();
    POPUP.append("<h1 class='page_title'>Erreur 404 : page non trouvée</h1><div class='container'><div class='columns'><div class='column is-12'>Il n'y a pas de contenu ici. Ce que vous cherchez n'existe pas à l'adresse demandée. À moins que vous ne recherchiez cette page d'erreur, dans ce cas : Vous avez trouvé !</div><div class='column is-12'><a href='#'>Revenir à la page d'accueil</a></div></div></div>");
    $('section').hide();
    $('section#popup').show();
}