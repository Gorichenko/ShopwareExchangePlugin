Ext.define('Shopware.apps.SwagExchangeRates.store.Main', {
    extend:'Shopware.store.Listing',

    configure: function() {
        return {
            controller: 'SwagExchangeRates'
        };
    },
    model: 'Shopware.apps.SwagExchangeRates.model.Currency'
});