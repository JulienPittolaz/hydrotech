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
            $('.formulaireContact1').hide('fast');
            $('.formulaireContactSuite').show();
        });
        $('section#popup').show();

        $(".popup_cross").on("click", function () {
            $('section').show();
            $('section#popup').hide();
        });
        $('.send_email').on('click',CtrlContact.validate);
    },
    validate: function(data){
        console.log("Validation");
    }
}