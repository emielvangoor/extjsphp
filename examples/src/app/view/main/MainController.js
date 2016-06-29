Ext.define('extphp.view.main.MainController', {
    extend: 'Ext.app.ViewController',
    alias: 'controller.main',

    onSampleChange: function() {
        var sample = this.lookupReference('sample') ;

        this.load(sample.getValue());
    },

    load: function(sample) {
        var vm = this.getViewModel();
        Ext.Ajax.request({
            url: '../' + sample + '.php',
            scope: this,
            success: function (xhr) {
                var data = Ext.decode(xhr.responseText);

                Ext.suspendLayouts();
                this.view.removeAll();
                this.view.add(data);
                Ext.resumeLayouts(true);
            }
        });
    }
});
