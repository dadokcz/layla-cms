jQuery(document).ready(function(){
  jQuery('.bxslider').bxSlider({
  // adaptiveHeight: true,
  auto: true,
  mode: 'fade',
    pause: 8500,
    // speed: 4500
});

  jQuery(".scroll-to1").click(function (){
                jQuery('html, body').animate({
                    scrollTop: jQuery(".servicesname").offset().top
                }, 1000);
            });


});





	jQuery( ".yt_reveal" ).click(function() {

		var target = jQuery(this).attr('target');


	    if(jQuery( ".yt_reveal" ).hasClass('opened')){

	    jQuery( ".yt_reveal" ).removeClass('opened');

	    jQuery( ".yt_reveal" ).html('Přehrát video');

		jQuery( "#home-slider" ).css('display','block');

	    jQuery( "#home-slider" ).animate({
	        // opacity: 0.25,
	        height: "500"
	      }, 1500, function() {
	        // Animation complete.
	    });



	    jQuery( ".ytplayer" ).animate({
	        // opacity: 0.25,
	        height: "0"
	      }, 1500, function() {
	        // Animation complete.
	    });

	    jQuery('html, body').animate({
	        scrollTop: jQuery(".site-content").offset().top
	    }, 1000);

 		jQuery("#video")[0].src = target;


	    }else{
	    jQuery( ".yt_reveal" ).addClass('opened');

	    jQuery( ".yt_reveal" ).html('Schovat video');

 		jQuery("#video")[0].src = target;


		jQuery( "#home-slider" ).css('display','none');



	    jQuery( ".ytplayer" ).animate({
	        // opacity: 0.25,
	        height: "720"
	      }, 1500, function() {
	        // Animation complete.
	    });


	    jQuery('html, body').animate({
	        scrollTop: jQuery(".site-content").offset().top
	    }, 1000);


	    }

	    return false;
	});
	
	jQuery( ".home-link h1" ).hover(
  function() {
    jQuery( this ).html('ダドク');
    jQuery( ".home-link h2" ).hide();
  }, function() {
    jQuery( this ).html('DADOK');
  }
);


	jQuery( ".cod_reveal" ).click(function() {

	    if(jQuery( ".cod_reveal" ).hasClass('opened')){

	    jQuery( ".cod_reveal" ).removeClass('opened');

	    jQuery( ".button_text" ).html('Zobrazit další služby');

	    jQuery( ".hpservices" ).animate({
	        // opacity: 0.25,
	        height: "290px"
	      }, 1500, function() {
	        // Animation complete.
	    });

	    jQuery('html, body').animate({
	        scrollTop: jQuery("header").offset().top
	    }, 1000);



	    }else{
	    jQuery( ".cod_reveal" ).addClass('opened');

	    jQuery( ".button_text" ).html('Schovat další služby');

	    jQuery( ".hpservices" ).animate({
	        // opacity: 0.25,
	        height: "100%"
	      }, 1500, function() {
	        // Animation complete.
	    });


	    jQuery('html, body').animate({
	        scrollTop: jQuery(".page-title").offset().top
	    }, 1000);


	    }

	    return false;
	});






jQuery(function($) {'use strict';

	//Responsive Nav
	$('li.dropdown').find('.fa-angle-down').each(function(){
		$(this).on('click', function(){
			if( $(window).width() < 768 ) {
				$(this).parent().next().slideToggle();
			}
			return false;
		});
	});

	//Fit Vids
	if( $('#video-container').length ) {
		$("#video-container").fitVids();
	}

	//Initiat WOW JS
	new WOW().init();

	// portfolio filter
	$(window).load(function(){

		$('.main-slider').addClass('animate-in');
		$('.preloader').remove();
		//End Preloader

		if( $('.masonery_area').length ) {
			$('.masonery_area').masonry();//Masonry
		}

		var $portfolio_selectors = $('.portfolio-filter >li>a');
		
		if($portfolio_selectors.length) {
			
			var $portfolio = $('.portfolio-items');
			$portfolio.isotope({
				itemSelector : '.portfolio-item',
				layoutMode : 'fitRows'
			});
			
			$portfolio_selectors.on('click', function(){
				$portfolio_selectors.removeClass('active');
				$(this).addClass('active');
				var selector = $(this).attr('data-filter');
				$portfolio.isotope({ filter: selector });
				return false;
			});
		}

	});


	$('.timer').each(count);
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
		
	// Search
	$('.fa-search').on('click', function() {
		$('.field-toggle').fadeToggle(200);
	});

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});

	// Progress Bar
	$.each($('div.progress-bar'),function(){
		$(this).css('width', $(this).attr('data-transition')+'%');
	});

	if( $('#gmap').length ) {
		var map;

		map = new GMaps({
			el: '#gmap',
			lat: 43.04446,
			lng: -76.130791,
			scrollwheel:false,
			zoom: 16,
			zoomControl : false,
			panControl : false,
			streetViewControl : false,
			mapTypeControl: false,
			overviewMapControl: false,
			clickable: false
		});

		map.addMarker({
			lat: 43.04446,
			lng: -76.130791,
			animation: google.maps.Animation.DROP,
			verticalAlign: 'bottom',
			horizontalAlign: 'center',
			backgroundColor: '#3e8bff',
		});
	}

});