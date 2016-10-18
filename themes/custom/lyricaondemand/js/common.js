jQuery(document).ready(function(){
	/* Handles main menu visibility */

	$('.logged-in .main-menu-toggler').off('click').on('click', function() {
	    $('.navigation-wrap').show().addClass('expand');
	    $('.navigation-wrap li.close-btn').off('click').on('click', function() {
			$('.navigation-wrap').removeClass('expand').hide();
		});
	});

	// show current menu object highlighted
	var url = window.location.pathname;
	var checkString;
	// now grab every link from the navigation
	$('#block-system-main-menu a').each(function () {
		// and test its href against the url pathname
		checkString = url.match($(this).attr('href'));
		if ((checkString !== null && $(this).attr('href') !== '/') || (url === $(this).attr('href'))) {
			$(this).addClass('active');
		}
		if(top.location.pathname === '/') {
			$('#block-system-main-menu  ul li:nth-child(2) a').addClass('active');
		}
	});
});

jQuery(window).load(function() {
	setTimeout(function(){
		setViewHeaderHeight();
	}, 100);
});

jQuery(window).smartresize(function() {
	$('.views-field-title').removeAttr("style");
	setViewHeaderHeight();
	$('.main').css('padding-bottom', (Number($('.footer-wrap').outerHeight()) + 60) + 'px');
});

function setViewHeaderHeight() {
	if($('.view-content .views-field-title').length > 0) {
		var maxHeight = -1,
			targetElement = 0;
		$('.view-content').each(function() {
			targetElement = $(this).find(".views-field-title");
			if ($(targetElement).height() > maxHeight) {
				maxHeight = $(targetElement).height();
			}
		});
		if(maxHeight) {
			$(targetElement).height(maxHeight);
			$(targetElement).css('min-height', maxHeight + 'px');
		}
	}
}
