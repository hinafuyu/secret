$(function () {

	$(".nav").each(function(){
		var $window = $(window),
			$header = $(this),
			headerOffsetTop = $header.offset().top;

		$window.on("scroll",function(){
			if($window.scrollTop() > headerOffsetTop) {
				$header.addClass("sticky");
			} else {
				$header.removeClass("sticky");
			}
		});
		$window.trigger("scroll");
	})

	$(".sign-in").click(function () {
		$(".popup").css({ "visibility": "visible" });
	})
	$(".popup-back").click(function () {
		$(".popup").css({ "visibility": "hidden" });
	})

	
	$(".burger").click(function () {
		$(".burger-menu").css({ "visibility": "visible" });
	})
	$(".burger-back").click(function () {
		$(".burger-menu").css({ "visibility": "hidden" });
	})

	

});