/*
* Ce fichier contient un fragment de code nécessaire à l'initialisation de la timeline présentée en page d'accueil.
*
* */

function initTimeline() {


    function stickyDots() {
        var scroll = window.scrollY;
        var timelinePos = $('#timeline').offset().top;

        if(scroll - timelinePos > 0) {
            if(!$('.timeline-dots-wrap').hasClass('isFixed')) {
                $('.timeline-dots-wrap').addClass('isFixed');
            }
        } else {
            if($('.timeline-dots-wrap').hasClass('isFixed')) {
                $('.timeline-dots-wrap').removeClass('isFixed');
            }
        }
    }
    stickyDots();

    $(window).on('scroll', function() {
        stickyDots();
    });

    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
        triggerElement: ".timeline",
        triggerHook: 1,
        duration: $('.timeline').height()
    })
        .addTo(controller);

    for (index = 1; index <=  $('.timeline-dots > li').length; index++) {
        new ScrollMagic.Scene({
            triggerElement: ".timeline > div:nth-child(" + (index) + ")",
            triggerHook: 0.4,
            duration: "100%"
        })
            .setClassToggle(".timeline-dots li:nth-child(" + (index) + ")", 'big')
            .on('update', function() {
                TweenMax.to($('.big').prev('li').prev('li').prevAll('li'), 0.1, {autoAlpha: 0} );
                TweenMax.to($('.big').next('li').next('li').nextAll('li'), 0.1, {autoAlpha: 0} );
                TweenMax.to($('.big').prev('li'), 0.1, {autoAlpha: 1} );
                TweenMax.to($('.big').next('li'), 0.1, {autoAlpha: 1} );
                TweenMax.to($('.big').prev('li').prev('li'), 0.1, {autoAlpha: 1} );
                TweenMax.to($('.big').next('li').next('li'), 0.1, {autoAlpha: 1} );
                if($('.timeline-dots li').hasClass('right-dot') || $('.timeline-dots li').hasClass('left-dot')) {
                    $('.timeline-dots li').removeClass('right-dot').removeClass('left-dot');
                }
                if(!$('.big').prevAll('li').hasClass('right-dot') || !$('.big').nextAll('li').hasClass('left-dot')) {
                    $('.big').prevAll('li').addClass('right-dot');
                    $('.big').nextAll('li').addClass('left-dot');
                }
            })
            .addTo(controller);
    };
    // create scene to pin and link animation

}