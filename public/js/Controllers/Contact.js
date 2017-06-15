/**
 * Created by timdlp on 11.06.17.
 */
var CtrlContact = {
    contact: function(){
        var POPUP = $("#popup .popup_content");
        $('section').hide();
        POPUP.empty();
        POPUP.append(JST['contact']());
        $('.message_error').hide();
        $('.ctf_field').removeClass('ctf_field_error');
        $('.formulaireContactSuite').hide();
        $('.btnFirstPage').on('click', function (){
            $('#pageDynamicTitle').html($(this).html());
            $('.topic_field_hidden').html($(this).html());
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
    /* Validation des champs du formulaire de contact
     *
     */
    validate: function(data){
        var fields = {};
        var error = '';
        var fieldsError = [];
        _.each($('.ctf_field'), function(data){
            var name = $(data).attr('name');
            fields[name] = $(data).val();
        });
        if (_.isEmpty(fields['nom'])){
            error += "Nom vide\n";
            fieldsError.push('nom');
        }
        if (_.isEmpty(fields['prenom'])){
            error += "prenom vide\n";
            fieldsError.push('prenom');
        }
        if (!fields['email'].match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
            fieldsError.push('email');
          }
        if (_.isEmpty(fields['sujet'])){
            fieldsError.push('sujet');
        }
        if (_.isEmpty(fields['message'])){
            fieldsError.push('message');
        }
        $('.message_error').hide();
        $('.ctf_field').removeClass('ctf_field_error');
        _.each($('.ctf_field'),function(data){
                if(fieldsError.includes($(data).attr('name'))){
                    $('.message_error').show('slow');
                    $(data).addClass('ctf_field_error');
                }
        });

        if (_.isEmpty(fieldsError)){
            CtrlContact.send(fields);
        }
        else {
            return false;
        }

    },
    send: function(data){
        console.log(data);
        $.post( "http://pingouin.heig-vd.ch/hydrotech/send/email", data , function() {
            $('.message_success').show();
            }
        );
    }
}
