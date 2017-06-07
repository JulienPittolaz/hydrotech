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
            edition.fetchByYear(annee,{success: function(){
                var content = {};
                var fillIn = edition.attributes[page];
                content[page] = fillIn;
                console.log(fillIn);
                $("#popup").empty();
                $("#popup").append(JST[page](content));
            },
            error: function(){
                $("#popup").empty();
                $("#popup").append("<h1>Not Found</h1>");
            }});

        }
    }
}