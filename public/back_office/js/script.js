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
                required: true,
                date: true

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

    $('#actualite-form').validate({
        rules: {
            'titre': {
                required: true,
                maxlength: 30
            },
            'datePublication': {
                required: true,
                date: true

            },
            'contenu': {
                required: true,
                maxlength: 500
            },
            'auteur': {
                required: true
            },
            'publie': {
                required: true
            },
            'urlImage': {
                required: true,
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

    $('#social-form').validate({
        rules: {
            'nom': {
                required: true,
                maxlength: 30
            },
            'url': {
                required: true,
                url: true
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
    $('#edition-form').validate({
        rules: {
            'annee': {
                required: true,
                digits: 4
            },
            'nomEquipe': {
                required: true,
            },
            'urlImageMedia': {
                required: true,
                url: true
            },
            'urlImageEquipe': {
                required: true,
                url: true
            },
            'lieu': {
                required: true,
            },
            'dateDebut': {
                required: true,
                date: true
            },
            'dateFin': {
                required: true,
                date: true
            },
            'description': {
                required: true,
                maxlength: 500
            },
            'publie': {
                required: true,
            },
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
    $('#user-form').validate({
        rules: {
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true
            },
            'name': {
                required: true,
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






































































































































































    $('.image-editor').cropit();

/*
    $('#cropform-button').click(function(e) {
        e.preventDefault();
        console.log('coucou');
        // Move cropped image data to hidden input
        var imageData = $('.image-editor').cropit('export');
        $('.hidden-image-data').val(imageData);
        console.log($(this).parent().parent());
        // Print HTTP request params
        var formValue = $(this).parent().parent().serialize();
        $('#result-data').text(formValue);

        // Prevent the form from actually submitting
        return false;
    });

*/







});
