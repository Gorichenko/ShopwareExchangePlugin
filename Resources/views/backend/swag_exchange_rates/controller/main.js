// {namespace name="backend/swag_exchange_rates/main"}
// {block name="backend/swag_exchange_rates/controller/main"}
Ext.define('Shopware.apps.SwagExchangeRates.controller.Main', {
    extend: 'Enlight.app.Controller',

    init: function() {
        var me = this;
        me.mainWindow = me.getView('list.Window').create().show();
    }
});
// {/block}
