/**
 * Created by timdlp on 11.06.17.
 */
function initMasonry(){
    $('label.btn').on('click', function(){
       $(this).toggleClass('active');
    });
    var $grid = $('.galerie_grid').imagesLoaded( function() {
        $grid.multipleFilterMasonry({
            itemSelector: '.grid-item',
            filtersGroupSelector:'.filtres',
            columnWidth: 300,
            gutter: 10,
            isFitWidth: true,
            stamp: '.stamp'
        });
    });

}