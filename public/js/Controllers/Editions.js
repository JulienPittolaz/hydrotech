/**
 * Created by timdlp on 06.06.17.
 */

var CtrlEditions = {
    show: function (annee, page) {
        var POPUP = $("#popup .popup_content");
        console.log(POPUP)
        if (annee == CURRENT_ED.annee) {
            var content = {};
            var fillIn = CURRENT_ED[page];
            content[page] = fillIn;
            content['year'] = annee;
            POPUP.empty();
            POPUP.append(JST[page](content));
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