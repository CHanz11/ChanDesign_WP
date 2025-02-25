$(document).ready(function(){

	// Global Variables

		var toggle_primary_button = $('.nav_toggle_button'),
				toggle_primary_icon = $('.nav_toggle_button i'),
				toggle_secondary_button = $('.page_nav li span'),
				primary_menu = $('.page_nav'),
				secondary_menu = $('.page_nav ul ul'),
				webHeight = $(document).height(),
				window_width = $(window).width();

	// Company name and phone number on content area
$("main,aside,#banner,#middle,#bottom1,#bottom2,#bottom3,#bottom4,footer p")
.not(".woocommerce")
.each(function () {
  const regex1 =
	/(?![^<]+>)((\+\d{1,2}[\s.-])?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{6})/g;
  const regex2 =
	/(?![^<]+>)((\+\d{1,2}[\s.-])?\(?\d{3}\)?[\s.-]?\d{4}[\s.-]?\d{4})/g;
  const regex =
	/(?![^<]+>)((\+\d{1,2}[\s.-])?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4})/g;
  $(this).html(
	$(this)
	  .html()
	  .replace(/OKU Staffing &amp; Consulting LLC/g, "<mark class='comp'>$&</mark>")
	  .replace(regex1, "<mark class='main_phone'>$&</mark>")
	  .replace(regex2, "<mark class='main_phone'>$&</mark>")
	  .replace(regex, "<mark class='main_phone'>$&</mark>")
  );
});

// Removes the .comp class on the following html attributes to avoid broken links
const attributes = [
"href",
"src",
"action",
"data",
"formaction",
"xlink\\:href",
];

// Iterate over each attribute
attributes.forEach((attr) => {
// Select elements with the current attribute
$(`[${attr}]`).each(function () {
  // Get the attribute value
  let value = $(this).attr(attr);

  // Replace <mark class='comp'> and </mark> with an empty string
  if (!value) return;
  if (value && /<mark class='comp'>/.test(value)) {
	value = value
	  .replace(/<mark class='comp'>/g, "")
	  .replace(/<\/mark>/g, "");
	$(this).attr(attr, value);
  }
});
});

		$("main a[href]").each(function() {
		   var newHref = $(this).attr('href').replace("<mark class='comp'>", "").replace("</mark>", "");
			 $(this).attr('href', newHref);
		});

		// Forms on content area
		var form = $('main').find('#myframe');
			if(form.length > 0) {
			document.getElementById('myframe').onload = function(){
			  calcHeight();
			};
		}

	// Add class to tab having drop down
	$( ".page_nav li:has(ul)").find('span i').addClass("fa-caret-down");


	//Multi-line Tab
	toggle_secondary_button.click(function(){
		$(this).parent('li').siblings('li').children('ul').slideUp(400, function() {
			$(this).removeAttr('style');
		});

		$(this).parent('li').siblings('li').find('.fa').removeClass("fa-caret-up").addClass("fa-caret-down");

		$(this).parent('li').children('ul').slideToggle();
		$(this).children().toggleClass("fa-caret-up").toggleClass("fa-caret-down");
	});

	// Basic functionality for nav_toggle

	var hamburger = $(".hamburger");
    // hamburger.each(function(){
        // $(this).click(function(){
         // $(this).toggleClass("is-active");
        // });
      // });

	hamburger.click(function(){
		primary_menu.addClass('toggle_right_style');
		$('.toggle_right_nav').addClass('toggle_right_cont');
		$(".nav_toggle_button").toggleClass('active');
		$(".hamburger").toggleClass("is-active");
		$('body').addClass('active');
	});


	$('.toggle_nav_close, .menu_slide_right .hamburger').click(function(){
		primary_menu.removeClass('toggle_right_style');
		secondary_menu.removeAttr('style');
		toggle_secondary_button.children().removeClass("fa-caret-up").addClass("fa-caret-down");
		$('.toggle_right_nav').removeClass('toggle_right_cont');
		$(".nav_toggle_button").removeClass('active');
		$(".hamburger").removeClass("is-active");
		$('body').removeClass('active');
	});

	// Normal swapping

	// Swap Elements
	function swap_this(){
		if(window_width <= 600){

			$('.main_logo').insertAfter('.logo_wrap');
			$('#nav_area').insertBefore('header');

			$('.head_info').insertAfter('.nav-menu');
			$('.gtrans').insertAfter('.main_logo');
			$('.counter').insertAfter('.contact_info_list2');
			$('.footer_nav').appendTo('.footer_btm_con');
			$('.copyright').insertAfter('.footer_nav');
		}else if(window_width <= 800){
			$('.main_logo').insertAfter('.logo_wrap');
			$('#nav_area').insertBefore('header');

			$('.head_info').appendTo('.header_con');
			$('.gtrans').insertAfter('.social_media');
			$('.counter').insertAfter('.contact_info_list2');
			$('.footer_nav').appendTo('.footer_btm_con');
			$('.copyright').insertAfter('.footer_nav');
		} else if(window_width > 800 && window_width <= 1000){
			$('.main_logo').appendTo('.header_con');
			$('#nav_area').insertAfter('header');

			
			$('.head_info').appendTo('.header_con');
			$('.gtrans').insertAfter('.social_media');
			$('.counter').insertAfter('.contact_info_list2');
			$('.footer_nav').appendTo('.footer_btm_con');
			$('.copyright').insertAfter('.footer_nav');
		} else {
			$('.main_logo').appendTo('.header_con');
			$('#nav_area').insertAfter('header');

			$('.head_info').appendTo('.header_con');
			$('.gtrans').insertAfter('.social_media');
			$('.counter').appendTo('.footer_logo_flex');
			$('.footer_nav').insertAfter('.footer_logo');
			$('.copyright').insertAfter('.counter');

		} 
	}

	// If nav and copyright is inside footer top/ toogle swapping heaer info inside toggle Nav

	// function swap_this(){
	// 	if(window_width <= 600){
	// 		$('.main_logo').insertAfter('.logo_wrap');
	// 		$('#nav_area').insertBefore('header');

	// 		$('.head_info').insertAfter('.nav-memnu');
	// 		$('.social_media').insertAfter('.nav-memnu');
	// 		$('.footer_nav').appendTo('.footer_btm_con');
	// 		$('.copyright').insertAfter('.footer_nav');
			

		
	// 	}else if(window_width <= 800){
	// 		$('.main_logo').insertAfter('.logo_wrap');
	// 		$('#nav_area').insertBefore('header');

	// 		$('.head_info').adppendTo('.header_con');
	// 		$('.social_media').insertAfter('.head_info');
	// 		$('.footer_nav').appendTo('.footer_btm_con');
	// 		$('.copyright').insertAfter('.footer_nav');

	// 	} else if(window_width > 800 && window_width <= 1000){
	// 		$('.main_logo').insertBefore('.head_info');
	// 		$('#nav_area').insertAfter('header');

	// 		$('.head_info').insertAfter('.main_logo');
	// 		$('.social_media').insertAfter('.head_info');
	// 		$('.footer_nav').appendTo('.footer_btm_con');
	// 		$('.copyright').insertAfter('.footer_nav');
			
	// 	} else {
	// 		$('.main_logo').insertBefore('.head_info');
	// 		$('#nav_area').insertAfter('header');

	// 		$('.head_info').insertAfter('.main_logo');
	// 		$('.social_media').insertAfter('.head_info');
	// 		$('.footer_nav').insertAfter('.footer_logo');
	// 		$('.copyright').insertAfter('.contact_info_list');  // after contact of List
	// 		//$('.copyright').insertAfter('.footer_logo'); // after footer Logo
	// 	} 
	// }

	swap_this();



	const dynamicMinHeight = (targetElement) => {
		const targetElements = [...document.querySelectorAll(targetElement)];
		if (targetElements.length <= 0 || !targetElement) return;
		targetElements.forEach((el) => (el.style.minHeight = "auto"));
		const targetElementsHeight = targetElements.map((el) => el.offsetHeight);
		const heighestHeight = Math.max(...targetElementsHeight);
		targetElements.forEach((el) => (el.style.minHeight = `${heighestHeight}px`));
		
	};
	
	dynamicMinHeight(".resources ul li");
	dynamicMinHeight(".middle_boxes section h2");
	dynamicMinHeight(".middle_boxes section p");
	// Reset all configs when width > 800
	$(window).resize(function(){
		window_width = $(this).width();
		dynamicMinHeight(".resources ul li");
		dynamicMinHeight(".middle_boxes section h2");
		dynamicMinHeight(".middle_boxes section p");
		swap_this();

		if(window_width > 800) {
			$(".nav_toggle_button").removeClass('active');
			$(".hamburger").removeClass("is-active");
			primary_menu.removeClass('toggle_right_style');
			$('.toggle_right_nav').removeClass('toggle_right_cont');
			$('body').removeClass('active');
		}
		else{
			secondary_menu.removeAttr('style');
			toggle_secondary_button.children().removeClass("fa-caret-up").addClass("fa-caret-down");
		}


	});

	$('.rslides').responsiveSlides();
	$('.box_skitter_large').skitter({
		theme: 'square',
		numbers_align: 'center',
		progressbar: false,
		navigation: true,
		numbers: false,
		dots:false, 
		preview: false,
		interval: 3500,
		thumbs: false
	});

	$('.back_top').click(function () { // back to top
		$("html, body").animate({
			scrollTop: 0
		}, 900);
		return false;
	});

	$(window).scroll(function(){  // fade in fade out button
	var windowScroll = $(this).scrollTop();

		if (windowScroll > (webHeight * 0.5) && window_width <= 600 ) {
			$(".back_top").fadeIn();
		} else{
			$(".back_top").fadeOut()
		};

		// For (AddThis) Plugins
		if($('body #at-share-dock').hasClass('at-share-dock')) {
			$('.back_top').addClass('withAddThis_plugins');
			$('.footer_btm').addClass('withAddThis_ftr_btm');
		} else {
			$('.back_top').removeClass('withAddThis_plugins');
			$('.footer_btm').removeClass('withAddThis_ftr_btm');
		}
		// End (AddThis) Plugins

		// Skitter Parallax --------------------//

		// $('.box_skitter').css('top', -20 - (windowScroll * -.23) + "px");

		//end of Skitter Parallax --------------------//


		// Parallax  ----------------//

		if ($('#bottom1').length >= 1) {

            var fixbtmbg = $('#bottom1').offset().top;
                if (windowScroll > fixbtmbg && window_width > 1024){

                $('#bottom1').addClass('fixbtmbg');
                    } else {
                $('#bottom1').removeClass('fixbtmbg');
                }
        }

		// End of Parallax  ----------------//



		// zoom scroll ------------------//

		// if (window_width > 1024) {
		// 	const sections = [
		// 	{
		// 	selector: '.btm1_info',
		// 	parent: '#bottom1',
		// 	startOffset: 700,
		// 	invert: true,
		// 	speed: .5,
		// 	transformType: 'translate',
		// 	direction: 'X',
		// 	// opacitySpeed: 1,
		// 	enableOpacity:true,
		// 	},


		// 	{
		// 		selector: '.btm1_img1',
		// 		parent: '#bottom1',
		// 		startOffset: 700,
		// 		invert: false,
		// 		speed: .5,
		// 		transformType: 'translate',
		// 		direction: 'X',
		// 		// opacitySpeed: 1,
		// 		enableOpacity:true,
		// 		},
			
		// 	];
			
		// 	sections.forEach(section => {
		// 		let parentOffsetTop = $(section.parent).offset().top;
		// 		let start = parentOffsetTop - section.startOffset;
		// 		let increment = windowScroll - start;
		// 		let current = 320;
		// 		let data = current - (increment * section.speed);
		// 		let transformValue;
		// 		let totalDistance = current / section.speed;
				
		// 		if (section.transformType === 'translate') {
		// 		transformValue = `${section.invert ? -data : data}px`;
		// 		$(section.selector).css({
		// 		'transform': section.direction === 'X' ? `translateX(${transformValue})` : `translateY(${transformValue})`
		// 		});
		// 		} else if (section.transformType === 'scale') {
		// 		let scaleValue = section.invert ? 1 / (1 + (data / 1000)) : 1 + (data / 1000);
		// 		$(section.selector).css({
		// 		'transform': `scale(${scaleValue})`
		// 		});
		// 		} else if (section.transformType === 'rotate') {
		// 		let rotateValue = section.invert ? -data : data;
		// 		$(section.selector).css({
		// 		'transform': `rotate(${rotateValue}deg)`
		// 		});
		// 		}
				
		// 		// Apply transform origin if specified
		// 		if (section.transformOrigin) {
		// 		$(section.selector).css({
		// 		'transform-origin': section.transformOrigin
		// 		});
		// 		}
				
		// 		// Apply opacity if enabled
		// 		if (section.enableOpacity) {
		// 		let opacity = Math.min(1, Math.max(0, increment / totalDistance));
		// 		$(section.selector).css({
		// 		'opacity': opacity
		// 		});
		// 		}
				
		// 		if (data <= 0) {
		// 		let resetTransform = '';
		// 		if (section.transformType === 'translate') {
		// 		resetTransform = section.direction === 'X' ? 'translateX(0px)' : 'translateY(0px)';
		// 		} else if (section.transformType === 'scale') {
		// 		resetTransform = 'scale(1)';
		// 		} else if (section.transformType === 'rotate') {
		// 		resetTransform = 'rotate(0deg)';
		// 		}
		// 		$(section.selector).css({
		// 		'transform': resetTransform,
		// 		'opacity': section.enableOpacity ? 1 : ''
		// 		});
		// 		}
		// 		});
		// 		} else {
		// 		const allSelectors = sections.map(section => section.selector).join(', ');
		// 		$(allSelectors).css({
		// 		'transform': 'translate(0px, 0px) scale(1) rotate(0deg)',
		// 		'opacity': 1
		// 		});
		// 		}  


		// End of zoom scroll ------------------//
	});

	// Testimonial 
	$("#commentform").click(function(){
		if ($('#author').val() == '') {
		$('#author').addClass( "testimonialreq" );
		} else {
		$('#author').removeClass( "testimonialreq" ); 
		}
		
		if ($('#email').val() == '') {
		$('#email').addClass( "testimonialreq" );
		} else {
		$('#email').removeClass( "testimonialreq" );
		}
		
		if ($('#comment').val() == '') {
		$('#comment').addClass( "testimonialreq" );
		} else {
		$('#comment').removeClass( "testimonialreq" );
		}
		
	});

	// Animation
	new WOW().init();

	// Accordion
	$('.accord h6').click(function(){
		$(this).next().slideToggle()
	   .siblings('.accord div').slideUp();
	   //toggle sign
		$(this).toggleClass('sign')
		.siblings('.accord h6').removeClass();
	});

	//---------------------- START OF CODE (FORM ACTIVATION) -------------------------------//
	$("#submit_formmessage .form_email").change(function(){
		validateEmail();
	});
	$('#submit_formmessage .form_btn').on('click', function () {
		if ($('#submit_formmessage .form_fullname').val() == '') {
		  $('#submit_formmessage .form_fullname').addClass("FormReq");
		} else {
		  $('#submit_formmessage .form_fullname').removeClass("FormReq");
		} if ($('#submit_formmessage .form_chkbox').not(':checked')) {
		  $('#submit_formmessage .form_chkbox').addClass("FormReq");
		} else {
		  $('#submit_formmessage .form_chkbox').removeClass("FormReq");
		}
		if ($('#submit_formmessage .form_email').val() == '') {
		  $('#submit_formmessage .form_email').addClass("FormReq");
		} else {
		  validateEmail();
		}
		if (grecaptcha.getResponse() == "") {
		  var $recaptcha = document.querySelector('#g-recaptcha-response');
		  $recaptcha.setAttribute("required", "required");
		  $('.g-recaptcha iframe').addClass('FormReq').attr('id', 'recaptcha');
		}
	  });

	// FOR EMAIL VALIDATOR
	function validateEmail(){
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var email = $('#submit_formmessage .form_email').val();
			if( !emailReg.test( email ) ) {
			  $('#submit_formmessage .form_email').addClass( "FormReq" );
			  $('#invalid-msg').show();
			  $('#invalid-msg').html('Please enter a valid email address.');
			} else {
			  $('#submit_formmessage .form_email').removeClass( "FormReq" );
			  $('#invalid-msg').hide();
			}
	}

	// FOR PROMPT POP-UP MESSAGE
	$('#success .close').click(function () {
		$('#success').fadeOut();
		$('#recaptcha-error').fadeOut();
	});
   
	$('.rclose').click(function () {
		$('#recaptcha-error').fadeOut();
	});
   
	$('#error-msg .error-close').click(function () {
		$('#error-msg').fadeOut();
	});

	//---------------------- END OF CODE (FORM ACTIVATION -------------------------------//


	(function checkDarkMode() {
		const isDarkMode = document
		  .querySelector(".dracula-toggle")
		  .classList.contains("mode-dark");
		if (isDarkMode) {
		  document.body.classList.add("dark-mode");
		}
	  })();
	  
	  // mo add ug "dark-mode" class sa body inig toggle sa dark mode
	
	  $(".dracula-toggle").click(function () {
		document.body.classList.toggle("dark-mode");
	  });
});
