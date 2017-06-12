/**
 * Created by timdlp on 07.06.17.
 */
var ModelEditions = Hydrotech.Collection.extend({
    url: '/api/v1/editions',
    model: ModelEdition,
    initialize: function () {
        this.on("change add remove", this.log);
    },
    comparator: function (model) {
        return model.get('datePublication');
    }

})