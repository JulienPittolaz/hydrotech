/**
 * Created by Léa on 05/06/2017.
 */
var ModelMedias = Hydrotech.Collection.extend({
    model: ModelMedia,
    initialize: function () {
        this.on("change add remove", this.log);
    },
    comparator: function (model) {
        return -model.get("date");
    }

})
