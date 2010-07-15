document.addEvent('domready', function() {

    dbug.enable();
    dbug.log('Preloading paste.js');

    // Beta link to toggle beta div.
    if ( $('beta_div') ) {
        dbug.log('Handler: beta_link');
        var BetaDrawer = new Fx.Slide("beta_div");
        BetaDrawer.hide();

        $('beta_link').addEvent('click', function(e){
            e.stop();
            BetaDrawer.toggle();
        });
    }

    dbug.log('Handler: PRE Lighter');
    // Highlight all "pre" elements in a document
    $$('pre').light({ altLines: 'hover', mode: 'div' });

});
