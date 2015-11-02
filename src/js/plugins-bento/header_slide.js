(function( $, document ) {
    $.fn.header_slide = function(options) {
        var settings = $.extend({
            navup_class : 's-is-up',
            navdown_class : 's-is-down',
            timeout : '250',
            delta : 25,
            // callback: function(){},
            disable: function(){ return false; }
        }, options );

        function hasScrolled() {
            var st = mywindow.scrollTop();

            if(Math.abs(lastScrollTop - st) <= settings.delta)
                return;

            if (st > lastScrollTop && st > navbarHeight){
                header.removeClass(settings.navdown_class).addClass(settings.navup_class);
            } else {
                if(st + mywindow.height() < mydoc.height()) {
                    header.removeClass(settings.navup_class).addClass(settings.navdown_class);
                }
            }
            lastScrollTop = st;
        }

        var header = this;

        if(header.length){
            var didScroll,
                lastScrollTop = 0,
                navbarHeight = header.outerHeight(),
                mywindow = $(window),
                mydoc = $(document);

            setInterval(function() {
                if (didScroll) {
                    if(!settings.disable()){
                        hasScrolled();
                    }
                    didScroll = false;
                }
            }, settings.timeout);

            mywindow.on('scroll', function(e){
                didScroll = true;
            });

            return this;
        }
    };
}( jQuery, document ));