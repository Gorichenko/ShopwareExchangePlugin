Ext.define('Shopware.apps.SwagExchangeRates.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.currency-list-window',
    height: 450,
    title : '{s name=window_title}Currency rate{/s}',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.SwagExchangeRates.view.list.Currency',
            listingStore: 'Shopware.apps.SwagExchangeRates.store.Main'
        };
    }
});