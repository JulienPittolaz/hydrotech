/**
 * Created by timdlp on 07.06.17.
 */
var ModelEditions = Hydrotech.Collection.extend({
    url: 'api/v1/editions',
    model: ModelEdition,
    comparator: function (model) {
        return model.get('datePublication');
    }

})