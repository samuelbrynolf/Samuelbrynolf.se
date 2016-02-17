//==============================================================================================================
										
// 1. FUNCTIONS
// 2. EXECUTE

//==============================================================================================================

// 1. FUNCTIONS

// ==============================================================================================================

	
(function($) {



	// -------------------------------------------------------------------------------------------------------



    function loadSocialData($feedTarget, $action_function){

        var feedTarget = $feedTarget;

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: $action_function
            },
            success: function (data, textStatus, XMLHttpRequest) {
                feedTarget.append(data).removeClass('s-is-hidden');
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                feedTarget.remove();
            }
        });
    }




	// -------------------------------------------------------------------------------------------------------




    function clearCurrent($trigger){
        var trigger = $trigger;

        $('main').toggleClass('tags-is-active');
        $('.menu-item').removeClass('current-menu-item');
        trigger.toggleClass('current-menu-item');
    }

    function populate_tags($loadtarget, $trigger){

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'build_tags',
            },
            success: function (data) {
                $loadtarget.append(data).removeClass('s-is-hidden');
                var closetrigger = $('#js-listhead');
                closetrigger.bind('tap', function(){
                    $loadtarget.addClass('s-is-hidden');
                    clearCurrent($trigger);
                });
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                $loadtarget.remove();
            }
        });
    }




    // -------------------------------------------------------------------------------------------------------




    function top_tags($trigger){
        var tagsloaded = false,
            trigger = $($trigger),
            targetelem = $('<aside id="js-taglist" class="o-taglist s-is-hidden"></aside>');

        if($('body').is('.search-no-results, .error404') && $.fn.smoothScroll){
            targetelem.insertBefore('#js-tags__ul');
            trigger.smoothScroll();
        } else {
            targetelem.prependTo('body');
            trigger.bind('tap', function(){
                var $this = $(this);
                var href = $this.attr('href');

                if(href.indexOf('#') === 0){
                    var loadtarget = $(href);

                    if(loadtarget.length){
                        clearCurrent(trigger);

                        if(tagsloaded){
                            loadtarget.toggleClass('s-is-hidden');
                        } else {
                            populate_tags(loadtarget, trigger);
                            tagsloaded = true;
                        }

                        if($('main').hasClass('tags-is-active')){
                            $('body').animate({
                                scrollTop: 0
                            },'fast');
                        }
                    }
                }
            });
        }
    }



    // -------------------------------------------------------------------------------------------------------




    function smoothscroll_section_anchors(parent_elem){
        var bloglink_arr = parent_elem.find($('a[href*="#"]'));

        if(bloglink_arr.length){

            bloglink_arr.each(function(){
                var $this = $(this);

                $this.smoothScroll({
                    speed : 350,
                    target_offset : 36,
                    highlight_target : true
                });
            });

        }
    }



	// -------------------------------------------------------------------------------------------------------



    function bind_tappy($element) {
        if($.fn.tappy) {
            $element.each(function () {
                var href = $(this).attr("href");
                if (href.indexOf("#") !== 0) {
                    $(this).bind("tap", function () {
                        window.location.href = this.href;
                    });
                }
            });
        }
    }



    // -------------------------------------------------------------------------------------------------------



    function social_cloner(){
        var load_container_id = load_container.attr('id');
        var top_container_id = top_container.attr('id');
        var social_item = $('.js-instagram__img');
        screen = getActiveMQ();

        if(is_cloned){
           return;
        }

        if((screen === 'aq') || (screen === 'bq') && load_container_id === top_container_id){

            if(!(top_container.find(social_item)).length){
                social_item.clone().appendTo(top_container);
                is_cloned = true;
            }

        } else {

            if(!(bottom_container.find(social_item)).length){
                social_item.clone().appendTo(bottom_container);
                is_cloned = true;
            }
        }
    }
	


// ==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================

    var top_container = $('#js-instagram');

    if($.fn.mq_watcher && top_container.length){
        $('body').mq_watcher();
        var viewPort = $(window);
        var resizeTimeoutId = 0;
        var screen = getActiveMQ();
        var bottom_container = $('#js-entry-content');
        var load_container;
        var is_cloned = false;

        if((screen === 'aq') || (screen === 'bq')){
            loadSocialData(top_container, 'loadInstagram');
            load_container = top_container;
        } else {
            loadSocialData(bottom_container, 'loadInstagram');
            load_container = bottom_container;
        }

        viewPort.on('resize', function(){
            clearTimeout(resizeTimeoutId);
            resizeTimeoutId = setTimeout(social_cloner,300);
        });

    } else {
        loadSocialData($('#js-instagram'), 'loadInstagram');
    }

    top_tags('.js-toptags a');

    bind_tappy($('.js-tappy'));

    if($.fn.smoothScroll){
         $('.js-jumper').smoothScroll();

        $('.js-colophon-jumper a').smoothScroll({
            speed : 350,
            target_offset : 36,
            highlight_target : true
        });

        smoothscroll_section_anchors($('#js-blogtag'));
    }

    if($.fn.mis_popup) {
        var popup_src = $('.mis_popup');
        popup_src.mis_popup();
    }

    if($.fn.header_slide) {
        $('#js-masthead').header_slide({
            disable: function(){
                return $('#mis_overlay').hasClass('s-is-visible');
            }
        });
    }

    if($.fn.fitVids){
        $('#js-video-embed').fitVids();
        $('#js-entry-content').fitVids();
    }

    if($.fn.toclist){
        $('#js-entry-content.has-toc h2').toclist({
            list_ID: 'js-toc',
            list_classes: 'm-toclist__ol',
            listitem_classes: 'a-toclist__li',
            nodetarget: $('#js-toclist__section')
        });
    }

})(jQuery); // End self-invoking function