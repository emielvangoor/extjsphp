Ext.application({
    name: 'extphp',

    extend: 'extphp.Application',

    requires: [
        'extphp.view.main.Main'
    ],
    mainView: 'extphp.view.main.Main'
});
