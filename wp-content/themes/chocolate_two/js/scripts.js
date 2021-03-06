jQuery(document).ready(function($){

    $(".flexnav").flexNav();



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


	var clearheight = function(container){
		$(container).each(function() {
			$el = $(this);
			$($el).height('auto')
		});
    }


	// State Manager

    var stateManager = (function () {
      	var state = null;

		var resizePage = function () {
			if ( $('body').width() < 860 ) {
				if ( state !== 'mobile' ) { displayMobile(); }
				resizeMobile();
			}
			else {
				if ( state !== 'desktop' ) { displayDesktop(); }
				resizeDesktop();
			}
		};

		var displayMobile = function() {
			state = 'mobile';

			clearheight('.recent-posts .equal-title');
			clearheight('.recent-posts .equal-height');
		};

		var displayDesktop = function() {
			state = 'desktop';
			
			$('.recent-posts .equal-title').equalHeights();
			$('.recent-posts .equal-height').equalHeights();

			// Sticky Header
		 	$(window).bind('scroll', function(){
		    	var top = $(this).scrollTop();
				
				$("body").toggleClass("scrolled", top > 120);
		  	});
		};

		var resizeMobile = function() {

			clearheight('.recent-posts .equal-title');
			clearheight('.recent-posts .equal-height');
		};

		var resizeDesktop = function() {

			$('.recent-posts .equal-title').equalHeights();
			$('.recent-posts .equal-height').equalHeights();
		};

		return {
			init: function() {
				resizePage();
				$(window).on('resize', resizePage);
			}
		};

	} ());

	stateManager.init();
	// End of State Manager

});
