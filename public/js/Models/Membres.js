/**
 * Created by Léa on 05/06/2017.
 */

var ModelMembres = Hydrotech.Collection.extend({
    url: '/api/v1/membres',

    model: ModelMembre,
    initialize: function () {
        this.on("change add remove", this.log);
    }
})