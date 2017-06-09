/**
 * Created by timdlp on 06.06.17.
 */

var CtrlEditions = {
    show: function (annee, page) {
        var POPUP = $("#popup .popup_content");
        console.log(POPUP);
        if (annee == CURRENT_ED.annee) {
            var content = {};
            var fillIn = CURRENT_ED[page];
            content[page] = fillIn;
            content['year'] = annee;
            POPUP.empty();
            POPUP.append(JST[page](content));
            if (page == 'medias'){
                // init Masonry
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
            if (page == 'presses'){
                // Call Gridder
                $('.gridder').gridderExpander({
                    scroll: true,
                    scrollOffset: 30,
                    scrollTo: "panel", // panel or listitem
                    animationSpeed: 400,
                    animationEasing: "easeInOutExpo",
                    showNav: true, // Show Navigation
                    nextText: "", // Next button text
                    prevText: "", // Previous button text
                    closeText: "", // Close button text
                    onStart: function () {
                        //Gridder Inititialized
                        console.log('On Gridder Initialized...');
                    },
                    onContent: function () {
                        //Gridder Content Loaded
                        console.log('On Gridder Expand...');
                    },
                    onClosed: function () {
                        //Gridder Closed
                        console.log('On Gridder Closed...');
                    }
                });
            }
        } else if (annee != CURRENT_ED.annee) {
            var edition = new ModelEdition();
            edition.fetchByYear(annee, {
                success: function () {
                    var content = {};
                    var fillIn = edition.attributes[page];
                    content[page] = fillIn;
                    content['year'] = annee;
                    POPUP.empty();
                    POPUP.append(JST[page](content));
                    $('section').hide();
                    $('section#popup').show();
                    if (page == 'medias'){
                        // init Masonry
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
                    if (page == 'presses'){
                        // Call Gridder
                        $('.gridder').gridderExpander({
                            scroll: true,
                            scrollOffset: 30,
                            scrollTo: "panel", // panel or listitem
                            animationSpeed: 400,
                            animationEasing: "easeInOutExpo",
                            showNav: true, // Show Navigation
                            nextText: "", // Next button text
                            prevText: "", // Previous button text
                            closeText: "", // Close button text
                            onStart: function () {
                                //Gridder Inititialized
                                console.log('On Gridder Initialized...');
                            },
                            onContent: function () {
                                //Gridder Content Loaded
                                console.log('On Gridder Expand...');
                            },
                            onClosed: function () {
                                //Gridder Closed
                                console.log('On Gridder Closed...');
                            }
                        });
                    }
                    $(".popup_cross").on("click", function () {
                        history.pushState(this, '',"/" );
                    });
                },
                error: function () {
                    POPUP.empty();
                    POPUP.append("<h1>Not Found</h1>");
                }
            });

        }
    }
}