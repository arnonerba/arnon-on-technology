// Minified by javascript-minifier.com
jQuery(document).ready(function() {
	jQuery("i.shownav").click(function(event) {
		jQuery("#navdrawer").toggleClass("navdraweropen");
		jQuery("#scrim").toggleClass("visible");
		jQuery(document.body).toggleClass("noscroll");
		event.stopPropagation();
	});
	jQuery("#scrim").click(function(event) {
		jQuery("#navdrawer").removeClass("navdraweropen");
		jQuery("#scrim").removeClass("visible");
		jQuery(document.body).removeClass("noscroll");
	});
	jQuery("pre").each(function(i, block) {
		hljs.highlightBlock(block);
	});
});
jQuery(window).scroll(function() {
	if (jQuery(document).scrollTop() > 0) {
		jQuery("#header").addClass("scrolled");
	} else {
		jQuery("#header").removeClass("scrolled");
	}
});
