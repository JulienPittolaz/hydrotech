/**
 * Created by timdlp on 04.06.17.
 */
var ModelActualites = new Hydrotech.Collection.extend({
    url: '/api/v1/actualites',
    model:ModelActualite,
    comparator: function(){
        return -model.get("datePublication");
    }
});