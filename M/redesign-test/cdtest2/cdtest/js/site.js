$(document).ready(function() {

	$(".smoothScroll").click(function(event) {		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top - $("#menuBar").height()}, 500);
	});

	$(window).bind("resize", resized);
	$(window).bind("scroll", scrolled);

	$('#yarnDetailsShowLink').click(function(event) {
		$('#yarnDetails').slideDown();
		$('#yarnDetailsHideLink').show();
		$('#yarnDetailsShowLink').hide();
		return false;
	});

	$('#yarnDetailsHideLink').click(function(event) {
		$('#yarnDetails').slideUp();
		$('#yarnDetailsHideLink').hide();
		$('#yarnDetailsShowLink').show();
		return false;
	});
	
	resized();
});

function resized() {
	$("#overview").css('margin-top', $(window).height() + 'px');
	scrolled();
}

function scrolled() {

	var docViewTop = $(window).scrollTop();
	var docViewBottom = docViewTop + $(window).height();
	var titleBarHeight = $("#menuBar").height();

	var firstPage = $("#overview");

	if ((firstPage.offset().top) <= (docViewTop + titleBarHeight))
	{
		$("#menuBarLogo").show();
	}
	else
	{
		$("#menuBarLogo").hide();
	}

	var currentPage = null;
	var numPages = $(".page").length;

	$(".page").each(function(index) {

		var elemTop = $(this).offset().top;
		var elemBottom = elemTop + $(this).height();

		if (elemTop <= (docViewTop + titleBarHeight) && elemBottom > docViewTop) {
			currentPage = $(this);
		}

		if (index == (numPages - 1)) {
			if (elemBottom < docViewBottom) {
				currentPage = $(this);
			}
		}
	}); 

	$(".menuLink").each(function(index) {

		$(this).removeClass('selected');

		if (currentPage != null) {
			if ($(this).attr("href").replace('#', '') == currentPage.attr("id")) {
				$(this).addClass('selected');
			}
		}
	});

}