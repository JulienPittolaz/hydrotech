/**
 * Created by Léa on 05/06/2017.
 */
var ModelArticlesDePresse = Hydrotech.Collection.extend({
    url: '/api/v1/presses',
    model: ModelArticleDePresse,
    initialize: function () {
        this.on("change add remove", this.log);
    },
    comparator: function (model) {
        return -model.get("date");
    }

})