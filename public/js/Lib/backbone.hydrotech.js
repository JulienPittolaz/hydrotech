var Hydrotech = {
    Model: Backbone.Model.extend({
        log: function (){
            console.log(this.attributes);
        },
        undo: function (){
            this.attributes = this.previousAttributes();
        },
        fetchByAttributes: function(attributes, callbacks) {

            var queryString = [];
            for(var a in attributes){
                queryString.push( encodeURIComponent(a)+'='+encodeURIComponent(attributes[a]) );
            }
            queryString = '?'+queryString.join('&');
            console.log(queryString);

            var self = this;

            $.ajax({
                url: this.urlRoot+queryString,
                type: 'GET',
                dataType: "json",
                success: function(data) {
                    self.set(data);
                    callbacks.success();
                },
                error: function(data){
                    callbacks.error();
                }
            });
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
