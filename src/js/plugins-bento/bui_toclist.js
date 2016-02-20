// Toclist, Version: 1.0
// ---------------------------------------------

(function( $, document ) {
    $.fn.toclist= function(options) {

        var settings = $.extend({
            list_type: 'ol',
            list_ID: 'js-linklist',
            list_classes: 'm-linklist',
            listitem_classes: '',
            nodetarget: false,
            add_method: 'appendTo',
            scrollspeed: '350',
            link_offset: 60,
            callback: function(){}
        }, options );

        var build_elem = this,
            fragment = document.createDocumentFragment();

        if(build_elem.length && settings.nodetarget){
            var toclist = $('<' + settings.list_type + ' />', {
                id: settings.list_ID,
                class: settings.list_classes
            });

            build_elem.each(function(index){
                var $this = $(this),
                    nodetext = $this.text(),
                    item_index = 'tocitem-'+index,
                    tocitem = $('<li />', {
                        click: function(){
                            $('html, body').animate({scrollTop: $this.offset().top - settings.link_offset}, 300);
                            $('.js-tocitem').removeClass('is-current');
                            $(this).addClass('is-current');
                        },
                        id: item_index,
                        class: 'js-tocitem ' + settings.listitem_classes,
                        text: nodetext
                    }).appendTo(fragment);

                $this.attr('data-toctarget', item_index);
            });

            switch(settings.add_method){
                case 'appendTo':
                    toclist.appendTo(settings.nodetarget);
                    break;
                case 'prependTo':
                    toclist.prependTo(settings.nodetarget);
                    break;
                case 'insertAfter':
                    toclist.insertAfter(settings.nodetarget);
                    break;
                case 'insertBefore':
                    toclist.insertBefore(settings.nodetarget);
                    break;
            }

            toclist.append(fragment);
        }
        return this;
    };
}( jQuery, document ));