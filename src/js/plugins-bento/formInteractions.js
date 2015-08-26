(function( $ ) {
  $.fn.formInteractions = function() {
	
		$('input:checked').parent('.a-label').addClass('s-is-checked');
		$('input:disabled').parent('.a-label').addClass('s-is-disabled');
		$('form[role="form"]').on('click', '.a-label.checkbox, .a-label.radio', function(){
			var $this = $(this);
			if($this.children().is(':disabled')) return false;
			
			var $thisCheckbox = $this.children('input:checkbox');
			
			if($thisCheckbox.length){
				if($thisCheckbox.is(':checked')){
					$this.addClass('s-is-checked');
				} else {
					$this.removeClass('s-is-checked');
				}
			} else {
				var siblings = $this.siblings();
				
				siblings.removeClass('s-is-checked');
				$this.addClass('s-is-checked');
			}
		});
	
	 	
	 	return this;
	 		
  };
}( jQuery ));