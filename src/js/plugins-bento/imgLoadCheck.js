(function( $ ) {
  $.fn.imgLoadCheck = function(options, callback) {	
  	var settings = $.extend({
      loader: false,
      loaderMarkup: '<p class="js-loader"></p>',
      callbackTimeout: 0,
      loadingClass: 's-is-loading',
      doneClass : 's-is-loaded'
    }, options );
 
		this.each(function(i){
			var $this = $(this);
			if(!$this.is('img') || $this.is('.'+settings.loadingClass)) return;
			var posterImg = $this;
			var image = new Image();
			// $this.data('settings',settings);
			$this.addClass(settings.loadingClass);
			
			if(settings.loader){
				var loaderElem = $(settings.loaderMarkup);
				
				$this.wrap($('<div/>').css('position', 'relative'));
				loaderElem.insertAfter($this);
			}
			
			$(image).on('load', function(){ 
				if(typeof callback == 'function'){
					setTimeout(function() {
						callback.call($this);
					},settings.callbackTimeout*i);
				}
				if(settings.loader){
					loaderElem.fadeOut();
				}
				
				$this.removeClass(settings.loadingClass);
				$this.addClass(settings.doneClass);
					
			});
			
			image.src = posterImg.attr('src');
			
		});
 	
	 	return this;
	 		
  };
}( jQuery ));