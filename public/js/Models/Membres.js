/**
 * Created by timdlp on 04.06.17.
 */
var ModelMembres = Hydrotech.Collection.extend({
    url:'/membre/',
    model: ModelMembre,
    comparator: function(m1,m2){
        return m1.get("nom").localeCompare(m2.get("nom"));
    },
    initialize: function(){
        this.on("change add remove",this.log);
    }
});