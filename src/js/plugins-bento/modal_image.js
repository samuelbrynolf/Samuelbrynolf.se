// Modal image, Version: 1.0
// ---------------------------------------------

(function( $, document ) {
    $.fn.modal_image = function(options) {
        var settings = $.extend({
            modal_ID : 'js-image_modal',
            close_ID : 'js-modal_close',
            close_text: 'Close',
            showClass: 's-is-visible',
            max_width_selector: 'data-max-width',
            max_width_default: '1024'
        }, options );

        var modal,
            close_button,
            image;

        if(this.length){
            var hires_screen = window.devicePixelRatio;
            this.attr('rel', 'nofollow');

            // Create and append modal
            modal = document.createElement('div');
            modal.setAttribute('id', settings.modal_ID);
            document.body.appendChild(modal);
            modal = $('#'+settings.modal_ID); // Create jQuery object

            // Create and append close-button
            close_button = document.createElement('button');
            close_button.setAttribute('id', settings.close_ID);
            close_button.innerHTML = settings.close_text;
            $(close_button).append(close_button);

            // Create and append image
            image = new Image();
            image.className = 'js-modal_img';
            modal.append($(image));
        }

        this.bind('tap', function(e){
            var width_attr = $(this).attr(settings.max_width_selector);

            // Get and use max-width from max_width_selector
            if (typeof width_attr !== typeof undefined && width_attr !== false) {
                if (hires_screen >= 2) {
                    image.style.maxWidth = width_attr/2+'px';
                } else {
                    image.style.maxWidth = width_attr+'px';
                }
            } else {
                image.style.maxWidth= settings.max_width_default+'px';
            }

            image.src = $(this).attr('href');
            modal.addClass(settings.showClass);
            e.preventDefault(e);
        });

        modal.bind('tap', function(){
            modal.removeClass(settings.showClass);
        });

        return this;

    };
}( jQuery, document ));