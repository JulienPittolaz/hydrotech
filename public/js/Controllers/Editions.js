/**
 * Ce controller a pour but la gestion de toutes les pages rattachées à une édition
 *
 * Created by timdlp on 06.06.17.
 */

var CtrlEditions = {
    //Fonction de gestion de l'affichage
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
                    var actusArray = CURRENT_ED.actualites;
                    var actuFound = $.grep(actusArray, function(n,i){
                        return n.id == article;
                    });
                    if (_.isEmpty(actuFound)){
                        showErrorPage(POPUP);

                    }else{
                        contentArticle['article'] = actuFound[0];
                        contentArticle['year'] = annee;
                        $('#popup .columns').append(JST['actualite_zoom'](contentArticle));
                        $('footer.actualite_footer').hide();
                    }
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
                            var actusArray = edition.attributes.actualites;
                            var actuFound = $.grep(actusArray, function(n,i){
                                return n.id == article;
                            });
                            contentArticle['article'] = actuFound[0];
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
                    showErrorPage(POPUP);
                }
            });

        }
    }
}