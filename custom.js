 jQuery(document).on('ready', function() {

      jQuery(".jd_regular").slick({
        dots: true,
        infinite: true,
		speed: 700,
		autoplay:false,
		autoplaySpeed: 2000,
		arrows:true,
        slidesToShow: 4,
        slidesToScroll: 4
      });
});