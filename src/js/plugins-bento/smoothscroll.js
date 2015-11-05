(function( $ ) {
  $.fn.smoothScroll = function() {
  	this.bind('tap', function(e){
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      	var jQuerytarget = $(this.hash);
        jQuerytarget = jQuerytarget.length && jQuerytarget || jQuery('[name=' + this.hash.slice(1) +']');
        if (jQuerytarget.length) {
        	var targetOffset = jQuerytarget.offset().top;
          $('html,body').animate({scrollTop: targetOffset}, 600);
          //e.preventDefault(); Eftersom vi kör tappy, dödas default automatiskt
         } 
       }
    });

    return this;
	 		
  };
}( jQuery ));