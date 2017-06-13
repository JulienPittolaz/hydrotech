/**
 * Created by Léa on 08/06/2017.
 */


var ModelSponsors = Hydrotech.Collection.extend({
    url: 'api/v1/sponsors',

    model: ModelSponsor,
    initialize: function () {
        this.on("change add remove", this.log);
    }
})