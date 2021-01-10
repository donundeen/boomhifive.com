
let slickOptions = {
variableWidth: false,
adaptiveHeight:true,

}

$(document).ready(function() {




	$(".item_slides").on("init", function(event, slick) {
		console.log("slick init");
		console.log(slick);
		console.log(event.target);
	});
	
	$(".item_slides").on("reInit", function(event, slick) {
		console.log("slick reInit");
	});

	$(".item_slides").on("destroy", function(event, slick){
		console.log("destroyed");
	});



	console.log("portfolio.js");
	$(".nextlink").click(function() {
		console.log("next");
		// find next sibling...
		if ($(this).closest(".grid-item").next(".in-sequence").length > 0) {
			$(this).closest(".grid-item").next(".in-sequence").find(".item_header").trigger("click");
		} else {
			console.log("goign to first");
			console.log($(this).closest(".grid-item").siblings(".in-sequence").first().length);
			$(this).closest(".grid-item").siblings(".in-sequence").first().find(".item_header").trigger("click");
		}
	});
	$(".prevlink").click(function() {
		console.log("prev");
		// find next sibling...
		if ($(this).closest(".grid-item").prev(".in-sequence").length > 0) {
			$(this).closest(".grid-item").prev(".in-sequence").find(".item_header").trigger("click");
		} else {
			console.log("goign to last");
			$(this).closest(".grid-item").siblings(".in-sequence").last().find(".item_header").trigger("click");
		}
	});
});



$(document).ready(function() {
	//jQuery(".fitted").fitText();
	var $grid = $(".grid").masonry({
		// options
		itemSelector: ".grid-item",
		columnWidth: 240,
		gutter: 20,
		transitionDuration: "1.0s"
	});
	jQuery(".fitted").fitText();
	/*
	$grid.imagesLoaded().progress( function() {
	$grid.masonry('layout');
	});
	*/

	//	$(".item_slides").slick();


	$(".grid-item .item_header").click(function() {

	//	$(".slick_initialized").slick("unslick");

		if (
			$(this)
			.parent()
			.hasClass("maxed")
		) {
			$(this)
				.parent()
				.removeClass("maxed");
		} else {
			$(".maxed").toggleClass("maxed");
			$(this)
				.parent()
				.addClass("maxed");
		}
		//$(this).parent().toggleClass("maxed");
		(function(_this, _grid) {
			_grid.on("layoutComplete", function(soInstance, laidOutItems ) {

				jQuery(".fitted").fitText();
				$("html, body").animate({
						scrollTop: $(_this).offset().top - 20
					},
					1000
				);

				console.log("layoutcomplete");
				console.log(_this);
				$(_this).closest(".grid-item").find(".item_slides").not('.slick-initialized').slick(slickOptions);

				_grid.off("layoutComplete");
			});
		})(this, $grid);
		$grid.masonry("layout");

	});




});