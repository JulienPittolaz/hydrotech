/**
 * Created by timdlp on 13.06.17.
 */
function manageLatestActus(){
    var LATEST_NEWS = CURRENT_ED.actualites.slice(0,4);
    var year = CURRENT_ED.annee;
    console.log(year);
    $('#globalNews').append(JST['last_actualites']({actualites:LATEST_NEWS},{year:year}));
    _.each($('.latest_actualite_contenu'), function(actu){
        var articleId = $(actu.parentElement).attr("data-id");
        var viewMoreUrl = "#/editions/"+year+"/actualites/"+articleId;
        $(actu).html($(actu).html().substring(0,160)+"… "+"<div class='latest-news-view-more'><a href='"+viewMoreUrl+"'>Lire la suite</a></div>");
    });
}