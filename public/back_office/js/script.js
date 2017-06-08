$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    autosize($('textarea.auto-growth'));

    $('#prix-form').validate({
        rules: {
            'nom': {
                required: true
            },
            'description': {
                required: true
            },
            'montant': {
                required: true,
                number: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });

    $('#presse-form').validate({
        rules: {
            'url': {
                required: true,
                url: true
            },
            'titreArticle': {
                required: true
            },
            'dateParution': {
                required: true,
                date: true
            },
            'description': {
                required: true
            },
            'nomPresse': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });


    $('#categorie-form').validate({
        rules: {
            'nom': {
                required: true,
                maxlength: 30
            },
            'description': {
                required: true,
                maxlength: 500
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });


    $('#sponsor-form').validate({
        rules: {
            'urlLogo': {
                required: true,
                url: true
            },
            'urlSponsor': {
                required: true,
                url: true
            },
            'nom': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });


    $('#media-form').validate({
        rules: {
            'titre': {
                required: true,
                maxlength: 30
            },
            'date': {
                required: true

            },
            'url': {
                required: true,
                url: true
            },
            'auteur': {
                required: true
            },
            'typeMedia': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
});
