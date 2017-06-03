var ModelActualite = Hydrotech.Model.extend({
    // url: 'url_ici',

    validate: function(attrs, options) {
        var msg = '';

        // Validation des champs vides
        if (_.isEmpty(attrs.titre)) {
            msg += 'Le titre doit être renseigné\n';
        }
        if (_.isEmpty(attrs.datePublication)) {
            msg += 'La date de publication doit être renseignée\n';
        }
        if (_.isEmpty(attrs.dateCreation)) {
            msg += 'La date de creation doit être renseignée\n';
        }
        if (_.isEmpty(attrs.contenu)) {
            msg += 'La section doit être renseigné\n';
        }
        if (_.isEmpty(attrs.description)) {
            msg += 'Le contenu doit être renseignée\n';
        }
        if (_.isEmpty(attrs.dateModification)) {
            msg += 'La date de modification doit être renseigné\n';
        }
        if (_.isEmpty(attrs.auteur)) {
            msg += 'L\'auteur doit être renseigné\n';
        }
        if (_.isEmpty(attrs.urlImage)) {
            msg += 'L\'auteur doit être renseigné\n';
        }

        // Validation des types de champs

        if (!_.isString(attrs.titre)) {
            msg += 'Le titre doit être une string\n';
        }
        if (!_.isString(attrs.contenu)) {
            msg += 'Le contenu doit être une string\n';
        }
        if (!_.isString(attrs.description)) {
            msg += 'La description doit être une string\n';
        }
        if (!_.isString(attrs.auteur)) {
            msg += 'L\'auteur doit être une date\n';
        }
        if (!_.isDate(attrs.dateModification)) {
            msg += 'La date de modification doit être une date\n';
        }
        if (!_.isDate(attrs.dateCreation)) {
            msg += 'La date de création doit être une date\n';
        }
        if (!_.isDate(attrs.datePublication)) {
            msg += 'La date de publication doit être une date\n';
        }

        // validation contraintes intégrités
        if (attrs.publie == "true") {
            attrs.datePublication <= Date.now()
        } else {
            msg += ' la date de publication doit être antérieure ou égale à la date d\'aujourdhui \n';
        }

        //Si une actualité est créée, alors sa date de publication est postérieure à sa date de création
        if (!(attrs.datePublication > attrs.dateCreation)){
            msg += 'La date de publication doit être postérieure à la date de création \n';
        }

        //Si une actualité est crée, alors sa date de modification est postérieure à sa date de création
        if (!(attrs.dateModification > attrs.dateCreation)){
            msg += 'La date de modification doit être postérieure à la date de création \n';
        }


        return msg;
    }
})
