/**
 * Created by Léa on 02/06/2017.
 */
var ModelUtilisateur = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.adresseMail)) {
            msg += 'L\'adresse mail doit être renseigné\n';
        }
        if (_.isEmpty(attrs.motDePasse)) {
            msg += 'Le mot de passe doit être renseigné\n';
        }
        if (_.isEmpty(attrs.nomComplet)) {
            msg += 'Le nom complet doit être renseignée\n';
        }

        // Validation des types de champs
        var emailRegex = '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,20}$';
        if (!attrs.adresseMail.match(emailRegex)) {
            msg += 'L\'adresse mail n\'est pas valide\n';
        }
        if (!_.isString(attrs.nomComplet)) {
            msg += 'Le nom complet doit être une string\n';
        }
        if (attrs.motDePasse.length < 6) {
            msg += 'Le mot de passe doit contenir plus de 6 caractères \n';
        }

        return msg;
    }
})
