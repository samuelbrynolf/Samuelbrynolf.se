// bui Expandsection, Version: 1.0
// ---------------------------------------------

(function( $ ) {
    $.fn.expandSection = function(options) {

        var settings = $.extend({
            timeout: 0,
            divideBy: 3,
            expandText: 'Show more'
        }, options );

        this.each(function(){

            var $this = $(this);
            $this.addClass('m-expand-section');

            setTimeout(function(){
                var fullHeight = $this.innerHeight();
                var expandButton = $('<button class="a-expand-section__button">'+settings.expandText+'</button>');

                $this.css('max-height', fullHeight/settings.divideBy);
                expandButton.insertAfter($this);

                expandButton.bind('tap', function(){
                    var $this = $(this);
                    $this.prev(this).css('max-height', fullHeight).addClass('s-is-expanded');
                    $this.addClass('s-is-hidden');
                });

            }, settings.timeout);
        });

        return this;

    };
}( jQuery ));


// End bui Expandsection
// ---------------------------------------------