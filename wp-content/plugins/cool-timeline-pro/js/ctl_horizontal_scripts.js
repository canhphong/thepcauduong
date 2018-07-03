jQuery('document').ready(function($){
	$(".cool-timeline-horizontal").find("a[class^='ctl_prettyPhoto']").prettyPhoto({
		social_tools: false
	});
	$(".cool-timeline-horizontal").find("a[rel^='ctl_prettyPhoto']").prettyPhoto({
		social_tools: false
	});
	
	//cool-timeline-horizontal
	$( '.cool-timeline-horizontal.ht-default').each(function( index ) {
		var slider_id ="#"+ $(this).attr('date-slider');
		var slider_nav_id ="#"+ $(this).attr('data-nav');
		var data_rtl =$(this).attr('data-rtl');	
		var rtl=(data_rtl === "true");
		$(slider_id).slick({
			slidesToShow 	:1,
			slidesToScroll 	:1,
			rtl:rtl,
			asNavFor 		:slider_nav_id,
			arrows			:false,
			dots 			: false,
			infinite: false,
			adaptiveHeight: true,

			responsive 		: [
				{
					breakpoint: 768,
					settings: {
				//		arrows: true,
					//	centerMode: true,
						centerPadding: '10px',
						slidesToShow:1
					}
				},
				{
					breakpoint: 480,
					settings: {
					//	arrows: true,
					//	centerMode: true,
						centerPadding: '10px',
						slidesToShow: 1
					}
				}
			]});
		$(slider_nav_id).slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			asNavFor:slider_id,
			dots: false,
			infinite: false,
			rtl:rtl,
		//	centerMode: true,
			nextArrow: '<button type="button" class="ctl-slick-next "><i class="fa fa fa-arrow-circle-o-right"></i></button>',
  			prevArrow: '<button type="button" class="ctl-slick-prev"><i class="fa fa fa-arrow-circle-o-left"></i></button>',
			focusOnSelect: true,
			adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint: 768,
					settings: {
						arrows: true,
					//	centerMode: true,
						centerPadding: '10px',
						slidesToShow:1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
					//	centerMode: true,
						centerPadding: '10px',
						slidesToShow: 1
					}
				}
			]
			});

	});

	// Design 2 settings


	$( '.cool-timeline-horizontal.ht-design-2' ).each(function( index ) {
		var slider_id ="#"+ $(this).attr('date-slider');
		var slider_nav_id ="#"+ $(this).attr('data-nav');
		var items =parseInt($(this).attr('data-items'));
		var data_rtl =$(this).attr('data-rtl');	
		var rtl=(data_rtl === "true");
		$(slider_id).slick({
			slidesToShow:items,
			slidesToScroll 	:1,
			asNavFor 		:slider_nav_id,
			arrows			:false,
			dots 			: false,
			rtl:rtl,
			infinite: false,
			adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint:980,
					settings: {
						slidesToShow: 2,
						slidesToScroll:2,
						centerPadding: '10px'
					}
				},
				{
					breakpoint: 768,
					settings: {
						//		arrows: true,
						//	centerMode: true,
						slidesToShow:1,
						slidesToScroll 	:1,
						centerPadding: '10px'

					}
				},
				{
					breakpoint: 480,
					settings: {
						//	arrows: true,
						//	centerMode: true,
						slidesToShow 	:1,
						slidesToScroll 	:1,
						centerPadding: '10px',

					}
				}
			]});
		$(slider_nav_id).slick({
			slidesToShow:items,
			slidesToScroll 	:1,
			asNavFor:slider_id,
			dots: false,
			rtl:rtl,
			focusOnSelect: true,
				infinite: false,
			//adaptiveHeight: true,
			nextArrow: '<button type="button" class="ctl-slick-next "><i class="fa fa fa-arrow-circle-o-right"></i></button>',
  			prevArrow: '<button type="button" class="ctl-slick-prev"><i class="fa fa fa-arrow-circle-o-left"></i></button>',
		
			responsive 		: [
				{
					breakpoint:980,
					settings: {
						slidesToShow: 2,
						slidesToScroll:2,
						centerPadding: '10px',
					}
				},
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow:1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow: 1
					}
				}
			]
		});

	});

	$('.cool-timeline-horizontal.ht-design-3' ).each(function( index ) {

	var slider_id ="#"+ $(this).attr('date-slider');
		var slider_nav_id ="#"+ $(this).attr('data-nav');
		var items =parseInt($(this).attr('data-items'));
		var data_rtl =$(this).attr('data-rtl');	
		var rtl=(data_rtl === "true");
		$(slider_id).slick({
			slidesToShow 	:items,
			slidesToScroll 	:1,
			asNavFor 		:slider_nav_id,
			arrows			:false,
			dots 			: false,
				infinite: false,
				rtl:rtl,
			adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint:980,
					settings: {
						slidesToShow: 2,
						slidesToScroll:2,
						centerPadding: '10px',
					}
				},
				{
					breakpoint: 768,
					settings: {
						//		arrows: true,
						//	centerMode: true,
						slidesToShow 	:1,
						slidesToScroll 	:1,
						centerPadding: '10px',

					}
				},
				{
					breakpoint: 480,
					settings: {
						//	arrows: true,
						//	centerMode: true,
						slidesToShow 	:1,
						slidesToScroll 	:1,
						centerPadding: '10px',

					}
				}
			]});
		$(slider_nav_id).slick({
			slidesToShow: items,
			slidesToScroll:1,
			asNavFor:slider_id,
			dots: false,
			rtl:rtl,
			focusOnSelect: true,
			infinite: false,
			nextArrow: '<button type="button" class="ctl-slick-next ctl-flat-left"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
  			prevArrow: '<button type="button" class="ctl-slick-prev ctl-flat-right"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
		
		//	adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint:980,
					settings: {
						slidesToShow: 2,
						slidesToScroll:2,
						centerPadding: '10px',
					}
				},
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow:1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow: 1
					}
				}
			]
		});

	});


	//design 4

	$('.cool-timeline-horizontal.ht-design-4' ).each(function( index ) {

		var slider_id ="#"+ $(this).attr('date-slider');
		var slider_nav_id ="#"+ $(this).attr('data-nav');
		var items =parseInt($(this).attr('data-items'));
		var data_rtl =$(this).attr('data-rtl');	
		var rtl=(data_rtl === "true");
		$(slider_id).slick({
			slidesToShow 	:items,
			slidesToScroll 	:1,
			asNavFor 		:slider_nav_id,
			arrows			:true,
			dots 			: false,
			rtl:rtl,
				infinite: false,
			nextArrow: '<button type="button" class="ctl-slick-next ctl-flat-left design-4-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
  			prevArrow: '<button type="button" class="ctl-slick-prev ctl-flat-right design-4-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
			
		//	adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint:980,
					settings: {
						slidesToShow: 2,
						slidesToScroll:2,
						centerPadding: '10px'
					}
				},
				{
					breakpoint: 768,
					settings: {
						//		arrows: true,
						//	centerMode: true,
						slidesToShow 	:1,
						slidesToScroll 	:1,
						centerPadding: '10px',

					}
				},
				{
					breakpoint: 480,
					settings: {
						//	arrows: true,
						//	centerMode: true,
						slidesToShow 	:1,
						slidesToScroll 	:1,
						centerPadding: '10px',

					}
				}
			]});
		$(slider_nav_id).slick({
			slidesToShow: items,
			slidesToScroll 	:1,
			asNavFor:slider_id,
			dots: false,
			focusOnSelect: true,
			infinite: false,
			rtl:rtl,
			nextArrow: '<button type="button" class="ctl-slick-next ctl-flat-left design-4-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>',
  			prevArrow: '<button type="button" class="ctl-slick-prev ctl-flat-right design-4-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>',
			
		//	adaptiveHeight: true,
			responsive 		: [
				{
					breakpoint: 768,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow:1
					}
				},
				{
					breakpoint: 480,
					settings: {
						arrows: true,
						//	centerMode: true,
						centerPadding: '10px',
						slidesToShow: 1
					}
				}
			]
		});

	});

});