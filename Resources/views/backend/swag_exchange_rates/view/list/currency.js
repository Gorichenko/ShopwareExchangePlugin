Ext.define('Shopware.apps.SwagExchangeRates.view.list.Currency', {
    extend: 'Shopware.grid.Panel',
    alias:  'widget.currency-listing-grid',
    region: 'center',

    configure: function() {
        return {
            detailWindow: 'Shopware.apps.SwagExchangeRates.view.detail.Window'
        };
    }
});