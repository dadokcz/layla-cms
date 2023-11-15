var TRX_ADDONS_STORAGE = {
	"ajax_url": "/",
	"ajax_nonce": "9942b56989",
	"site_url": "/",
	"vc_edit_mode": "0",
	"popup_engine": "magnific",
	"user_logged_in": "0",
	"email_mask": "^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$",
	"msg_ajax_error": "Invalid server answer!",
	"msg_magnific_loading": "Loading image",
	"msg_magnific_error": "Error loading image",
	"msg_error_like": "Error saving your like! Please, try again later.",
	"msg_field_name_empty": "The name can't be empty",
	"msg_field_email_empty": "Too short (or empty) email address",
	"msg_field_email_not_valid": "Invalid email address",
	"msg_field_text_empty": "The message text can't be empty",
	"msg_send_complete": "Send message complete!",
	"msg_send_error": "Transmit failed!",
	"scroll_to_anchor": "1",
	"update_location_from_anchor": "1",
	"msg_sc_googlemap_not_avail": "Googlemap service is not available",
	"msg_sc_googlemap_geocoder_error": "Error while geocode address"
};

var HR_ADVISOR_STORAGE = {
	"ajax_url": "/",
	"ajax_nonce": "9942b56989",
	"site_url": "/",
	"user_logged_in": "",
	"mobile_layout_width": "960",
	"menu_animation_in": "fadeInUpSmall",
	"menu_animation_out": "fadeOutDownSmall",
	"use_mediaelements": "1",
	"message_maxlength": "1000",
	"site_scheme": "scheme_default",
	"admin_mode": "",
	"email_mask": "^([a-zA-Z0-9_\\-]+\\.)*[a-zA-Z0-9_\\-]+@[a-z0-9_\\-]+(\\.[a-z0-9_\\-]+)*\\.[a-z]{2,6}$",
	"strings": {
		"ajax_error": "Invalid server answer!",
		"error_global": "Error data validation!",
		"name_empty": "The name can&#039;t be empty",
		"name_long": "Too long name",
		"email_empty": "Too short (or empty) email address",
		"email_long": "Too long email address",
		"email_not_valid": "Invalid email address",
		"text_empty": "The message text can&#039;t be empty",
		"text_long": "Too long message text",
		"search_error": "Search error! Try again later.",
		"send_complete": "Send message complete!",
		"send_error": "Transmit failed!"
	},
	"menu_hover": "fade",
	"menu_hover_color": "#b9d057",
	"button_hover": "slide_left"
};

var wc_add_to_cart_params = {
	"ajax_url": "/",
	"wc_ajax_url": "/",
	"i18n_view_cart": "View Cart",
	"cart_url": "/",
	"is_cart": "",
	"cart_redirect_after_add": "no"
};

var woocommerce_params = {
	"ajax_url": "/",
	"wc_ajax_url": "/"
};

var wc_cart_fragments_params = {
	"ajax_url": "/",
	"wc_ajax_url": "/",
	"fragment_name": "wc_fragments"
};

var mejsL10n = {
	"language": "en-US",
	"strings": {
		"Close": "Close",
		"Fullscreen": "Fullscreen",
		"Turn off Fullscreen": "Turn off Fullscreen",
		"Go Fullscreen": "Go Fullscreen",
		"Download File": "Download File",
		"Download Video": "Download Video",
		"Play": "Play",
		"Pause": "Pause",
		"Captions\/Subtitles": "Captions\/Subtitles",
		"None": "None",
		"Time Slider": "Time Slider",
		"Skip back %1 seconds": "Skip back %1 seconds",
		"Video Player": "Video Player",
		"Audio Player": "Audio Player",
		"Volume Slider": "Volume Slider",
		"Mute Toggle": "Mute Toggle",
		"Unmute": "Unmute",
		"Mute": "Mute",
		"Use Up\/Down Arrow keys to increase or decrease volume.": "Use Up\/Down Arrow keys to increase or decrease volume.",
		"Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds.": "Use Left\/Right Arrow keys to advance one second, Up\/Down arrows to advance ten seconds."
	}
};
var _wpmejsSettings = {
	"pluginPath": "\/wp-includes\/js\/mediaelement\/"
};



	
	! function(t, e, r, n, c, a, p) {
		"use strict";
		try {
			t = document.currentScript || function() {
				for (t = document.getElementsByTagName('script'), e = t.length; e--;)
					if (t[e].getAttribute('data-cfhash')) return t[e]
			}();
			if (t && (c = t.previousSibling)) {
				p = t.parentNode;
				if (a = c.getAttribute('data-cfemail')) {
					for (e = '', r = '0x' + a.substr(0, 2) | 0, n = 2; a.length - n; n += 2) e += '%' + ('0' + ('0x' + a.substr(n, 2) ^ r).toString(16)).slice(-2);
					p.replaceChild(document.createTextNode(decodeURIComponent(e)), c)
				}
				p.removeChild(t)
			}
		} catch (u) {}
	}()
	
	
	
jQuery(document).ready(function() {
	"use strict";
	if (jQuery(".rev_slider").length > 0) {initRevSlider()};
});
	
function initRevSlider() {
	"use strict";
	var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
	var htmlDivCss = "";
	if (htmlDiv) {
		htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
	} else {
		var htmlDiv = document.createElement("div");
		htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
		document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
	}
	
	
	var setREVStartSize = function() {
		"use strict";
		try {
			var e = new Object,
				i = jQuery(window).width(),
				t = 9999,
				r = 0,
				n = 0,
				l = 0,
				f = 0,
				s = 0,
				h = 0;
			e.c = jQuery('#rev_slider_1_1');
			e.responsiveLevels = [1240, 1024, 778, 480];
			e.gridwidth = [1170, 1024, 1000, 480];
			e.gridheight = [590, 590, 590, 540];

			e.sliderLayout = "auto";
			if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
					f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
				}), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
				var u = (e.c.width(), jQuery(window).height());
				if (void 0 != e.fullScreenOffsetContainer) {
					var c = e.fullScreenOffsetContainer.split(",");
					if (c) jQuery.each(c, function(e, i) {
						u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
					}), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
				}
				f = u
			} else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
			e.c.closest(".rev_slider_wrapper").css({
				height: f
			})

		} catch (d) {
			console.log("Failure at Presize of Slider:" + d)
		}
	};

	setREVStartSize();

	var tpj = jQuery;

	var revapi1;
	tpj(document).ready(function() {
		"use strict";
		if (tpj("#rev_slider_1_1").revolution == undefined) {
			revslider_showDoubleJqueryError("#rev_slider_1_1");
		} else {
			revapi1 = tpj("#rev_slider_1_1").show().revolution({
				sliderType: "standard",
				jsFileLocation: "../vendor/revslider/",
				sliderLayout: "auto",
				dottedOverlay: "none",
				delay: 9000,
				navigation: {
					keyboardNavigation: "off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation: "off",
					mouseScrollReverse: "default",
					onHoverStop: "off",
					arrows: {
						style: "hesperiden",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						tmp: '',
						left: {
							h_align: "left",
							v_align: "bottom",
							h_offset: 0,
							v_offset: -80
						},
						right: {
							h_align: "left",
							v_align: "bottom",
							h_offset: 60,
							v_offset: -80
						}
					}
				},
				responsiveLevels: [1240, 1024, 778, 480],
				visibilityLevels: [1240, 1024, 778, 480],
				gridwidth: [1170, 1024, 1000, 480],
				gridheight: [590, 590, 590, 540],
				lazyType: "none",
				shadow: 0,
				spinner: "spinner0",
				stopLoop: "off",
				stopAfterLoops: -1,
				stopAtSlide: -1,
				shuffle: "off",
				autoHeight: "off",
				disableProgressBar: "on",
				hideThumbsOnMobile: "off",
				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				debugMode: false,
				fallbacks: {
					simplifyAll: "off",
					nextSlideOnWindowFocus: "off",
					disableFocusListener: false,
				}
			});
		}
	});
	
	
	var htmlDivCss = unescape("%23rev_slider_1_1_wrapper%20%7B%0A%20%20%20%20padding%3A%200%200%2065px%200%3B%0A%7D");
		var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
		if (htmlDiv) {
			htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
		} else {
			var htmlDiv = document.createElement('div');
			htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
			document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
		}
	
	
	var htmlDivCss = unescape(".hesperiden.tparrows%20%7B%0A%09cursor%3Apointer%3B%0A%09background%3Argba%280%2C0%2C0%2C0%29%3B%0A%09width%3A40px%3B%0A%09height%3A40px%3B%0A%09position%3Aabsolute%3B%0A%09display%3Ablock%3B%0A%09z-index%3A100%3B%0A%20%20%20%20border-radius%3A%2050%25%3B%0A%7D%0A.hesperiden.tparrows%3Ahover%20%7B%0A%09background%3Argba%280%2C%200%2C%200%2C%201%29%3B%0A%7D%0A.hesperiden.tparrows%3Abefore%20%7B%0A%09font-family%3A%20%22revicons%22%3B%0A%09font-size%3A20px%3B%0A%09color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%09display%3Ablock%3B%0A%09line-height%3A%2040px%3B%0A%09text-align%3A%20center%3B%0A%7D%0A.hesperiden.tparrows.tp-leftarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce931%22%3B%0A%20%20%20%20margin-left%3A-3px%3B%0A%7D%0A.hesperiden.tparrows.tp-rightarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce930%22%3B%0A%20%20%20%20margin-right%3A-3px%3B%0A%7D%0A");
		var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
		if (htmlDiv) {
			htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
		} else {
			var htmlDiv = document.createElement('div');
			htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
			document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
		}
		
		
	function revslider_showDoubleJqueryError(sliderID) {
		"use strict";
		var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
		errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
		errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
		errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
		errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
		jQuery(sliderID).show().html(errorMessage);
	}

	
	
	
	var setREVStartSize = function() {
		"use strict";
		try {
			var e = new Object,
				i = jQuery(window).width(),
				t = 9999,
				r = 0,
				n = 0,
				l = 0,
				f = 0,
				s = 0,
				h = 0;
			e.c = jQuery('#rev_slider_4_1');
			e.responsiveLevels = [1240, 1024, 778, 480];
			e.gridwidth = [1170, 1024, 1000, 480];
			e.gridheight = [590, 590, 590, 540];

			e.sliderLayout = "auto";
			if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
					f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
				}), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
				var u = (e.c.width(), jQuery(window).height());
				if (void 0 != e.fullScreenOffsetContainer) {
					var c = e.fullScreenOffsetContainer.split(",");
					if (c) jQuery.each(c, function(e, i) {
						u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
					}), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
				}
				f = u
			} else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
			e.c.closest(".rev_slider_wrapper").css({
				height: f
			})

		} catch (d) {
			console.log("Failure at Presize of Slider:" + d)
		}
	};

	setREVStartSize();

	var tpj = jQuery;

	var revapi4;
	tpj(document).ready(function() {
		"use strict";
		if (tpj("#rev_slider_4_1").revolution == undefined) {
			revslider_showDoubleJqueryError("#rev_slider_4_1");
		} else {
			revapi4 = tpj("#rev_slider_4_1").show().revolution({
				sliderType: "standard",
				jsFileLocation: "../vendor/revslider/",
				sliderLayout: "auto",
				dottedOverlay: "none",
				delay: 9000,
				navigation: {
					keyboardNavigation: "off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation: "off",
					mouseScrollReverse: "default",
					onHoverStop: "off",
					arrows: {
						style: "hesperiden",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						tmp: '',
						left: {
							h_align: "left",
							v_align: "bottom",
							h_offset: 0,
							v_offset: -80
						},
						right: {
							h_align: "left",
							v_align: "bottom",
							h_offset: 60,
							v_offset: -80
						}
					}
				},
				responsiveLevels: [1240, 1024, 778, 480],
				visibilityLevels: [1240, 1024, 778, 480],
				gridwidth: [1170, 1024, 1000, 480],
				gridheight: [590, 590, 590, 540],
				lazyType: "none",
				shadow: 0,
				spinner: "spinner0",
				stopLoop: "off",
				stopAfterLoops: -1,
				stopAtSlide: -1,
				shuffle: "off",
				autoHeight: "off",
				disableProgressBar: "on",
				hideThumbsOnMobile: "off",
				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				debugMode: false,
				fallbacks: {
					simplifyAll: "off",
					nextSlideOnWindowFocus: "off",
					disableFocusListener: false,
				}
			});
		}
	});	
		
	var htmlDivCss = unescape("%23rev_slider_4_1_wrapper%20%7B%0A%20%20%20%20padding%3A%200%200%2065px%200%3B%0A%7D");
	var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
	if (htmlDiv) {
		htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
	} else {
		var htmlDiv = document.createElement('div');
		htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
		document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
	}
	
	
	var htmlDivCss = unescape(".hesperiden.tparrows%20%7B%0A%09cursor%3Apointer%3B%0A%09background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%09width%3A40px%3B%0A%09height%3A40px%3B%0A%09position%3Aabsolute%3B%0A%09display%3Ablock%3B%0A%09z-index%3A100%3B%0A%20%20%20%20border-radius%3A%2050%25%3B%0A%7D%0A.hesperiden.tparrows%3Ahover%20%7B%0A%09background%3Argba%280%2C%200%2C%200%2C%201%29%3B%0A%7D%0A.hesperiden.tparrows%3Abefore%20%7B%0A%09font-family%3A%20%22revicons%22%3B%0A%09font-size%3A20px%3B%0A%09color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%09display%3Ablock%3B%0A%09line-height%3A%2040px%3B%0A%09text-align%3A%20center%3B%0A%7D%0A.hesperiden.tparrows.tp-leftarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce931%22%3B%0A%20%20%20%20margin-left%3A-3px%3B%0A%7D%0A.hesperiden.tparrows.tp-rightarrow%3Abefore%20%7B%0A%09content%3A%20%22%5Ce930%22%3B%0A%20%20%20%20margin-right%3A-3px%3B%0A%7D%0A");
	var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
	if (htmlDiv) {
		htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
	} else {
		var htmlDiv = document.createElement('div');
		htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
		document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
	}
	
	var setREVStartSize = function() {
		"use strict";
		try {
			var e = new Object,
				i = jQuery(window).width(),
				t = 9999,
				r = 0,
				n = 0,
				l = 0,
				f = 0,
				s = 0,
				h = 0;
			e.c = jQuery('#rev_slider_5_1');
			e.responsiveLevels = [1240, 1024, 778, 480];
			e.gridwidth = [1170, 1170, 1000, 480];
			e.gridheight = [590, 590, 590, 540];

			e.sliderLayout = "auto";
			if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
					f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
				}), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
				var u = (e.c.width(), jQuery(window).height());
				if (void 0 != e.fullScreenOffsetContainer) {
					var c = e.fullScreenOffsetContainer.split(",");
					if (c) jQuery.each(c, function(e, i) {
						u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
					}), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
				}
				f = u
			} else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
			e.c.closest(".rev_slider_wrapper").css({
				height: f
			})

		} catch (d) {
			console.log("Failure at Presize of Slider:" + d)
		}
	};

	setREVStartSize();

	var tpj = jQuery;

	var revapi5;
	tpj(document).ready(function() {
		"use strict";
		if (tpj("#rev_slider_5_1").revolution == undefined) {
			revslider_showDoubleJqueryError("#rev_slider_5_1");
		} else {
			revapi5 = tpj("#rev_slider_5_1").show().revolution({
				sliderType: "standard",
				jsFileLocation: "//hradvisor.axiomthemes.com/wp-content/plugins/revslider/public/assets/js/",
				sliderLayout: "auto",
				dottedOverlay: "none",
				delay: 9000,
				navigation: {
					onHoverStop: "off",
				},
				responsiveLevels: [1240, 1024, 778, 480],
				visibilityLevels: [1240, 1024, 778, 480],
				gridwidth: [1170, 1170, 1000, 480],
				gridheight: [590, 590, 590, 540],
				lazyType: "none",
				shadow: 0,
				spinner: "spinner0",
				stopLoop: "off",
				stopAfterLoops: -1,
				stopAtSlide: -1,
				shuffle: "off",
				autoHeight: "off",
				disableProgressBar: "on",
				hideThumbsOnMobile: "off",
				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				debugMode: false,
				fallbacks: {
					simplifyAll: "off",
					nextSlideOnWindowFocus: "off",
					disableFocusListener: false,
				}
			});
		}
	});
	
}


