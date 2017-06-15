/**
 * Created by timdlp on 11.06.17.
 */
var CtrlContact = {
    contact: function(){
        var POPUP = $("#popup .popup_content");
        $('section').hide();
        POPUP.empty();
        POPUP.append(JST['contact']());
        $('.formulaireContactSuite').hide();
        $('.btnFirstPage').on('click', function (){
            $('#pageDynamicTitle').html($(this).html());
            $('.formulaireContact1').hide();
            $('.formulaireContactSuite').show();
        });
        $('section#popup').show();

        $(".popup_cross").on("click", function () {
            $('section').show();
            $('section#popup').hide();
        });
        $('.btn_send_email').on('click',CtrlContact.validate);
        $('.btn_back').on('click',function(){
            $('.formulaireContactSuite').hide();
            $('.formulaireContact1').show();

        });

    },
    validate: function(data){
        var fields = [];
        _.each($('.ctf_field'), function(data){
            fields.push($(data).val());
        });
        console.log(fields);

    }
}