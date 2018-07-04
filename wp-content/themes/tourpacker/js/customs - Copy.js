
(function($){

	"use strict";
	

	$(document).ready(function(){
		
		
		
		/**
		 * introLoader - Preloader
		 */
		$("#introLoader").introLoader({
			animation: {
					name: 'gifLoader',
					options: {
							ease: "easeInOutCirc",
							style: 'dark bubble',
							delayBefore: 500,
							delayAfter: 0,
							exitTime: 300
					}
			}
		});	
		
		
		
		/**
		 * Windows Height
		 */
		var width = $(window).width(), height = $(window).height();
		if ((width > 1025)) {
			
			// SET THE DIV TO THE WINDOW HEIGHT
			$('.windows-height-bg').css({'height':($(window).height())+'px'});
			// RESIZE THE HEIGHT IF THE WINDOW IS RESIZED
			$(window).resize(function(){
				$('.windows-height-bg').css({'height':($(window).height())+'px'});
			});
			
		}

		
		
		/**
		 * Sticky Header
		 */
		$(".container-wrapper").waypoint(function() {
			$(".navbar").toggleClass("navbar-sticky-function");
			$(".navbar").toggleClass("navbar-sticky");
			return false;
		}, { offset: "-20px" });
		
		
		
		/**
		 * Main Menu Slide Down Effect
		 */
		if ($(window).width() >= '751') {
			$('#navbar li').hover(function () {
				$(this).children('ul').stop(true, true).delay(350).slideDown(500, 'easeInOutQuad');
			}, function () {
				$(this).children('ul').stop(true, true).delay(100).slideUp(150, 'easeInOutQuad');
			});
		}
		
		
		
		/**
		 * Slicknav - a Mobile Menu
		 */
		var $slicknav_label;
		$('#responsive-menu').slicknav({
			duration: 300,
			easingOpen: 'easeInExpo',
			easingClose: 'easeOutExpo',
			closedSymbol: '<i class="fa fa-plus"></i>',
			openedSymbol: '<i class="fa fa-minus"></i>',
			prependTo: '#slicknav-mobile',
			allowParentLinks: true,
			label:"" 
		});
		
		
		
		/**
		 * Smooth scroll to anchor
		 */
		$(function() {
			$('a.anchor[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					var target = $(this.hash);
					target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					if (target.length) {
						$('html,body').animate({
							scrollTop: (target.offset().top - 120) // 70px offset for navbar menu
						}, 1000);
						return false;
					}
				}
			});
		});
		
		
		
		/**
		 * Sign-in Modal
		 */
		$(function() {
		
			var $formLogin = $('#login-form');
			var $formLost = $('#lost-form');
			var $formRegister = $('#register-form');
			var $divForms = $('#modal-login-form-wrapper');
			var $modalAnimateTime = 300;
			
			$('#login_register_btn').click( function () { modalAnimate($formLogin, $formRegister) });
			$('#register_login_btn').click( function () { modalAnimate($formRegister, $formLogin); });
			$('#login_lost_btn').click( function () { modalAnimate($formLogin, $formLost); });
			$('#lost_login_btn').click( function () { modalAnimate($formLost, $formLogin); });
			$('#lost_register_btn').click( function () { modalAnimate($formLost, $formRegister); });
			$('#register_lost_btn').click( function () { modalAnimate($formRegister, $formLost); });
			
			function modalAnimate ($oldForm, $newForm) {
				var $oldH = $oldForm.height();
				var $newH = $newForm.height();
				$divForms.css("height",$oldH);
				$oldForm.fadeToggle($modalAnimateTime, function(){
					$divForms.animate({height: $newH}, $modalAnimateTime, function(){
						$newForm.fadeToggle($modalAnimateTime);
					});
				});
			}
				
		});
		
		
		
		/**
		 * Customized Bootstrap Dropdown
		 */
		$('.bt-dropdown-click').on('show.bs.dropdown', function(e) {   
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(500, 'easeInOutQuad'); 
		}); 
		$('.bt-dropdown-click').on('hide.bs.dropdown', function(e) { 
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(250, 'easeInOutQuad'); 
		});
		$('.bt-dropdown-hover').hover(function(e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideDown(500, 'easeInOutQuad');
		}, function(e) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp(250, 'easeInOutQuad');
		});
		

		
		/**
		 * Icon Change on Collapse
		 */
		$('.collapse.in').prev('.panel-heading').addClass('active');
		$('.bootstarp-accordion, .bootstarp-toggle').on('show.bs.collapse', function(a) {
			$(a.target).prev('.panel-heading').addClass('active');
		})
		.on('hide.bs.collapse', function(a) {
			$(a.target).prev('.panel-heading').removeClass('active');
		});

		
		
		/**
		 * Another Bootstrap Toggle
		 */
		$('.another-toggle').each(function(){
			if( $('h4',this).hasClass('active') ){
				$(this).find('.another-toggle-content').show();
			}
		});
		$('.another-toggle h4').click(function(){
			if( $(this).hasClass('active') ){
				$(this).removeClass('active');
				$(this).next('.another-toggle-content').slideUp();
			} else {
				$(this).addClass('active');
				$(this).next('.another-toggle-content').slideDown();
			}
		});
		
		
		
		/**
		 * select2 - custom select
		 */
		$(".select2-single").select2({allowClear: true});
		$(".select2-no-search").select2({dropdownCssClass : 'select2-no-search',allowClear: true});
		$(".select2-multi").select2({});
		
		
		
		/**
		 * Show more-less button
		 */
		$('.btn-more-less').click(function(){
			$(this).text(function(i,old){
				return old=='Show more' ?  'Show less' : 'Show more';
			});
		});

		
		
		/**
		 *  Arrow for Menu has sub-menu
		 */
		if ($(window).width() > 992) {
			$(".navbar-arrow > ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-down'></i>");
		}
		if ($(window).width() > 992) {
			$(".navbar-arrow ul ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-right'></i>");
		}
		
		
		
		/**
		 *  Placeholder
		 */
		$("input, textarea").placeholder();

	
	
		/**
		 * Bootstrap tooltips
		 */
		 $('[data-toggle="tooltip"]').tooltip();
		 
		 
		 
		/**
		 * responsivegrid - layout grid
		 */
		$('.grid').responsivegrid({
			gutter : '0',
			itemSelector : '.grid-item',
			'breakpoints': {
				'desktop' : {
					'range' : '1200-',
					'options' : {
						'column' : 20,
					}
				},
				'tablet-landscape' : {
					'range' : '1000-1200',
					'options' : {
						'column' : 20,
					}
				},
				'tablet-portrate' : {
					'range' : '767-1000',
					'options' : {
						'column' : 20,
					}
				},
				'mobile-landscape' : {
					'range' : '-767',
					'options' : {
						'column' : 10,
					}
				},
				'mobile-portrate' : {
					'range' : '-479',
					'options' : {
						'column' : 10,
					}
				},
			}
		});
		
		
		
		/**
		 * Payment Option
		 */
		$("div.payment-option-form").hide();
		$("input[name$='payments']").click(function() {
				var test = $(this).val();
				$("div.payment-option-form").hide();
				$("#" + test).show();
		});
		
		
		
		/**
		 * Raty - Rating Star
		 */
		$.fn.raty.defaults.path = 'images/raty';
		$('.star-rating').raty({
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return $(this).attr('rating-score');
			}
		});
		
		$('.star-rating-read-only').raty({
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return $(this).attr('rating-score');
			}
		});
		
		$('.star-rating-12px').raty({
			path: 'images/raty',
			starHalf: 'star-half-sm.png',
			starOff: 'star-off-sm.png',
			starOn: 'star-on-sm.png',
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return $(this).attr('rating-score');
			}
		});
		
		$('.star-rating-white').raty({
			path: 'images/raty',
			starHalf: 'star-half-white.png',
			starOff: 'star-off-white.png',
			starOn: 'star-on-white.png',
			readOnly: true,
			round : { down: .2, full: .6, up: .8 },
			half: true,
			space: false,
			score: function() {
				return $(this).attr('rating-score');
			}
		});
		
		
		
		/**
		 * readmore - read more/less
		 */
		$('.read-more-div').readmore({
			speed: 220,
			moreLink: '<a href="#" class="read-more-div-open">Read More</a>',
			lessLink: '<a href="#" class="read-more-div-close">Read less</a>',
			collapsedHeight: 45,
			heightMargin: 25
		});

		
		
		/**
		 * ionRangeSlider - range slider
		 */
		$("#price_range").ionRangeSlider({
			type: "double",
			grid: true,
			min: 0,
			max: 1000,
			from: 200,
			to: 800,
			prefix: "$"
		});
		
		$("#star_range").ionRangeSlider({
			type: "double",
			grid: false,
			from: 1,
			to: 2,
			values: [
				"<i class='fa fa-star'></i>", 
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i>",
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>", 
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>",
				"<i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i> <i class='fa fa-star'></i>" 
			]
		});
		
		$("#range_03").ionRangeSlider({
			type: "double",
			grid: true,
			min: 0,
			max: 1000,
			from: 200,
			to: 800,
			prefix: "$"
		});
		
		

		/**
		 * slick
		 */
		$('.gallery-slideshow').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			speed: 500,
			arrows: true,
			fade: true,
			asNavFor: '.gallery-nav'
		});
		$('.gallery-nav').slick({
			slidesToShow: 7,
			slidesToScroll: 1,
			speed: 500,
			asNavFor: '.gallery-slideshow',
			dots: false,
			centerMode: true,
			focusOnSelect: true,
			infinite: true,
			responsive: [
				{
				breakpoint: 1199,
				settings: {
					slidesToShow: 7,
					}
				}, 
				{
				breakpoint: 991,
				settings: {
					slidesToShow: 5,
					}
				}, 
				{
				breakpoint: 767,
				settings: {
					slidesToShow: 5,
					}
				}, 
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 3,
					}
				}
			]
		});


		
		/**
		 * Back To Top
		 */
		$(window).scroll(function(){
			if($(window).scrollTop() > 500){
				$("#back-to-top").fadeIn(200);
			} else{
				$("#back-to-top").fadeOut(200);
			}
		});
		$('#back-to-top, .back-to-top').click(function() {
			  $('html, body').animate({ scrollTop:0 }, '800');
			  return false;
		});
		
		
		
		/**
		 * Instagram
		 */
		function createPhotoElement(photo) {
			var innerHtml = $('<img>')
			.addClass('instagram-image')
			.attr('src', photo.images.thumbnail.url);

			innerHtml = $('<a>')
			.attr('target', '_blank')
			.attr('href', photo.link)
			.append(innerHtml);

			return $('<div>')
			.addClass('instagram-placeholder')
			.attr('id', photo.id)
			.append(innerHtml);
		}

		function didLoadInstagram(event, response) {
			var that = this;

			$.each(response.data, function(i, photo) {
			$(that).append(createPhotoElement(photo));
			});
		}

		$(document).ready(function() {
			
			$('#instagram').on('didLoadInstagram', didLoadInstagram);
			$('#instagram').instagram({
			count: 20,
			userId: 302604202,
			accessToken: '735306460.4814dd1.03c1d131c1df4bfea491b3d7006be5e0'
			});

		});
		
	});

})(jQuery);



/**
 * Wow plugin bottom offset calculation
 */

jQuery(document).ready(function () {
	wow = new WOW(
			{
				animateClass: 'animated',
				offset: 120,
				mobile: true
			}
	);
	wow.init();
});
