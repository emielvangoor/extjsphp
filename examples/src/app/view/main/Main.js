Ext.define('extphp.view.main.Main', {
    extend: 'Ext.panel.Panel',
    xtype: 'app-main',

    requires: [
        'Ext.plugin.Viewport',
        'extphp.view.main.MainController',
        'extphp.view.main.MainModel'
    ],

    controller: 'main',
    viewModel: 'main',

    layout: 'fit',

    dockedItems: [
        {
            xtype: 'toolbar',
            dock: 'top',
            items: [
                {
                    xtype: 'label',
                    text: 'Sample'
                },
                {
                    xtype: 'segmentedbutton',
                    reference: 'sample',
                    listeners: {
                        toggle: 'onSampleChange'
                    },
                    items: [
                        { text: 'Hbox with splitter', value: 'sample1' },
                        { text: 'Vbox example', value: 'sample2' },
                        { text: 'Login form', value: 'login' }
                    ]
                }
            ]
        }
    ]
});
