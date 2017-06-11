/**
 * Created by timdlp on 11.06.17.
 */
function initMasonry(){
    var $grid = $('.galerie_grid').imagesLoaded( function() {
        $grid.masonry({
            itemSelector: '.grid-item',
            columnWidth: 300,
            gutter: 10,
            isFitWidth: true,
            stamp: '.stamp'
        });
    });
}