(function($) {
    $.fn.smoothScroll = function(options) {
        var settings = $.extend({
            speed : 350,
            target_offset : 0,
            highlight_target : false,
            highlight_delay : 1200
        }, options);

        this.bind('tap', function(){
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length && target || $('[name=' + this.hash.slice(1) +']'); // jQuery ???
                if (target.length) {
                    var targetOffset = target.offset().top - settings.target_offset;
                    $('html,body').animate({scrollTop: targetOffset}, settings.speed);

                    if(settings.highlight_target){

                        target.addClass('s-is-highlighted');
                        setTimeout(function(){
                            target.removeClass('s-is-highlighted');
                        }, settings.highlight_delay);

                    }
                }
            }
        });

        return this;
    };
}( jQuery ));