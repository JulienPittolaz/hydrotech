var JST = [];
_.each(TMPL, function(template,name){
  JST[name] = Handlebars.compile(template);
  Handlebars.registerPartial(name, template);
});
Handlebars.registerHelper("toHuman", function(timestamp) {
     return (new Date(timestamp)).toLocaleDateString();
});
Handlebars.registerHelper('isVideo', function (block){
    if(this.typeMedia == "Video"){
        return block.fn(this)
    } else {
        return block.inverse(this);
    }
});
Handlebars.registerHelper('urlToEmbed', function (url) {
    var returnValue = url.replace(/(?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g,"//www.youtube.com/embed/$1");
    console.log(returnValue);
    return returnValue;
});

Handlebars.registerHelper('isValid', function (block) {
    if(this.sponsor) {
        return block.fn(this);
    } else {
        return block.inverse(this);
    }
});

Handlebars.registerHelper('hasPrixs', function (block) {
    if(this.prixs.length > 0) {
        return block.fn(this);
    } else {
        return block.inverse(this);
    }
});