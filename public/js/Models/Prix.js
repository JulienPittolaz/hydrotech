/**
 * Created by timdlp on 02.06.17.
 */
var ModelPrix = Hydrotech.Model.extend({
    validate: function(attrs,options){
        msg = "";
        //Valdation du nom
        if (_.isEmpty(attrs.nom) || !_.isString(attrs.nom)){
            msg += "Le nom doit être spécifié et de format texte ! \n";
        }
        //Validation description
        if (_.isEmpty(attrs.description) || !_.isString(attrs.description)){
            msg += "La description doit être un texte et renseignée ! \n";
        }
        //Validation montant
        if (!_.isNumber(attrs.montant)){
            msg += "Le montant doit être un nombre réel positif ! \n";
        }
        return msg;
    }
});