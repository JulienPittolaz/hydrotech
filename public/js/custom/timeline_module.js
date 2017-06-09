$(function() {
    $('.js-timeline').Timeline({
        mode: 'vertical',
        itemClass: 'timeline-item'
    });

    $('.timeline-item').each(function() {
       $(this).css({
          "background-image" : 'url(images/editions/background-' + $(this).attr("data-time") + '.jpg)'
       });
    });
});