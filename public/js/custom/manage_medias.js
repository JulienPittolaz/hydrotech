/**
 * Ce fichier est responable de l'initialisation de Masonry pour la présentation des galeries de médias
 *
 * Created by timdlp on 11.06.17.
 */
function initMasonry(){
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
    $('.btn input').on('click', function () {
        $(this.parentElement).toggleClass('active');
    });
}