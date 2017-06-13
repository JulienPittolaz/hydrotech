function manageArticles(){
    var size_articles = $(".columns article").length;
    x = 4;
    $('#popup .columns article.actualite:lt('+x+')').show();
    console.log(x,size_articles);
    if (x >= size_articles){
        $('.actualite_footer').hide();
    }
    _.each($('.actualite_contenu'), function(actu){
        var href = document.location.href;
        var articleId = $(actu.parentElement).attr("data-id");
        if (href.substr(href.length -1) == '/'){
            href = href.substr(0,href.length-1);
        }
        var viewMoreUrl = href+"/"+articleId;
        $(actu).html($(actu).html().substring(0,160)+"… "+"<div class='view-more'><a href='"+viewMoreUrl+"'>Lire la suite</a></div>");
    });
    $(".view-more a").on('click',function(){
        $('.actualite').hide();
        $('a.btn_actualite_zoom').attr('href','http://pingouin.heig-vd.ch/');

    });


    $(".actualite_footer").on('click',function(){
        x= (x+4 <= size_articles) ? x+4 : size_articles;
        $('#popup .columns article.actualite:lt('+x+')').show('slow');
        console.log(x);
        if (x == size_articles){
            $('.actualite_footer').hide();
        }
    });

}