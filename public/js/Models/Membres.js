/**
 * Created by timdlp on 04.06.17.
 */
var ModelMembres = Hydrotech.Collection.extend({
    url:'/api/v1/membres',
    model: ModelMembre,
    comparator: function(m1,m2){
        return m1.get("nom").localeCompare(m2.get("nom"));
    }
});