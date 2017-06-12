var Hydrotech = {
    Model: Backbone.Model.extend({
        log: function (){
            console.log(this.attributes);
        },
        undo: function (){
            this.attributes = this.previousAttributes();
        }
    }),
    View: Backbone.View.extend({
        initialize: function (options){
            this.tmpl = JST[options.template];
            this.listenTo(this.model, 'change', this.render);
            this.render();
        },
        render: function(){
            var dom = this.tmpl(this.model.attributes);
            this.$el.html(dom);
            return this.$el;
        }
    }),
    ViewCollection: Backbone.View.extend({

    }),
    Collection: Backbone.Collection.extend({
        log: function (){
            console.log(JSON.parse(JSON.stringify(this)));
        }
    }),
    Router: Backbone.Router.extend({

    })
};
