/**
 * Created by timdlp on 02.06.17.
 */
var ModelCategorieSponsor = Hydrotech.Model.extend({
    validate: function (attrs,options){
        var msg = "";
        if (_.isEmpty(attrs.nom) || !_.isString(attrs.nom)){
            msg += "Le nom doit être du texte et ne pas être vide ! \n";
        }
        if (_.isEmpty(attrs.description) || !_.isString(attrs.nom)){
            msg += "La description doit être du texte et ne pas être vide ! \n";
        }
        return msg;
    }
});