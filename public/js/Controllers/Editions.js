/**
 * Created by timdlp on 06.06.17.
 */

var CtrlEditions = {
    show: function (annee, page,article) {
        var POPUP = $("#popup .popup_content");
        if (annee == CURRENT_ED.annee) {
            var content = {};
            var fillIn = CURRENT_ED[page];
            content[page] = fillIn;
            content['year'] = annee;
            POPUP.empty();
            POPUP.append(JST[page](content));
            $(" nav.edition_menu").css("display", "block");
            $(" nav.edition_menu ul").addClass('isHidden');
            $('section').hide();
            $('section#popup').show();
            if (page == 'medias'){
                initMasonry();
            }
            if (page == 'presses'){
                managePresse();
            }
            if (page == 'actualites'){
                manageArticles();
            }
            $(".popup_cross").on("click", function () {
                $('section').show();
                $('section#popup').hide();
                $(window).scrollTop($(window).scrollTop()+1);
            });
        } else{
            var edition = new ModelEdition();
            edition.fetchByYear(annee, {
                success: function () {
                    var content = {};
                    var fillIn = edition.attributes[page];
                    content[page] = fillIn;
                    content['year'] = annee;
                    POPUP.empty();
                    POPUP.append(JST[page](content));
                    $(" nav.edition_menu").css("display", "block");
                    $(" nav.edition_menu ul").addClass('isHidden');
                    $('section').hide();
                    $('section#popup').show();
                    if (page == 'medias'){
                        initMasonry();
                    }
                    if (page == 'presses'){
                        managePresse();
                    }
                    if (page == 'actualites'){
                        manageArticles();
                    }
                    $(".popup_cross").on("click", function () {
                        $('section').show();
                        $('section#popup').hide();
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