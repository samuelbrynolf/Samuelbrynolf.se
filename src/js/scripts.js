//==============================================================================================================
										
// 1. FUNCTIONS
// 2. EXECUTE

//==============================================================================================================

// 1. FUNCTIONS

// ==============================================================================================================

	
(function($) {


    function easein_item(elem){
        var arr_elem = $(elem);

        arr_elem.each(function(i){
            var $this = $(this);

            setTimeout(function(){
                $this.addClass('s-is-visible');
            }, i*300);
        });
    }



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
                action: 'build_tags'
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
            targetelem = $('<aside id="js-taglist" class="o-taglist s-is-hidden"></aside>'),
            js_body = $('body');


        if(js_body.is('.search-no-results, .error404') && $.fn.smoothScroll){
            targetelem.insertBefore('#js-tags__ul');
            trigger.smoothScroll();
        } else {
            targetelem.prependTo(js_body);
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
                            js_body.animate({
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



    function bind_tappy(elem) {
        if($.fn.tappy) {
            var var_elem = $(elem);

            var_elem.each(function () {
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



    function social_cloner(container_1, container_2, loaditem){
        var app_body = $('body');
        var screen = getActiveMQ();

        if((screen === 'aq') || (screen === 'bq')){
            app_body.removeClass('no-thumb');

            if(!(container_1.find(loaditem)).length){
                loaditem.clone().appendTo(container_1);
            }

        } else {
            app_body.addClass('no-thumb');

            if (!(container_2.find(loaditem)).length) {
                loaditem.clone().appendTo(container_2);
            }
        }
    }



    // -------------------------------------------------------------------------------------------------------



    function load_instagram(){
        var top_container = $('#js-instagram');

        if(top_container.length){
            var js_body = $('#js-body');

            if($.fn.mq_watcher){
                js_body.mq_watcher();
                var viewPort = $(window);
                var resizeTimeoutId = 0;
                var screen = getActiveMQ();
                var bottom_container = $('#js-entry-content');

                if((screen === 'aq') || (screen === 'bq')){
                    loadSocialData(top_container, 'loadInstagram');
                } else {
                    loadSocialData(bottom_container, 'loadInstagram');
                    js_body.addClass('no-thumb');
                }

                viewPort.on('resize', function(){
                    clearTimeout(resizeTimeoutId);
                    resizeTimeoutId = setTimeout(function(){
                        social_cloner(top_container, bottom_container, $('.js-instagram__img'));
                    },300);
                });

            } else {
                loadSocialData(top_container, 'loadInstagram');
            }
        }
    }




// ==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================

    easein_item('.mis_img');
    top_tags('.js-toptags a');
    bind_tappy('.js-tappy');

    if($.fn.smoothScroll){
        $('.js-jumper').smoothScroll();
        $('.js-colophon-jumper a').smoothScroll({
            speed : 750,
            highlight_target : true
        });
        smoothscroll_section_anchors($('#js-blogtag'));
    }

    if ($.fn.mis_popup) {
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
        var entry_content = $('#js-entry-content.has-toc');
        entry_content.find('h2').toclist({
            list_ID: 'js-toc',
            list_classes: 'm-toclist__ol',
            listitem_classes: 'a-toclist__li',
            nodetarget: $('#js-toclist__section')
        });
    }

    load_instagram();

})(jQuery); // End self-invoking function