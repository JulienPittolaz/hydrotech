var ModelReseauSocial = Hydrotech.Model.extend({

    validate: function(attrs, options) {
        var msg = '';
        // Validation des champs vides
        if (_.isEmpty(attrs.nom)) {
            msg += 'Le nom doit être renseigné\n';
        }
        if (_.isEmpty(attrs.url)) {
            msg += 'L\'url doit être renseigné\n';
        }

        // Validation des types de champs

        if (!_.isString(attrs.nom)) {
            msg += 'Le nom doit être une string\n';
        }
        return msg;
    }
})

