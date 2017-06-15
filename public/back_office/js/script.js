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
            },
            'urlLogo':{
                required:true
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

    $('#membre-form').validate({
        rules: {
            'adresseMail': {
                required: true,
                email: true
            },
            'nom': {
                required: true
            },
            'prenom': {
                required: true
            },
            'dateNaissance': {
                required: true,
                date:true
            },
            'section': {
                required: true
            },
            'description': {
                required: true
            },
            'photoProfil': {
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
    $('#media-form-edit').validate({
        rules: {
            'titre': {
                maxlength: 30
            },
            'date': {
                date: true
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
                required: true
            },
            'auteur': {
                required: true
            },
            'publie': {
                required: true
            },
            'urlImage': {
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
    $('#actualite-form-edit').validate({
        rules: {
            'titre': {
                maxlength: 30
            },
            'datePublication': {
                date: true

            },
            'contenu': {
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

    $('#edition-form-edit').validate({
        rules: {
            'annee': {
                digits: 4
            },
            'dateDebut': {
                date: true
            },
            'dateFin': {
                date: true
            },
            'description': {
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
    $('#user-form-edit').validate({
        rules: {
            'email': {
                email: true
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



    $('#Video').on('click',function () {
        $('.mediaUpload').empty();
        $('.mediaUpload').append("<div class='form-group form-float'><div class='form-line'><label for='url'>url</label><label for='url'>Icône du fichier (JPG ou MP4) :</label><br /><input type='url' name='url' id='url' /><br /></div></div>");
    });
    $('#Photo').on('click',function () {
        $('.mediaUpload').empty();
        $('.mediaUpload').append("<label for='url'>url</label><label for='url'>url de la video :</label><br /><input type='file' name='url' id='url' /><br />");
    });





































































































































































    var $oldSponsor = $('#oldPhoto').val() || null;
    $('#image-cropper-sponsor-logo').cropit({
        smallImage: 'stretch',
        maxZoom: '2',
        imageState: {
            src: $oldSponsor,
        },
        width: 300,
        height: 168
    });

    $('#sponsor-form input[type=submit]').on('click', function(e) {
        e.preventDefault();
        var imageData = $('#image-cropper-sponsor-logo').cropit('export',{
            type: 'image/jpeg',
            quality: .9,
        });
        $('#urlLogo').val(imageData);
        $('#sponsor-form').submit();
    });

    var $oldEdition = $('#oldPhoto').val() || null;
    $('#image-cropper-edition-background').cropit({
        smallImage: 'stretch',
        maxZoom: '2',
        width: 400,
        height: 225,
        imageState: {
            src: $oldEdition,
        }
    });

    $('#edition-form input[type=submit]').on('click', function(e) {
        e.preventDefault();
        var imageData = $('#image-cropper-edition-background').cropit('export',{
            type: 'image/jpeg',
            quality: .7,
            exportZoom: 4
        });
        $('#urlImageMedia').val(imageData);
        $('#edition-form').submit();
    });

    var $oldMembre = $('#oldPhoto').val() || null;
    $('#image-cropper-membre').cropit({
        smallImage: 'stretch',
        maxZoom: '2',
        width: 320,
        height: 396,
        imageState: {
            src: $oldMembre,
        }
    });

    $('#membre-form input[type=submit]').on('click', function(e) {
        e.preventDefault();
        var imageData = $('#image-cropper-membre').cropit('export',{
            type: 'image/jpeg',
            quality: .7
        });
        $('#photoProfil').val(imageData);
        $('#membre-form').submit();
    });

    var $oldActualite = $('#oldPhoto').val() || null;
    $('#image-cropper-actualite').cropit({
        smallImage: 'stretch',
        maxZoom: '2',
        width: 400,
        height: 225,
        imageState: {
            src: $oldActualite,
        }
    });

    $('#actualite-form input[type=submit]').on('click', function(e) {
        e.preventDefault();
        var imageData = $('#image-cropper-actualite').cropit('export',{
            type: 'image/jpeg',
            quality: .7,
            exportZoom: 4
        });
        $('#urlImage').val(imageData);
        $('#actualite-form').submit();
    });





});
