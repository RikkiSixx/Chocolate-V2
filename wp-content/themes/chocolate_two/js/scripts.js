var stateManager = (function() {
	var state = null;

	var resizePage = function() {
		if ( $('body').width() < 768 ) {
			if ( state !== 'mobile' ) { displayMobile(); }
			resizeMobile();
		}
		else {
			if ( state !== 'desktop' ) { displayDesktop(); }
			resizeDesktop();
		}
	};

	var displayMobile() = function() {
		state = 'mobile';
		console.log('enter mobile');
	};

	var displayDesktop() = function() {
		state = 'desktop';
		console.log('enter desktop');
	};

	var resizeMobile = function() {
		console.log('Resizing mobile');
	};

	var resizeDesktop = function() {
		console.log('Resizing desktop');
	};

	return {
		init: function() {
			resizePage();
			$(window).on('resize', resizePage);
		}
	};

} ());

stateManager.init();




jQuery(document).ready(function($){

});



(function($) {

    $.fn.equalHeights = function() {
        var maxHeight = 0,
            $this = $(this);

        $this.each( function() {
            $(this).height('auto');
            var height = $(this).innerHeight();

            if ( height > maxHeight ) { maxHeight = height; }
        });

        return $this.css('height', maxHeight);
    };

})(jQuery);