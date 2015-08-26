(function( $ ) {
  $.fn.modaltrigger = function(options) {
  	
  	var settings = $.extend({
      close: '.js-closemodal'
    }, options );
	
		var modalClose = $(settings.close);
		
		this.bind('tap', function(e){
			var $this = $(this);
			var modalTarget = $($this.attr('data-modaltarget'));
			modalTarget.addClass('s-is-active');
		});
		
		modalClose.bind('tap', function(){
			var $this = $(this);
			var activeModal = $this.parents('.o-modal');
			
			activeModal.removeClass('s-is-active');
		});
	 	
	 	return this;
	 		
  };
}( jQuery ));