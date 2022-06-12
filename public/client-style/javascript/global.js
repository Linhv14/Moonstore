$(document).ready(function() {

	$('#main-banner,.gellery').owlCarousel({		
		autoPlay: 5000,
		singleItem: true,
		navigation: true,
		pagination: true,
		transitionStyle : "fade"
	});
		$('#latestblog').owlCarousel({		
		autoPlay: 5000,
		singleItem: true,
		navigation: false,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,


	});
	
	$('.content #special-slider').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});


	$('#latest-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#special-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,		
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#related-slidertab').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 3],
		itemsTabletSmall : false,
		itemsMobile : [479, 2]
	});

	 $('#brand_carouse').owlCarousel({
        items: 6,
        navigation: true,
        pagination: false
    });

	$('.content #latest-blog').owlCarousel({
		items: 3,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1],
	});


	$('#related-slider').owlCarousel({
		items: 4,
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 3],
		itemsDesktopSmall : [979, 2],
		itemsTablet : [768, 2],
		itemsTabletSmall : false,
		itemsMobile : [479, 1]
	});
	$('#product-thumbnail').owlCarousel({
		navigation: true,
		pagination: false,
		itemsDesktop : [1199, 4],
		itemsDesktopSmall : [979, 3],
		itemsTablet : [768, 4],
		itemsTabletSmall : false,
		itemsMobile : [479, 3]
	});
	
});

$.fn.tabs = function() {
	var selector = this;
	this.each(function() {
		var obj = $(this);
		$(obj.attr('href')).hide();
		obj.click(function() {
			$(selector).removeClass('selected');
			$(this).addClass('selected');
			$($(this).attr('href')).fadeIn();
			$(selector).not(this).each(function(i, element) {
					$($(element).attr('href')).hide();
			});
			return false;
		});
	});
	$(this).show();
	$(this).first().click();
};

