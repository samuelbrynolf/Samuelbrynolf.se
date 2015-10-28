//==============================================================================================================
										
// 1. FUNCTIONS
// 2. EXECUTE   
// 3. EXECUTE PLUGINS

//==============================================================================================================

// 1. FUNCTIONS

// ==============================================================================================================

	
(function($) {


	// -------------------------------------------------------------------------------------------------------

	
	//function mediaChecker(){
	//	var screen = getActiveMQ();
	//
	//	// demo for components-js.php
	//	$('#js-mq-currentexample').text('Current screen: ' + screen);
	//		if(screen == 'aq'){
	//			$('#js-mq-example').text('Yey! Alpha mode!');
	//		} else {
	//			$('#js-mq-example').text('Nay! Not alpha!');
	//		}
	//	// end demo for components-js.php
	//
	//	if((screen != 'aq') && (screen != 'bq')){
	//		$('.js-JVC').viewportChecker({
    	//	classToAdd: 's-is-visible',
    	//	offset: 96,
    	//	repeat: false
	//		});
	//	}
	//}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	//function fadeImg(elem){
	//	var fadeTarget = elem.find('img');
	//
	//	fadeTarget.each(function(i){
	//		var $this = $(this);
	//
	//		setTimeout(function(){
	//			$this.css('opacity', '1');
	//		}, i*150);
	//	});
	//}
	
	
	// -------------------------------------------------------------------------------------------------------


    function show_contact(){
        var contactTrigger = $('.js-colophon-jumper a');
        var contactArea = $(contactTrigger.attr('href'));

        contactTrigger.bind('tap', function(){
            contactArea.addClass('s-is-highlighted');
            setTimeout(function(){
                contactArea.removeClass('s-is-highlighted');
            }, 1500);
        });


        if($.fn.smoothScroll && contactArea.length){
            contactTrigger.smoothScroll();
        }
    }


	// -------------------------------------------------------------------------------------------------------



    function loadSocialData($feedTarget){

        var feedTarget = $feedTarget;

        $.ajax({
            type: 'POST',
            url: '/wp-admin/admin-ajax.php',
            data: {
                action: 'loadSocialContent',
            },
            success: function (data, textStatus, XMLHttpRequest) {
                feedTarget.append(data).removeClass('s-is-hidden');
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                feedTarget.remove();
            }
        });
    }

    function recentSocials(){
        var feedTarget = $("#js-socialfeedBox");

        feedTarget.viewportChecker({
            classToAdd: 'execLoad',
            offset: 0,
            callbackFunction: loadSocialData(feedTarget),
            repeat: false
        });
    }



	// Top Tags -------------------------------------------------------------------------------------------------------




    function clearCurrent($trigger){
        var menuitems = $('.menu-item');
        var trigger = $trigger;

        menuitems.removeClass('current-menu-item');
        trigger.toggleClass('current-menu-item');

        $('html, body').animate({
            scrollTop: 0
        },'slow');
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

    function top_tags($trigger){
        var tagsloaded = false;
        var trigger = $($trigger);

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
                }
            }
        });
    }



	// -------------------------------------------------------------------------------------------------------

	
	//function showElem(){
	//	var $this = $(this);
	//	$this.removeClass('s-is-hidden');
	//}
	
	
//==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================

	
	$('html').addClass('transitions');
    // recentSocials();
    show_contact();
    top_tags('.js-toptags a');
	
	// -------------------------------------------------------------------------------------------------------
	
	
	setTimeout(function(){
 		var wflObjects = [
	 		
	 		'#wfl-test',
	 		'.example-2'
 		
 		].join(', ');

		$(wflObjects).css({
			'visibility' 	: 'visible',
			'opacity' 		: '1',
			'transform'		: 'translate3d(0,0,0)'
		});
	},2500);
	
	
	// -------------------------------------------------------------------------------------------------------



    if($.fn.mis_popup) {
        var popup_src = $('.mis_popup');
        if(popup_src.length){
            popup_src.mis_popup();
        }
    }



	// -------------------------------------------------------------------------------------------------------

	
	//if($('#getActiveMQ-watcher').length){
	//	var viewPort = $(window);
	//	var resizeTimeoutId = 0;
	//
	//	mediaChecker();
	//
	//	viewPort.on('resize', function(){
	//		clearTimeout(resizeTimeoutId);
	//		resizeTimeoutId = setTimeout(mediaChecker,300);
	//	});
	//}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	//if(screen != 'aq'){
	//	$('.js-medialoadEffect').viewportChecker({
  	//	classToAdd: 's-is-active',
  	//	offset: 168,
  	//	callbackFunction: fadeImg,
  	//	repeat: false
	//	});
	//}
	
	
	// -------------------------------------------------------------------------------------------------------



    // -------------------------------------------------------------------------------------------------------


    $('.js-tappy').each( function(){
        var href = $( this ).attr( "href" );
        if( href.indexOf( "#" ) !== 0 ){
            $( this ).bind( "tap", function(){
                window.location.href = this.href;
            });
        }
    } );
	
	
	
//==============================================================================================================	

// 3 EXECUTE PLUGINS

// ==============================================================================================================

	
	//if($.fn.modal_image){
     //   var loadCheckEl = $('.js-loadCheck');
     //   if(loadCheckEl.length){
    	//    loadCheckEl.modal_image({
    	//	    loader: true,
    	//	    callbackTimeout: 300
     //       },showElem);
	//    }
	//}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	//if($.fn.fitVids){
	//	var videoParent = $('.js-videoParent');
    //if(videoParent.length){
	//		videoParent.fitVids();
	//	}
	//}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	

	
	
	// -------------------------------------------------------------------------------------------------------

	


	if($.fn.smoothScroll){
        var jumper = $('.js-jumper');
        jumper.smoothScroll();
	}
	

	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.toggleElem){
		var toggledElem = $('.js-toggle');
		if(toggledElem.length){
	    toggledElem.toggleElem({
	    	toggledElem: 'js-toggled',
	 			speed: 80
	 		});
		}
	}


	// -------------------------------------------------------------------------------------------------------

	//
	//if($.fn.expandSection){
	//	var expElem = $('#js-griddemo .o-gridview');
	//	var demoexpElem = $('.m-expand-demo');
	//
	//	if(expElem.length){
	//   expElem.expandSection({
	// 			timeout: 100,
	// 			divideBy: 2
	// 		});
	// 	}
	//
	//	if(demoexpElem.length){
	// 		demoexpElem.expandSection();
 	//	}
	//}
	
	
// -------------------------------------------------------------------------------------------------------


	//if($.fn.contentslider){
	//  $('#js-slider').contentslider({
	//  	trigContent: true,
	//  	populateTarget: true
	//  });
	//}
	
	
// -------------------------------------------------------------------------------------------------------

	
})(jQuery); // End self-invoking function