(function($) {
     "use strict";
     
     /* SMOOTH NAV 
     ================================== */

  $('.js-scrollTo').on('click', function() { // Au clic sur un élément
    var page = $(this).attr('href'); // Page cible
    var speed = 750; // Durée de l'animation (en ms)
    $('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
    return false;
  });

     /*
     MOBILE MENU
     ================================== */
     //  Main menu
     var MainLiDrop = $('.mainmenu li.dropdown,.mainmenu li.sub-dropdown');
	 var droPBtn = $('<div class="dropdown-btn"></div>');
     MainLiDrop.append(droPBtn);
     //Dropdown Button
     var mainLiDDbtn = $('.mainmenu li.dropdown .dropdown-btn');
	 if (mainLiDDbtn.length) {
		 mainLiDDbtn.on('click', function() {
			 $(this).toggleClass('submenu-icon');
			 $(this).prev('ul').slideToggle(400);
			 return false;
		 });
	 }
	 
     //Search Box Active
     var searchBoxI = $('.search-box i');
     var closeBox = $('#close');
	 if (searchBoxI.length) {
		 searchBoxI.on('click', function() {
			 $(this).parent().toggleClass('active-search');
			 return false;
		 });
	 }
	
     /*
     STICKY
     ================================== */
     var AcSticky = $('.active-sticky');
     var WinD = $(window);
	 if (WinD.length) {
		 WinD.on('scroll', function() {
			 var scroll = $(window).scrollTop();
			 var AESticky = AcSticky;
			 if (scroll < 1) {
				 AESticky.removeClass("is-sticky");
			 } else {
				 AESticky.addClass("is-sticky");
			 }
			 return false;
		 });
	 }
	 
     /*
	 Menu A Active Jquery
     ================================== */
	 var pgurl = window.location.href.substr(window.location.href
	 .lastIndexOf("/")+1);
	 var aActive = $('ul li a');
	 if (aActive.length) {
		aActive.each(function(){
		if($(this).attr("href") === pgurl || $(this).attr("href") === '' )
			$(this).addClass("active");
		});
	 }
	
     /*
     ISOTOPE MENU
     ================================ */
     var folioMenuLi = $('.portfolio-menu li');
	 if (folioMenuLi.length) {
		 folioMenuLi.on('click', function() {
			 var folioGrid = $('.portfolio-grid');
			 folioMenuLi.removeClass("active");
			 $(this).addClass("active");
			 var selector = $(this).attr('data-filter');
			 folioGrid.isotope({
				 filter: selector,
				 animationOptions: {
					 duration: 750,
					 easing: 'linear',
					 queue: false
				 }
			 });
		 });
	 }
	 
	/*
	VENOBOX ACTIVE
	================================ */
	var venBOx = $('.venobox');
	venBOx.venobox();
	
     /*
     SLICK CAROUSEL AS NAV
     ===================================*/
     var oneItem = $('#one-item');
	 if (oneItem.length) {
		oneItem.slick({
			dots: true,
			arrows: false,
		});
	 }
     var testmonialItem = $('.testimonial-item');
	 if (testmonialItem.length) {
		testmonialItem.slick({
			dots: false,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 4000
		});
	 }
	 
	/*
	 CounterUp ACTIVE
	================================ */
	var cunterActive = $('.counter');
	if (cunterActive.length) {
		cunterActive.counterUp({
			delay: 50,
			time: 3000
		});
	}
	
     /*
     CONTACT FORM VALIDATIONS SETTINGS
     ========================================*/
     var contactForm = $('#contact_form');
	 if (contactForm.length) {
		 contactForm.validate({
			 onfocusout: false,
			 onkeyup: false,
			 rules: {
				 name: "required",
				 email: {
					 required: true,
					 email: true
				 }
			 },
			 errorPlacement: function(error, element) {
				 error.insertBefore(element);
			 },
			 messages: {
				 name: "What's your name?",
				 email: {
					 required: "What's your email?",
					 email: "Please, enter a valid email"
				 }
			 },
			 highlight: function(element) {
				 $(element)
					 .text('').addClass('error')
			 },
			 success: function(element) {
				 element
					 .text('').addClass('valid')
			 }
		 });
	 }

     /*
     CONTACT FORM SCRIPT
     ========================================*/
     var contactSubmit = $('#contact_submit');
	 if (contactForm.length) {
		 contactForm.submit(function() {
			 // submit the form
			 if ($(this).valid()) {
				 contactSubmit.button('loading');
				 var action = $(this).attr('action');
				 $.ajax({
					 // url: action,
					 type: 'POST',
					 url: "../../contact-form.php", 
					 data: {
						 contactName: $('#contact_name').val(),
						 contactEmail: $('#contact_email').val(),
						 contactPhone: $('#contact_phone').val(),
						 contactWebsite: $('#contact_website').val(),
						 contactMessage: $('#contact_message').val()
					 },
					 success: function() {
						 contactSubmit.button('reset');
						 contactSubmit.button('complete');
					 },
					 error: function() {
						 contactSubmit.button('reset');
						 contactSubmit.button('error');
					 }
				 });
				 // return false to prevent normal browser submit and page navigation 
			 } else {
				 CTSubmit.button('reset')
			 }
			 return false;
		 });
	 }

     /*
     SCROLLUP
     ================================ */
    $.scrollUp({
		 scrollText: '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" class="svg-inline--fa fa-arrow-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>',
         easingType: 'linear',
         scrollSpeed: 500,
         animation: 'slide'
    });
	
    /*
    LOAD MORE JQUERY
    ================================== */
	var loadItem = $('.load-more');
	var addNewItem = 3;
	var loadBtn = $("#load-more-btn");
	var numInList = loadItem.length;
	loadItem.hide();
	if (numInList > addNewItem) {
		loadBtn.show();
	}
	if (loadBtn.length) {
		loadBtn.on('click',function(){
			var showing = loadItem.filter(':visible').length;
			loadItem.slice(showing - 0, showing + addNewItem).fadeIn();
			var nowShowing = loadItem.filter(':visible').length;
			if (nowShowing >= numInList) {
				loadBtn.hide();
			}
			
			var MasCol = $('.portfolio-grid');
			MasCol.isotope('layout'); // Isotope Layout Fit
		});
	}
	var polioMenuLi = $('.portfolio-menu li:not(:first-child)');
	if (polioMenuLi.length) {
		polioMenuLi.on('click',function(){
			loadBtn.hide();
		}); // Button Hide on Filtering
	}
	
 /*
 WINDOW LOAD FUNCTIONS
 ================================== */
    WinD.on('load', function() {
        // Preloader
        var preeLoad = $('#loading-wrap');
        preeLoad.fadeOut(1000);

        // FITROWS GRID
        var fitRowGrid = $('.fitRows-grid');
		if (fitRowGrid.length) {
		 fitRowGrid.isotope({
			 itemSelector: '.grid-item',
			 // layout mode options
			 layoutMode: 'fitRows'
		 });
		}
        // MASONRY GRID
        var masonryGrid = $('.masonry-grid');
		if (masonryGrid.length) {
		masonryGrid.isotope({
			itemSelector: '.grid-item',
			// layout mode options
			layoutMode: 'masonry',
			masonryHorizontal: {
				rowHeight: 100
			}
		});
		}
		 
    });

    /*
 SCROLL TO MOUTH
 ================================== */
	$('a.scroll-link').click(function(e){
		e.preventDefault();
		$id = $(this).attr('href');
		$('body,html').animate({
			scrollTop: $($id).offset().top -20
		}, 750);
	});

   /*
 END SCROLL TO MOUTH
 ================================== */

       /*
 REQUETE AJAX FORMULAIRE DE CONTACT
 ================================== */

		// $('#send_button').click(function(e){




		// 	var name = $('#contact_name').val();
		// 	var email = $('#contact_email').val();
		// 	var phone = $('#contact_phone').val();
		// 	var website = $('#contact_website').val();
		// 	var message = $('#contact_message').val();

		// 		$.post('../../controleur/contact-form.php', {name:name, email:email, phone:phone, website:website, message:message}, function(){
		// 			$('#send_button').val("Message envoyé !");
		// 		});

		// 		return false;
			

				

		// });

/*
END REQUETE AJAX FORMULAIRE DE CONTACT
================================== */	



 })(jQuery);


 