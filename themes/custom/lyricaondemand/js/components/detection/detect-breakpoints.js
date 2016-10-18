var $ = jQuery;
$(document).ready(function() {
	desktop_browser_width();
	breakpointClass();
});

/*****************************************************************
------------------------------------------------------------------
Desktop - Browser Specific Width
------------------------------------------------------------------
*****************************************************************/
function desktop_browser_width() {		
	set_width = function()	{		
		winWidth=Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
		if(winWidth <= 767) {
			$('body').addClass('bw-mobile').removeClass('bw-tablet bw-desktop');
		}
		else if(winWidth > 767 && winWidth < 1024) {
			$('body').addClass('bw-tablet').removeClass('bw-mobile bw-desktop');					
		}
		else if(winWidth > 1023) {
			$('body').addClass('bw-desktop').removeClass('bw-tablet bw-mobile');					
		}
	};
	$(window).resize(function () {
		setTimeout (function(){
			set_width();
			breakpointClass();		
		});	
	});			
	set_width();
}

/*****************************************************************
------------------------------------------------------------------
Function - Breakpoint Specific Class
------------------------------------------------------------------
*****************************************************************/
function breakpointClass() {
	dsk_mobile = $('body').hasClass('bw-mobile'),
	dsk_desktop = $('body').hasClass('bw-desktop'),
	dsk_tablet = $('body').hasClass('bw-tablet');
}