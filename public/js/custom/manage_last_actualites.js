/**
 * Created by timdlp on 13.06.17.
 */
function manageLatestActus(){
    var LATEST_NEWS = CURRENT_ED.actualites.slice(0,4);
    $('#globalNews').append(JST['last_actualites']({actualites:LATEST_NEWS}));
    _.each($('.latest_actualite_contenu'), function(actu){
        var href = document.location.href;
        var articleId = $(actu.parentElement).attr("data-id");
        if (href.substr(href.length -1) == '/'){
            href = href.substr(0,href.length-1);
        }
        $(actu).html($(actu).html().substring(0,160)+"… "+"<div class='latest-news-view-more'>Lire la suite</div>");
    });
}