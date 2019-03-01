;(function($, window) {
    'use strict';
    $.plugin('rateParser', {

        init: function() {
            var me = this;
            var content = JSON.parse(me.$el.html());
            me.$el.html('');
            $.each(content, function(i, item){
                me.$el.append('<section class="rates_excahanger">' +
                    '<span class="ccy_title ccy">'+ item.base_name +'</span> <b> - </b> <span class="ccy_title base_ccy">'+ item.additional_name+'</span></br>' +
                    '<b class="current_rate byu_rate">Buy: '+ item.buy_rate +'</b>&nbsp &nbsp<b class="current_rate sale_rate">Sale: '+ item.sale_rate +'</b>' +
                    '</section>');
            });


            me.applyDataAttributes();

            me._on(me.$el, 'click', function(event) {
                event.preventDefault();

                if(me.$el.is('plugin-example')) {

                    /**
                     * Now we're accessing the merged configuration of the plugin using
                     * the variable "this.opts".
                     */
                    me.$el.toggleClass(me.opts.activeCls);
                }
            });
        },

        destroy: function() {
            var me = this;
        }
    });

    $.plugin('updateRate', {

        init: function() {
            var me = this;

            me.applyDataAttributes();

            me._on(me.$el, 'click', function(event) {

                    $.ajax({
                        method: 'GET',
                        url: 'http://localhost/shopware/updateRate',
                        success: function(data){
                            $('.rates').html('');
                            $.each(data, function(i, item){
                                $('.rates').append('<section class="rates_excahanger">' +
                                    '<span class="ccy_title ccy">'+ item.ccy +'</span> <b> - </b> <span class="ccy_title base_ccy">'+ item.base_ccy+'</span></br>' +
                                    '<b class="current_rate byu_rate">Buy: '+ item.buy +'</b>&nbsp &nbsp<b class="current_rate sale_rate">Sale: '+ item.sale +'</b>' +
                                    '</section>');
                            });
                        },
                        error: $.proxy(me.ajaxRequestCallbackError, me)
                    });
            });
        },

        destroy: function() {
            var me = this;
        }
    });

    window.StateManager.addPlugin('.rates', 'rateParser');
    window.StateManager.addPlugin('.update_rate_btn', 'updateRate');
})(jQuery, window);
