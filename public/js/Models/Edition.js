/**
 * Created by Léa on 03/06/2017.
 */
var ModelEdition = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (!_.isNumber(attrs.annee)) {
            msg += 'L\'année doit être renseignée \n';
        }
        if (_.isEmpty(attrs.nomEquipe)) {
            msg += 'Le nom d\'équipe doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlImageMedia)) {
            msg += 'L\'url image media doit être renseignée\n';
        }
        if (_.isEmpty(attrs.urlImageEquipe)) {
            msg += 'L\'url image equipe doit être renseignée\n';
        }
        if (_.isEmpty(attrs.lieu)) {
            msg += 'Le lieu doit être renseigné\n';
        }
        if (_.isUndefined(attrs.dateDebut)) {
            msg += 'La date de début doit être renseigné\n';
        }
        if (_.isUndefined(attrs.dateFin)) {
            msg += 'La date de fin doit être renseigné\n';
        }
        // Validation des types de champs

        if (attrs.annee.toString().length != 4 ) {
            msg += 'L\'année doit être composée de 4 chiffres\n';
        }

        if (!_.isString(attrs.nomEquipe)) {
            msg += 'Le nom d\'équipe doit être une string\n';
        }
        if (!_.isString(attrs.lieu)) {
            msg += 'Le lieu doit être une string\n';
        }
        if (!_.isDate(attrs.dateDebut)) {
            msg += 'La date de début doit avoir un format date\n';
        }
        if (!_.isDate(attrs.dateFin)) {
            msg += 'La date de fin doit avoir un format date\n';
        }
        if (!_.isBoolean(attrs.publie)) {
            msg += 'publie doit etre un boolean\n';
        }

        // validation contraint integration

        if (attrs.dateFin < attrs.dateDebut){
            msg += 'La date de fin doit être posterieure à la date de debut\n';

        }
        return msg;
    }
})
