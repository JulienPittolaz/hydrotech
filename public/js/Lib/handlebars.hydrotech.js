var JST = [];
_.each(TMPL, function(template,name){
  JST[name] = Handlebars.compile(template);
  Handlebars.registerPartial(name, template);
});
Handlebars.registerHelper("toHuman", function(timestamp) {
     return (new Date(timestamp)).toLocaleDateString();
});
Handlebars.registerHelper('filterByType' function (object){
    var photos = [];
    var videos = [];
    var returnVal = [];
    _.each(object, function(content){
        if (content.typeMedia == 'Video'){
            videos.push(content);
        }
        if (content.typeMedia == 'Photo'){
            photos.push(content);
        }
    });
    returnVal['videos'] = videos;
    returnVal['photos'] = photos;
    return returnVal;

});
