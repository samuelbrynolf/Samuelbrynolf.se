// Modal image, Version: 1.0
// ---------------------------------------------

(function( $, document ) {
    $.fn.modal_image = function(options) {
        var settings = $.extend({
            modal_ID : 'js-image_modal',
            close_ID : 'js-modal_close',
            close_text: 'Close',
            showClass: 's-is-visible'
        }, options );

        var modal,
            close_button,
            image;

        if(this.length){
            // Set no-follow links
            this.attr('rel', 'nofollow');

            // Create and append modal
            modal = document.createElement('div');
            modal.setAttribute('id', settings.modal_ID);
            document.body.appendChild(modal);
            modal = $('#'+settings.modal_ID);

            // Create and append close-button
            close_button = document.createElement('button');
            close_button.setAttribute('id', settings.close_ID);
            close_button.innerHTML = settings.close_text;
            close_button = $(close_button);
            modal.append(close_button);

            // Create and append image
            image = new Image();
            image.className = 'js-modal_img';
            modal.append($(image));
        }

        this.bind('tap', function(e){
            image.src = $(this).attr('href');
            modal.addClass(settings.showClass);
            e.preventDefault();
        });

        modal.bind('tap', function(){
            modal.removeClass(settings.showClass);
        });

        return this;

    };
}( jQuery, document ));