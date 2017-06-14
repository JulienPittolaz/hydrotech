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
            $("nav.edition_menu li a[data-page="+ page +"]").addClass("current_page");
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
                $('.actualite_footer').show();
                if (!_.isNull(article)){
                    $('#popup .columns').empty();
                    var contentArticle = {};
                    contentArticle['article'] = CURRENT_ED.actualites[article-1];
                    contentArticle['year'] = annee;
                    console.log(contentArticle);
                    $('#popup .columns').append(JST['actualite_zoom'](contentArticle));
                    $('footer.actualite_footer').hide();
                }
            }
            $(".popup_cross").on("click", function () {
                $('section').show();
                $('section#popup').hide();
            });
        } else{
            var edition = new ModelEdition();
            edition.fetchByYear(annee, {
                success: function () {
                    var content = {};
                    var fillIn = edition.attributes[page];
                    content[page] = fillIn;
                    content['year'] = annee;
                    console.log(content);
                    POPUP.empty();
                    POPUP.append(JST[page](content));
                    $(" nav.edition_menu").css("display", "block");
                    $(" nav.edition_menu ul").addClass('isHidden');
                    console.log(page)
                    $("nav.edition_menu li a[data-page="+ page +"]").addClass("current_page");
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
                        if (!_.isNull(article)){
                            $('#popup .columns').empty();
                            var contentArticle = {};
                            contentArticle['article'] = edition.attributes.actualites[article-1];
                            contentArticle['year'] = annee;
                            $('#popup .columns').append(JST['actualite_zoom'](contentArticle));
                            $('footer.actualite_footer').hide();
                        }
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