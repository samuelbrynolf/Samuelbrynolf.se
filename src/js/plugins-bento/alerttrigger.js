(function( $ ) {
  $.fn.alerttrigger = function() {
		
		this.on('tap', function(e){
			var $this = $(this);
			var alertTarget = $($this.attr('data-alert-target'));
			
			alertTarget.addClass('s-is-active');
		
			setTimeout(function(){
				alertTarget.removeClass('s-is-active');
			}, 2500);
		});
	 	
	 	return this;
	 		
  };
}( jQuery ));