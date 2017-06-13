function manageArticles(){
    var size_articles = $(".columns article").length;
    x = 4;
    $('.columns article.actualite:lt('+x+')').show();
    _.each($('.actualite_contenu'), function(actu){
        var href = document.location.href;
        var articleId = $(actu.parentElement).attr("data-id");
        if (href.substr(href.length -1) == '/'){
            href = href.substr(0,href.length-1);
        }
        $(actu).html($(actu).html().substring(0,160)+"… "+"<div class='view-more'>Lire la suite</div>");
    });
    $(".view-more").on('click',function(){
        $('.actualite').hide();
        var superCool = this.parentElement.parentElement;
        var idArticle = $(superCool).data('id');
        var selecteurArticle = '.actualite_zoom_'+idArticle;
        var currentLoc = window.location.href;
        $(selecteurArticle).show('slow');
    });
    $('.btn_actualite_zoom').on('click', function () {
        $(this.parentElement).hide();
        $('.actualite').show();

    });
    $(".actualite_footer").on('click',function(){
        x= (x+4 <= size_articles) ? x+4 : size_articles;
        $('.columns article.actualite:lt('+x+')').show('slow');
    });

}