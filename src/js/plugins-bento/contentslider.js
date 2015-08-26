(function($) {
  $.fn.contentslider = function(options) {
  	
  	var settings = $.extend({
      slidespeed: 350,
      offsetTarget: '.expired',
      offset: 0.75,
      trigContent: false,
      trigger: '.m-contentslide__li',
      target: '.js-targetContent',
      populateTarget: true,
      trigspeed: 250
    }, options );
		
	  var scrolledSlider = this;
 		var viewPort = $(window);
		var expiredItems = scrolledSlider.find(settings.offsetTarget);
		var slideItemWidth = expiredItems.innerWidth();
		var slideOffset = (slideItemWidth * expiredItems.length) * settings.offset;
		var resizeTimeoutId = 0;
		
		scrolledSlider.scrollLeft(slideOffset);
		scrolledSlider.parent().addClass('o-scrolledSliderParent');
		
		$('<button id="js-contentslideBtn__prev" class="a-contentslide__btn prev">Previous</button><button id="js-contentslideBtn__next" class="a-contentslide__btn next">Next</button>').insertAfter(this);
		
		var buttons = $('.a-contentslide__btn');
	
		buttons.bind('tap', function(){
			var $this = $(this);
			var position = scrolledSlider.scrollLeft();
			if($this.hasClass('prev')){
				scrolledSlider.animate({scrollLeft: position - slideItemWidth*2}, settings.slidespeed);
			} else {
				scrolledSlider.animate({scrollLeft: position + slideItemWidth*2}, settings.slidespeed);
			}
		});
		
		viewPort.on('resize', function(){
			clearTimeout(resizeTimeoutId);
			resizeTimeoutId = setTimeout(function(){
				slideItemWidth = expiredItems.innerWidth();
				slideOffset = (slideItemWidth * expiredItems.length) * settings.offset;
				scrolledSlider.animate( { scrollLeft: slideOffset }, settings.slidespeed);
			},settings.slidespeed);
		});
		
		if(settings.trigContent){
			
			var sliderTargets = $(settings.target);
			var contentTargetsParent = sliderTargets.parent();
			var contentTrigger = scrolledSlider.find(settings.trigger);
			
			sliderTargets.hide(0);
			contentTargetsParent.addClass('js-contentTargetsParent');
			scrolledSlider.parent().addClass('trigTarget');
			
			contentTrigger.attr('data-target', function(index) {
	  		return 'eq-' + index;
			});
		
			sliderTargets.attr('id', function(index) {
		  	return 'eq-' + index;
			});
			
			if(settings.populateTarget){
				sliderTargets.eq(expiredItems.length).fadeIn(settings.trigspeed).addClass('s-is-current');
			}
			
			contentTrigger.bind('tap', function(){
				var $this = $(this);
				var target = $('#'+$this.attr('data-target'));
				var targetHeight = target.innerHeight();
				
				if(target.hasClass('s-is-current')){
					return;
				}
				sliderTargets.fadeOut(settings.trigspeed).removeClass('s-is-current');
				target.delay(settings.trigspeed).fadeIn(settings.trigspeed).addClass('s-is-current');
				contentTargetsParent.css('min-height', targetHeight+'px');
			});
		}
	 	
	 	return this;
  };
}( jQuery ));