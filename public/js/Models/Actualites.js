/**
 * Created by Léa on 05/06/2017.
 */
var ModelActualites = Hydrotech.Collection.extend({
    model: ModelActualite,
    initialize: function () {
        this.on("change add remove", this.log);
    },
    comparator: function (model) {
        return -model.get("datePublication");
    }

})