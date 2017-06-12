/**
 * Created by Léa on 05/06/2017.
 */
var ModelMedias = Hydrotech.Collection.extend({
    model: ModelMedia,
    url: 'api/v1/medias',
    initialize: function () {
        this.on("change add remove", this.log);
    },
    comparator: function (model) {
        return -model.get("date");
    },
    breakByType: function (models){
        var photos = [];
        var videos = [];
        var returnVal = [];
        _.each(models, function(content){
            if (content.attributes.typeMedia == 'Video'){
                videos.push(content);
            }
            if (content.attributes.typeMedia == 'Photo'){
                photos.push(content);
            }
        });
        returnVal['videos'] = videos;
        returnVal['photos'] = photos;
        console.log(returnVal);
        return returnVal;
    }

});
