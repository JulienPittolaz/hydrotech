/**
 * Created by timdlp on 06.06.17.
 */
var MainRouter = Hydrotech.Router.extend({
    routes:{
        '' : 'index',
        'editions(/:annee)(/:page)' :'editions',
        'r/:controler/:action' : 'dispatcher'
    },
    dispatcher: function(controler,action){
    window['Ctrl'+controler][action]();
    },
    edition: function(annee,page){
        console.log(annee,page);
    },
    index: function(){
    $("#popup").append("<div>").html(JST['actualites']({actualites:CURRENT_ED.actualites}));
    },
    editions: function(annee,page){
        window['Ctrleditions']
    }
});