/**
 * Created by Léa on 03/06/2017.
 */
var ModelEdition = Hydrotech.Model.extend({
    urlRoot: '/api/v1/editions',
    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.annee)) {
            msg += 'L\'année doit être renseigné\n';
        }
        if (_.isEmpty(attrs.nomEquipe)) {
            msg += 'Le nom d\'équipe doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlImageMedia)) {
            msg += 'L\'url image media doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlImageEquipe)) {
            msg += 'L\'url image equipe doit être renseigné\n';
        }
        if (_.isEmpty(attrs.lieu)) {
            msg += 'Le lieu doit être renseigné\n';
        }
        if (_.isEmpty(attrs.dateDebut)) {
            msg += 'La date de début doit être renseigné\n';
        }
        if (_.isEmpty(attrs.dateFin)) {
            msg += 'La date de fin doit être renseigné\n';
        }
        if (_.isEmpty(attrs.dateFin)) {
            msg += 'La date de fin doit être renseigné\n';
        }
        // Validation des types de champs

        if (attrs.annee.length = 4 ) {
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

        if (!(attrs.dateFin > attrs.dateDebut)){
            msg += 'La date de fin doit être posterieur a la date de debut\n';

        }
        return msg;
    },
    fetchByYear: function(attributes, callbacks) {

        var queryString = attributes;
        queryString = '/'+queryString;
        var self = this;

        $.ajax({
            url: this.urlRoot+queryString,
            type: 'GET',
            dataType: "json",
            success: function(data) {
                self.set(data);
                callbacks.success();
            },
            error: function(data){
                callbacks.error();
            }
        });
    }
})
