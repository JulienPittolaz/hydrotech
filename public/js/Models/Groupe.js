/**
 * Created by Léa on 02/06/2017.
 */
var ModelGroupe = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.nom)) {
            msg += 'L\'adresse mail doit être renseigné\n';
        }
        if (_.isEmpty(attrs.description)) {
            msg += 'Le mot de passe doit être renseigné\n';
        }


        // Validation des types de champs

        if (!_.isString(attrs.nom)) {
            msg += 'Le nom  doit être une string\n';
        }

        if (!_.isString(attrs.description)) {
            msg += 'La description doit être une string\n';
        }


        return msg;
    }
})

