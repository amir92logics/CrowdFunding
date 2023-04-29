(function($) {
    "use strict";


    /*============** Sticky Header **============*/
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 200) {
            $("#sticky-header").removeClass("sticky");
        } else {
            $("#sticky-header").addClass("sticky");
        }
    });

    /*============** Nice Select **============*/
    // $('select').niceSelect();                 

    /*============** meanmenu **============*/
    $('#mobile-nav').meanmenu({
        meanMenuContainer: '.mobile-nav',
        meanScreenWidth: "1199",
        meanMenuOpen: '<span></span><span></span><span></span>',
    });

  /*============** Advance Search **============*/
	$('.advance_btn').on('click', function () {
    $(".advance_search_wrapper").toggleClass("show");
		$('.offcanvas-overlay').addClass('overlay-open');
	})

	$('.offcanvas-overlay').on('click', function () {
		$('.advance_search_wrapper').removeClass('show');
		$('.offcanvas-overlay').removeClass('overlay-open');
	})

  /*============** Property Gride ans list **============*/
  $('.comment_review i').on('click', function (e) {
    $(this).toggleClass("comment_review_active");

	})

  /*============** Mgnific Popup **============*/
  $(".image-popup").magnificPopup({
      type: "image",
      gallery: {
          enabled: true,
      },
  });

  $('.popup_video').magnificPopup({
      type: 'iframe',
  });

  /*==========  counterUp  ==========*/
	var counter = $('.counter');
	counter.counterUp({
		time: 2500,
		delay: 100
	});

/*==========  Featured Slider  ==========*/
$('.featured_active_slider').slick({
    dots: false,
    autoplay: true,
    infinite: true,
    arrows: true,
    prevArrow:'<button type="button" class="slick-prev"> <i class="fas fa-long-arrow-alt-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next"> <i class="fas fa-long-arrow-alt-right"></i></button>',
    slidesToShow: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: true,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: true,
          slidesToShow: 1
        }
      },
      {
        breakpoint: 500,
        settings: {
          arrows: true,
          slidesToShow: 1
        }
      }
    ]
  });

  $(".single-input .eye_icon_show i").click(function () {
    $(this).toggleClass("fa-solid fa-eye fa-solid");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
  

/*==========  Agent Slider  ==========*/
$('.agent_active').slick({
  dots: true,
  autoplay: true,
  infinite: true,
  arrows: true,
  prevArrow:'<button type="button" class="slick-prev"> <i class="fas fa-long-arrow-alt-left"></i></button>',
  nextArrow:'<button type="button" class="slick-next"> <i class="fas fa-long-arrow-alt-right"></i></button>',
  slidesToShow: 4,
  responsive: [
    {
      breakpoint: 1400,
      settings: {
        arrows: true,
        slidesToShow: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        arrows: true,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        arrows: true,
        slidesToShow: 1
      }
    }
  ]
});

/*==========  Testimonial Slider  ==========*/
$('.testimonials_active').slick({
  dots: true,
  autoplay: false,
  infinite: true,
  arrows: false,
  prevArrow:'<button type="button" class="slick-prev"> <i class="fas fa-long-arrow-alt-left"></i></button>',
  nextArrow:'<button type="button" class="slick-next"> <i class="fas fa-long-arrow-alt-right"></i></button>',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
});




/*==========  Blog Slider  ==========*/
$('.blog_active').slick({
  dots: false,
  autoplay: false,
  infinite: true,
  arrows: true,
  prevArrow:'<button type="button" class="slick-prev"> <i class="fas fa-long-arrow-alt-left"></i></button>',
  nextArrow:'<button type="button" class="slick-next"> <i class="fas fa-long-arrow-alt-right"></i></button>',
  slidesToShow: 3,
  centerPadding: '60px',

  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: true,
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        arrows: true,
        slidesToShow: 1
      }
    }
  ]
});

  /*========== scroll to top  ==========*/
	var scrollPath = document.querySelector('.scroll-up path');
	var pathLength = scrollPath.getTotalLength();
	scrollPath.style.transition = scrollPath.style.WebkitTransition = 'none';
	scrollPath.style.strokeDasharray = pathLength + ' ' + pathLength;
	scrollPath.style.strokeDashoffset = pathLength;
	scrollPath.getBoundingClientRect();
	scrollPath.style.transition = scrollPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
	var updatescroll = function() {
		var scroll = $(window).scrollTop();
		var height = $(document).height() - $(window).height();
		var scroll = pathLength - (scroll * pathLength / height);
		scrollPath.style.strokeDashoffset = scroll;
	}
	updatescroll();
	$(window).scroll(updatescroll);
	var offset = 50;
	var duration = 950;
	jQuery(window).on('scroll', function() {
		if(jQuery(this).scrollTop() > offset) {
			jQuery('.scroll-up').addClass('active-scroll');
		} else {
			jQuery('.scroll-up').removeClass('active-scroll');
		}
	});
	jQuery('.scroll-up').on('click', function(event) {
		event.preventDefault();
		jQuery('html, body').animate({
			scrollTop: 0
		}, duration);
		return false;
	});

  /*============** Peloaders **============*/
  $(window).on('load', function() {
    $("#loading").fadeOut(800);
  })
})(jQuery);