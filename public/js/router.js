/**
 * Created by timdlp on 06.06.17.
 */
var MainRouter = Hydrotech.Router.extend({
    routes:{
        '' : 'index',
        'contact(/:subject)' : 'contact',
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
    contact: function(subject){
        window['CtrlContact']['contact']();
    },
    editions: function(annee,page,article){
        window['CtrlEditions']['show'](annee,page,article);
    }
});