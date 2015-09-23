//==============================================================================================================
										
// 1. FUNCTIONS
// 2. EXECUTE   
// 3. EXECUTE PLUGINS

//==============================================================================================================

// 1. FUNCTIONS

// ==============================================================================================================

	
(function($) {


	// -------------------------------------------------------------------------------------------------------

	
	function mediaChecker(){
		var screen = getActiveMQ();
		
		// demo for components-js.php
		$('#js-mq-currentexample').text('Current screen: ' + screen);
			if(screen == 'aq'){
				$('#js-mq-example').text('Yey! Alpha mode!');
			} else {
				$('#js-mq-example').text('Nay! Not alpha!');
			}
		// end demo for components-js.php
		
		if((screen != 'aq') && (screen != 'bq')){
			$('.js-JVC').viewportChecker({
    		classToAdd: 's-is-visible', 
    		offset: 96,
    		repeat: false
			});
		}
	} 
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	function fadeImg(elem){
		var fadeTarget = elem.find('img');
		
		fadeTarget.each(function(i){
			var $this = $(this);
			
			setTimeout(function(){
				$this.css('opacity', '1');
			}, i*150);
		});
	}
	
	
	// -------------------------------------------------------------------------------------------------------



    function socialcontentLoader(){

        var loadcontainer = $("#js-frontpage__aside");

        $.ajax({
            type: 'POST',
            url: 'http://mis.1979design.se/wp-admin/admin-ajax.php',
            data: {
                action: 'loadSocialContent',
                //getTemplate: getTemplate,
            },
            success: function (data, textStatus, XMLHttpRequest) {
                loadcontainer.html('');
                loadcontainer.append(data).removeClass('s-is-hidden');
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {

            }
        });

    }



	// -------------------------------------------------------------------------------------------------------

	
	function showElem(){
		var $this = $(this);
		$this.removeClass('s-is-hidden');
	}
	
	
//==============================================================================================================

// 2. EXECUTE

// ==============================================================================================================

	
	$('html').addClass('transitions');
	
	
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
	
	
	if($('#getActiveMQ-watcher').length){
		var viewPort = $(window);
		var resizeTimeoutId = 0;
					
		mediaChecker();
		
		viewPort.on('resize', function(){
			clearTimeout(resizeTimeoutId);
			resizeTimeoutId = setTimeout(mediaChecker,300);
		});
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if(screen != 'aq'){
		$('.js-medialoadEffect').viewportChecker({
  		classToAdd: 's-is-active', 
  		offset: 168,
  		callbackFunction: fadeImg,
  		repeat: false
		});
	} 
	
	
	// -------------------------------------------------------------------------------------------------------



    $('#js-frontpage__aside').viewportChecker({
        classToAdd: '',
        offset: 0,
        callbackFunction: socialcontentLoader,
        repeat: false
    });



    // -------------------------------------------------------------------------------------------------------

	
	$('a.tappilyTap').bind('tap', function(e){
		window.location=e.target.href;
	});
	
	
	
//==============================================================================================================	

// 3 EXECUTE PLUGINS

// ==============================================================================================================

	
	if($.fn.imgLoadCheck){
        var loadCheckEl = $('.js-loadCheck');
        if(loadCheckEl.length){
    	    loadCheckEl.imgLoadCheck({
    		    loader: true,
    		    callbackTimeout: 300
            },showElem);
	    }
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.fitVids){
		var videoParent = $('.js-videoParent');
    if(videoParent.length){
			videoParent.fitVids();
		}
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.modaltrigger){
		var openmodal = $('.js-openmodal');
    if(openmodal.length){
	    openmodal.modaltrigger();
    }
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.alerttrigger){
		var openalert = $('.js-openalert');
    if(openalert.length){
    	openalert.alerttrigger();
    }
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.smoothScroll){
		var jumper = $('.js-jumper');
		if(jumper.length){
    	jumper.smoothScroll();
    }
	}
	
	
	// -------------------------------------------------------------------------------------------------------
	
	
	if($.fn.formInteractions){
		var form = $('.m-form');
		if(form.length){
	    form.formInteractions();
    }
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
	
	
	if($.fn.expandSection){
		var expElem = $('#js-griddemo .o-gridview');
		var demoexpElem = $('.m-expand-demo');
			
		if(expElem.length){
	   expElem.expandSection({
	 			timeout: 100,
	 			divideBy: 2
	 		});
	 	}
	 
		if(demoexpElem.length){
	 		demoexpElem.expandSection();
 		}
	}
	
	
// -------------------------------------------------------------------------------------------------------


	if($.fn.contentslider){
	  $('#js-slider').contentslider({
	  	trigContent: true,
	  	populateTarget: true
	  });
	}
	
	
// -------------------------------------------------------------------------------------------------------

	
})(jQuery); // End self-invoking function