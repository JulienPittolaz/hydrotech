/**
 * Created by Léa on 03/06/2017.
 */
var ModelMedia = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.url)) {
            msg += 'L\'url doit être renseigné\n';
        }
        if (_.isEmpty(attrs.titre)) {
            msg += 'Le titre doit être renseigné\n';
        }


        // Validation des types de champs

        if (!_.isString(attrs.titre)) {
            msg += 'Le titre doit être une string\n';
        }
        if (!_.isString(attrs.auteur)) {
            msg += 'L\'auteur doit être une string\n';
        }
        if (!_.isDate(attrs.date)) {
            msg += 'La date doit être au format date\n';
        }

        // on doit gérer si c'est une photo ou une video et renvoyer à la BD
        // faudra faire un creat avec l'attribut typeMedia à photo ou video

        return msg;
    }
})