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