/**
 * Created by Léa on 03/06/2017.
 */
var ModelSponsor = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.nom)) {
            msg += 'Le nom doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlLogo)) {
            msg += 'L\'url du logo doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlSponsor)) {
            msg += 'L\'unr du sponsor doit être renseigné\n';
        }

        // Validation des types de champs

        if (!_.isString(attrs.nom)) {
            msg += 'Le nom  doit être une string\n';
        }

        if (!_.isString(attrs.urlLogo)) {
            msg += 'L\'url du logo doit être une string\n';
        }
        if (!_.isString(attrs.urlSponsor)) {
            msg += 'L\'url du sponsor doit être une string\n';
        }

        return msg;
    }
})