/**
 * Created by timdlp on 06.06.17.
 */
var MainRouter = Hydrotech.Router.extend({
    routes:{
        '' : 'index',
        'editions/:annee/:page(/:article)(/)' :'editions',
        'r/:controler/:action' : 'dispatcher'
    },
    dispatcher: function(controler,action){
    window['Ctrl'+controler][action]();
    },
    index: function(){
        $("section").show();
        $("section#popup").hide();

    },
    editions: function(annee,page){
        window['CtrlEditions']['show'](annee,page);
    }
});