/**
 * Ce fichier contient un fragment de code qui permet la gestion de l'affichage dynamique de notre barre de titre (avec réseaux sociaux et logo)
 * Cette dernière suit la page au scroll
 */

$(function() {
    var isScroll = false;
    var lastScroll = 0;
    var menu = $('.home_menu');
    setInterval(function() {
            checkScroll();
    }, 800);

    function checkScroll() {
        var scrollPos = $(window).scrollTop();
        if(scrollPos > 0 && !menu.hasClass('white-menu')) {
            menu.addClass('white-menu');
        } else if(scrollPos == 0 && menu.hasClass('white-menu')) {
            menu.removeClass('white-menu');
        }

        if(scrollPos == lastScroll && !menu.hasClass('hiddenMenu') && scrollPos > 0) {
            menu.addClass('hiddenMenu');
        } else if(scrollPos != lastScroll && menu.hasClass('hiddenMenu')) {
            menu.removeClass('hiddenMenu');
        }
        lastScroll = scrollPos;
    }
});