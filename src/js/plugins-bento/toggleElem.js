(function( $ ) {
  $.fn.toggleElem = function(options) {
  	
  	var settings = $.extend({
  		toggledElem: 'm-toggled__elem',
      speed: 300
    }, options );

    this.each(function(){
    	var $this = $(this);
      if($this.is('ul')){
       	var box = $this.clone(true);
        box.find('li').slice(1).wrapAll('<li class="'+settings.toggledElem+'"><ul></ul></li>');
        box.find('li:eq(0) > *').addClass('a-toggled__toggler');
        $this.replaceWith(box);
      }
    });
	
		var toggleTarget = $('.'+settings.toggledElem);
		var toggler = $('.'+settings.toggledElem).prev();
		
	 	toggleTarget.hide(0).addClass('js-toggleTarget');

    toggler.bind('tap', function(){
   		var $this = $(this);
      var thisNext = $this.next(toggleTarget);
      thisNext.slideToggle(settings.speed);
      $this.parent().toggleClass('s-is-active');
    });
	 	
	 	return this;
	 		
  };
}( jQuery ));