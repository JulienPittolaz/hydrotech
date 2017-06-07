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
});