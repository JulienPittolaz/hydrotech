/**
 * Created by Léa on 03/06/2017.
 */
var ModelRessource = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.nom)) {
            msg += 'Le nom doit être renseigné\n';
        }



        // Validation des types de champs

        if (!_.isString(attrs.nom)) {
            msg += 'Le nom  doit être une string\n';
        }



        return msg;
    }
})

