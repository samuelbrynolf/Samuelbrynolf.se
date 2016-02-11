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
        var bloglink_arr = parent_elem.find($("a[href*=#]"));

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
	


// ==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================



    top_tags('.js-toptags a');
    loadSocialData($('#js-instagram'), 'loadInstagram');
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

})(jQuery); // End self-invoking function