var ModelMembre = Hydrotech.Model.extend({
    url: 'url_ici',
    defaults: function () {
        return {
            createdAt:  $.now()
        }
    },
    validate: function(attrs, options) {
        var msg = '';
        // Validation des champs vide
        if (!_.isEmpty(attrs.nom)) {
            msg += 'Le nom doit être renseigné\n';
        }
        if (!_.isEmpty(attrs.prenom)) {
            msg += 'Le prenom doit être renseigné\n';
        }
        if (!_.isEmpty(attrs.adresseMail)) {
            msg += 'L\'adresse mail doit être renseignée\n';
        }
        if (!_.isEmpty(attrs.dateNaissance)) {
            msg += 'La date de naissance doit être renseignée\n';
        }
        if (!_.isEmpty(attrs.section)) {
            msg += 'La section doit être renseignée\n';
        }
        if (!_.isEmpty(attrs.description)) {
            msg += 'La description doit être renseignée\n';
        }
        if (!_.isEmpty(attrs.role)) {
            msg += 'Le rôle doit être renseigné\n';
        }
        if (!_.isEmpty(attrs.photoProfil)) {
            msg += 'La photo doit être renseignée\n';
        }

        // Validation des types de champs
        var emailRegex = '^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$';
        var onlyLettersRegex = '/^[A-Za-z ]+$/';


        if (attrs.adresseMail.match(onlyLettersRegex)) {
            msg += 'L\'adresse mail n\'est pas valide\n';
        }

        if (!_.isString(attrs.section)) {
            msg += 'La section doit être une string\n';
        }
        if (!_.isString(attrs.description)) {
            msg += 'La description doit être une string\n';
        }
        if (!_.isDate(attrs.dateNaissance)) {
            msg += 'La valeur de naissance doit être une date\n';
        }
        return msg;
    }
})
