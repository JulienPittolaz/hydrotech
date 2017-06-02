/**
 * Created by timdlp on 02.06.17.
 */
// Model pour l'article de presse
var ModelArticleDePresse = Hydrotech.Model.extend({
    //Fonction de validation
    // @params: attrs, options
    // return un msg d'erreur ou rien
    validate: function(attrs,options){
        msg = "";
        //Validation url
        if(_.isEmpty(attrs.url) || !_.isString(attrs.url)){
            msg += "L'url doit être composée de texte !\n";
        }
        //Validation titreArticle
        if(_.isEmpty(attrs.titreArticle) || !_.isString(attrs.titreArticle)){
            msg += "Le titre doit être renseigné !\n";
        }
        //Validation description
        if(_.isEmpty(attrs.description) || !_.isString(attrs.description)){
            msg += "La description doit être renseignée !\n";
        }
        //Validation date
        if(!_.isDate(attrs.date)) {
            console.log(attrs.date);
            msg += "La date doit être renseignée !\n";
        }
        //Validation nomPresse
        if(_.isEmpty(attrs.nomPresse) || !_.isString(attrs.nomPresse)){
            msg += "Le nomPresse doit être renseigné !"
        }
        return msg;
    }
});
