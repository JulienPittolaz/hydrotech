/**
 * Created by Léa on 11/06/2017.
 */
var ModelReseauxSociaux = Hydrotech.Collection.extend({
    url: 'api/v1/socials',

    model: ModelReseauSocial,
    initialize: function () {
        this.on("change add remove", this.log);
    }
})