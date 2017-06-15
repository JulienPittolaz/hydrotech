/**
 * Created by timdlp on 14.06.17.
 */
function manageNoHashes(){
    $(window).on("popstate", function(e){
        var idPage = location.hash;
        idPage = idPage.substring(1);
        if (idPage.charAt(0) != '/'){
            $("section").show();
            $("section#popup").hide();
            var tag = $("#"+idPage+"");
            $('html,body').animate({scrollTop: tag.offset().top},'slow');
        }
        else{
            return false;
        }
    });
}