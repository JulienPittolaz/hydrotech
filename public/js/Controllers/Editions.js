/**
 * Created by timdlp on 06.06.17.
 */
var CtrlEditions = {
    show: function(annee,page){
        if (annee == CURRENT_ED.annee) {
            var content = {};
            var fillIn = CURRENT_ED[page];
            content[page] = fillIn;
            content['year'] = annee;
            $("#popup").empty();
            $("#popup").append(JST[page](content));
        } else if (annee != CURRENT_ED.annee){
            var edition = new ModelEdition();
            edition.fetchByYear(annee,{success: function(){
                var content = {};
                var fillIn = edition.attributes[page];
                content[page] = fillIn;
                content['year'] = annee;
                $("#popup").empty();
                $("#popup").append(JST[page](content));
                if (page == 'galerie'){
                    // init Masonry
                    var $grid = $('.grid').imagesLoaded( function() {
                        $grid.masonry({
                            itemSelector: '.grid-item',
                            columnWidth: 300,
                            gutter: 10,
                            isFitWidth: true,
                            stamp: '.stamp'
                        });
                    });
                }
            },
            error: function(){
                $("#popup").empty();
                $("#popup").append("<h1>Not Found</h1>");
            }});

        }
    }
}