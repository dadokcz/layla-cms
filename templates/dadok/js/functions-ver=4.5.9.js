/**
 * Contains functionality specific to this theme.
 * This is a set of functions that handle core theme parts.
 */

jQuery(document).ready(function(){

	setTimeout(function() {
		jQuery('.site-description').removeClass('flip');
		jQuery('.site-description').addClass('zoomOut');
		jQuery('.site-description').fadeOut();
		jQuery('.project-label').fadeIn();

		 jQuery( ".site-title" ).animate({
		    // marginLeft: "+150",
		    marginTop: "+10",
		    // height: "toggle"
		  }, 300, function() {
		    // Animation complete.
		  });

	}, 3000);

  	/**
	 * Shows the content with nicer fade in animation if a browser supports it.
	 */
	jQuery('body').addClass('body-visible');
	 




	/**
	 * Adds has-submenu class to menu items that have submenus.
	 */
	jQuery('.nav-menu li').each(function(){
		if(jQuery(this).children('.sub-menu').length){ // children() gets direct children
			jQuery(this).addClass('has-submenu');
		}
	});
	
	/**
	 * Enable menu toggle for small screens.
	 */
	( function() {
		var nav = jQuery( '.site-navigation' ), button, menu;
		if ( ! nav )
			return;

		button = nav.find( '.menu-toggle' );
		if ( ! button )
			return;

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		jQuery( '.menu-toggle' ).on( 'click', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
});

/**
 * Handles compact header search.
 */
jQuery(document).ready(function(){
	jQuery('.compact-search').click(function(){
		jQuery('.header-search').css({ 'display' : 'block' });
		jQuery('.header-search .search-field').focus();
	});
	jQuery('.header-search').click(function(e){
		var target = e.target;

		while (target.nodeType != 1) target = target.parentNode;
		if(target.tagName != 'INPUT'){
			jQuery('.header-search').css({ 'display' : 'none' });
		}
	});
});



	jQuery( function() {
	  jQuery( '.type-text' ).each( function() {
	    var items = jQuery( this ).attr( 'title' ) + '; v mediální oblasti.';
	    
	    jQuery( this ).empty().attr( 'title', '' ).teletype( {
	      text: jQuery.map( items.split( ';' ), jQuery.trim ),
	      typeDelay: 10,
	      backDelay: 20,
	      cursor: '▋',
	      humanise: true,
	      delay: 3000,
	      preserve: false,
	      prefix: 'Již <u><span class="scope-hp" id="count_hp">15</span> let</u> pro Vás děláme moderní a působivá řešení ',
	      loop: 0
	    } );
	  } );
	} );


	// window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	// d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	// _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
	// $.src='//v2.zopim.com/?2U5nRS3DishmlMT7zjikdoLvXgixf9gb';z.t=+new Date;$.
	// type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');


	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-24475778-2', 'auto');
	ga('send', 'pageview');
