/**
 * Created by timdlp on 06.06.17.
 */
var Ctrleditions = {
    show: function(annee,page){
        if (annee == CURRENT_ED.annee) {
            var content = {};
            var fillIn = CURRENT_ED[page];
            content[page] = fillIn;
            $("#popup").empty();
            $("#popup").append(JST[page](content));
        } else if (annee != CURRENT_ED.annee){
            var edition = new ModelEdition();
            edition.fetchByAttributes({annee:2016},{success: function(){
                console.log(edition);
            }});
            edition.log();

        }
    }
}