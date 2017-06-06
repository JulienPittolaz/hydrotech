/**
 * Created by timdlp on 06.06.17.
 */
var MainRouter = Hydrotech.Router.extend({
    routes:{
        '' : 'index',
        'editions/:annee/:page(/)' : 'editions',

    },
    index: function(){
    $("#popup").append("<div>").html(JST['actualites']({actualites:CURRENT_ED.actualites}));
    },
    editions: function(annee,page){
    $("#popup").empty().append("<div>").html(JST['membres']({membres:CURRENT_ED.membres})) ;
    $("#popup").prepend("<div class='chenit'>"+annee+" "+page+"</div>");
    }
});