Ext.define('Shopware.apps.SwagExchangeRates.model.Currency', {
    extend: 'Shopware.data.Model',

    configure: function() {
        return {
            controller: 'SwagExchangeRates',
            detail: 'Shopware.apps.SwagExchangeRates.view.detail.Currency'
        };
    },

    fields: [
        { name : 'id', type: 'int' },
        { name : 'baseName', type: 'string' },
        { name : 'additionalName', type: 'string' },
        { name : 'buyRate', type: 'decimal' },
        { name : 'saleRate', type: 'decimal' },
    ]
});