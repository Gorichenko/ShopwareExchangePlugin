// {block name="backend/swag_exchange_rates/app"}
Ext.define('Shopware.apps.SwagExchangeRates', {
    extend: 'Enlight.app.SubApplication',
    name: 'Shopware.apps.SwagExchangeRates',

    /**
     * Enable bulk loading
     *
     * @type { Boolean }
     */
    bulkLoad: true,

    /**
     * Sets the loading path for the sub-application.
     *
     * @type { String }
     */
    loadPath: '{url action="load"}',

    /**
     * @type { Array }
     */
    controllers: [
        'Main'
    ],

    /**
     * @type { Array }
     */
    models: [
        'Currency'
    ],

    /**
     * @type { Array }
     */
    stores: [
        'Main'
    ],

    /**
     * @type { Array }
     */
    views: [
        'list.Window',
        'list.Currency',
        'detail.Window',
        'detail.Currency'
    ],

    /**
     * @returns { Shopware.apps.SwagExchangeRates.view.Window }
     */
    launch: function() {
        var me = this,
            settingsController = me.getController('Main');

        return settingsController.mainWindow;
    }
});
// {/block}
