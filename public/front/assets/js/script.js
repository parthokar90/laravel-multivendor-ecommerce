/*=================================================================

Template name: Martfy Multipurpose eCommerce HTML Template
Version: 1.0.0
Author: SITLBD 
Author url: https://www.sitlbd.com/
Developer: Najmul Huda Eimon   


[Table of Content]

01: Preloader
02: Scroll to top button
03: Background image
04: Sticky menubar
05: fancybox
06: Select style
07: mobile Menu
08: home1 home3 banner slider
09: mega menu advertise slider
10: category button
11: home1 featured slider
12: home1 client slider part
13: home2 top-seller slider
14: home2 client slider part
15: home3 category slider
16: parallax activation home 1
17: countdown
18: Venobox video play
19: aos scroll animation
20: shop page range slider
21: input spinner
22: star rating
23: shop page product slider and zoom
24: blog page image slider and zoom
25: packery blog masonry
26: contact page Google Map
 
====================================================================*/

  $(function(){
    "use strict";

    /*================================================================
      01: Preloader
    =================================================================*/
    $( document ).ready(function() {
      setTimeout(()=>{
          $('.preloader').fadeOut();
      }, 250)
  });


  /*=====================================================================
        02: Scroll to top button
    =======================================================================*/

    $('.top-to-btn').on('click',function(e){
      e.preventDefault();
      $('html, body').animate({
          scrollTop: 0
      }, 400);
    });


  $(window).on('scroll',function(){
      var $scroll = $(this).scrollTop();

      if($scroll > 300){
          $('.top-to').addClass('show');
      }else{
          $('.top-to').removeClass('show');
      }
  });

    /*=====================================================================
        03: Background image
    ======================================================================*/
   let imageTarget = $('[data-img]');
   imageTarget.css('background', function(){
       return 'url('+this.getAttribute('data-img')+') no-repeat center'
   });
   imageTarget.css('backgroundSize', 'cover');

   /*================================================================
        04: Sticky menubar
    =================================================================*/

    // var $navOffset = $('.menubar').offset().top;
    $(window).on('scroll',function(){
      var $scroll = $(this).scrollTop();

    //  if($scroll > $navOffset){
     if($scroll > 250){
         $('.menubar').addClass('sticky');
     }else{
         $('.menubar').removeClass('sticky');
     }
 });

 /*=============================================================
    05: fancybox
=============================================================*/
    $(window).on('load', function(){
      if($('.fancybox').length !==0){
          setTimeout(function(){ 
          $('.fancybox').addClass('window-show');
          $('body').delay(500).addClass('window-open');
          }, 3000);
      }
    })

    function modalfunction(){
      $('.close-fancy').on('click', function(){
          $('.fancybox').removeClass('window-show');
          $('body').removeClass('window-open');
      })
      $('.fancybox-bg').on('click', function(){
          $(this).fadeTo(1000, 0);
          $('.fancybox-content').delay(500).parent().removeClass('window-show');
          $('body').removeClass('window-open');
      })

    }
    modalfunction()
  
  /*=====================================================================
    06: Select style
   ======================================================================*/
   $(".select").select2({
      width: 'resolve' 
  });
  

  /*=====================================================================
        07: mobile Menu
  ======================================================================*/
    $('.header-menu a[href="#"]').on("click", function (e) {
      e.preventDefault();
    });

    $(".header-menu").menumaker({ title: '<i class="fas fa-bars"></i>', format: "multitoggle" });
    if($(window).width() < 559 ){
      $(".categories").menumaker({ title: '<i class="fas fa-bars"></i>', format: "multitoggle" });
    }
    

    /*=====================================================================
        08: home1 home3 banner slider
    ======================================================================*/
    function mainSlider() {
      var BannerSlider = $('.banner-slider');
      BannerSlider.on('init', function (e, slick) {
        var $firstAnimatingElements = $('.slider-item').find('[data-animation]');
        doAnimations($firstAnimatingElements);
      });
      BannerSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('.slider-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
      });
      BannerSlider.slick({
        dots: true,
        infinite: true,
        speed: 1000,
        fade: true,
        autoplay: true,
        autoplaySpeed:1500,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1550,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false
            }
          }
        ]
      });
    
      function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
          'animation-delay': $animationDelay,
          '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
        });
      }
    }
      mainSlider();

    /*=====================================================================
        09: mega menu advertise slider
    ======================================================================*/

    $('.ad-slider').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      fade: true,
      autoplay: true,
      autoplaySpeed:1500,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*=====================================================================
        10: category button
    ======================================================================*/
  
   if($(window).width() > 558){
    $('.category-btn').on('click',function(){
      $('.menu-holder').slideToggle();
      $(this).toggleClass('rotate');
    });
   }else if($(window).width() < 559){
      $('.menu-holder .categories').appendTo($(".mbl-offcanvas .mbl-content"))
      canvasToggler('click', $('.category-btn'))
      canvasToggler('click', $('.mbl-canvas-cancle'))

      function canvasToggler(event, target){
        target.on(event,function(){
          $(".mbl-offcanvas").toggleClass("show")
        })
      }
   }

   $('.menu-holder .more-item').css('display',"none")
   $('.more-btn button').on('click',function(){
      $(this).parents().find('.menu-holder .more-item').slideToggle();
      $(this).children().toggleClass('fa-plus').toggleClass('fa-minus');
   });
    

    /*=====================================================================
        11: home1 featured slider
    ======================================================================*/

    $('.featured-slider').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay: false,
      autoplaySpeed:1500,
      arrows: true,
      prevArrow: '<i class="fas fa-long-arrow-alt-left btn-left"></i>',
      nextArrow: '<i class="fas fa-long-arrow-alt-right btn-right"></i>',
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });

    /*=====================================================
    12: home1 client slider part
    =======================================================*/
    $('.client-slider').slick({
      dots: true,
      infinite: true,
      speed: 300,
      arrows:false,
      autoplay:false,
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.client-img-slider',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
  
  $('.client-img-slider').slick({
      dots: false,
      infinite: true,
      speed: 300,
      arrows:false,
      autoplay:false,
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.client-slider',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*=====================================================================
        13: home2 top-seller slider
    ======================================================================*/

    $('.seller-slider').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay: false,
      autoplaySpeed:1500,
      arrows: true,
      prevArrow: '<i class="fas fa-long-arrow-alt-left btn-left"></i>',
      nextArrow: '<i class="fas fa-long-arrow-alt-right btn-right"></i>',
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });

    /*======================================================
    14: home2 client slider part
    ========================================================*/
    var review = $('.home2-client-slider');

    review.on('init', function(event, slick, currentSlide) {
      var
        cur = $(slick.$slides[slick.currentSlide]),
        
        next = cur.next(),
        prev = cur.prev();
      prev.addClass('slick-sprev');
      next.addClass('slick-snext');  
      slick.$prev = prev;
      slick.$next = next;
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    
      var
        cur = $(slick.$slides[nextSlide]);
      slick.$prev.removeClass('slick-sprev');
      slick.$next.removeClass('slick-snext');
      let next = cur.next(); 
      let prev = cur.prev();
      prev.addClass('slick-sprev');
      next.addClass('slick-snext');
      slick.$prev = prev;
      slick.$next = next;
      cur.removeClass('slick-next').removeClass('slick-sprev');
    });


    review.slick({
      dots: true,
      arrows: false,
      infinite: true,
      focusOnSelect: true,
      speed: 300,
      centerMode: true,
      autoplay:false,
      slidesToShow: 1,
      slidesToScroll: 1,
      slidesPerRow: 1,
    centerPadding: '0',
    swipe: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });

    /*=====================================================================
        15: home3 category slider
    ======================================================================*/

    $('.category-slider').slick({
      dots: false,
      infinite: true,
      speed: 1000,
      autoplay: false,
      autoplaySpeed:1500,
      arrows: true,
      prevArrow: '<i class="flaticon-left-chevron btn-left"></i>',
      nextArrow: '<i class="flaticon-right-chevron btn-right"></i>',
      slidesToShow: 6,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: false
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });



    /*================================================================
        16: parallax activation home 1
    =================================================================*/
    var $parallaxLayers = $('[data-trigger="parallax_layers"]');

    if( $parallaxLayers.length ){
        $parallaxLayers.each(function () {
            new Parallax( $(this)[0], {
                selector: '[data-depth]'
            });
        });
    }

    /*=============================================================
        17: countdown
    ==============================================================*/
    $('#offer-time').countdown('2022/01/01', function(event) {
      let week = event.strftime('%w')
      let day = event.strftime('%d')
      $(this).find('ul li .days').html( (week * 7) + parseFloat(day) )
      $(this).find('ul li .hours').html(event.strftime('%H'))
      $(this).find('ul li .minutes').html(event.strftime('%M'))
      $(this).find('ul li .secounds').html(event.strftime('%S'))
    });

    /*=====================================================================
        18: Venobox video play
    ======================================================================*/
    $('.venobox').venobox({
      spinner: 'cube-grid'
    });

    /*=====================================================================
        19: aos scroll animation
    ======================================================================*/
    
    AOS.init();

    /*=====================================================================
        20: shop page range slider
    ======================================================================*/

    // Product Quantity
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 300,
      values: [ 0, 200 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );

      /*=====================================================================
        21: input spinner
    ======================================================================*/

    $('.number-spinner button').on('click', function (e) { 
      e.preventDefault()
        var btn = $(this),
          oldValue = btn.closest('.number-spinner').find('input').val(),
          newVal = 0;

      if (btn.attr('data-dir') == 'up') {
          newVal = parseInt(oldValue) + 1;
      } else {
          if (oldValue > 1) {
              newVal = parseInt(oldValue) - 1;
          } else {
              newVal = 1;
          }
      }
      btn.closest('.number-spinner').find('input').val(newVal);
  });

  /*=====================================================================
        22: star rating
    ======================================================================*/
        
    $('#stars li').on('mouseover', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    
    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
      var onStar = parseInt($(this).data('value'), 10); // The star currently selected
      var stars = $(this).parent().children('li.star');
      
      for (var i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
      }
      
      for (var i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
      }
      
    });
    
    
  });


    /*=====================================================================
        23: shop page product slider and zoom
    ======================================================================*/
    
  let $productGallery = $('.img-gallery'),
  $productThumbs = $('.img-thumb');
  
    $productGallery.slick({
      dots: false,
      infinite: true,
      fade: true,
      speed: 300,
      arrows:false,
      autoplay:false,
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.img-thumb',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });  
  
  $productThumbs.slick({
  dots: false,
  infinite: true,
  speed: 300,
  arrows:false,
  fade: false,
  autoplay:false,
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: '.img-gallery',
  focusOnSelect: true,

  responsive: [
  {
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      dots: false
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 2,
      slidesToScroll: 1
    }
  }
  ]
  });


  function elevateZoomInstall(target){
  target.elevateZoom({
  zoomType: "inner",
  lensShape : "round",
  lensSize    : 200,
  zoomWindowFadeIn: 500,
  zoomWindowFadeOut: 500,
  cursor: "crosshair"
  });
  }
  
  elevateZoomInstall($('.img-gallery .slick-current img')); 
  
  $productGallery.on('afterChange', function(){
  elevateZoomInstall($('.img-gallery .slick-current img'))
  })




  /*=====================================================================
        23: shop-details tab slider
    ======================================================================*/
    // vertical slider
let $productGalleryTab = $('.img-gallery-tab'),
$productThumbsTab = $('.img-thumb-tab');

$productGalleryTab.slick({
dots: false,
infinite: true,
fade: true,
speed: 300,
arrows:false,
autoplay:false,
slidesToShow: 1,
slidesToScroll: 1,
asNavFor: '.img-thumb-tab',
responsive: [
  {
    breakpoint: 1024,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1,
      infinite: true,
      dots: false
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 1,
      slidesToScroll: 1
    }
  }
]
});

   

$productThumbsTab.slick({
dots: false,
infinite: true,
speed: 300,
arrows:false,
fade: false,
autoplay:false,
slidesToShow: 3,
slidesToScroll: 1,
vertical: true,
verticalSwiping: true,
asNavFor: '.img-gallery-tab',
focusOnSelect: true,
responsive: [
  {
    breakpoint: 1024,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1,
      infinite: true,
      dots: false
    }
  },
  {
    breakpoint: 600,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1
    }
  },
  {
    breakpoint: 480,
    settings: {
      slidesToShow: 3,
      slidesToScroll: 1
    }
  }
]
});
function elevateZoomInstall(target){
target.elevateZoom({
  zoomType: "inner",
  lensShape : "round",
  lensSize    : 200,
  zoomWindowFadeIn: 500,
  zoomWindowFadeOut: 500,
  cursor: "crosshair"
});
}
elevateZoomInstall($('.img-gallery-tab .slick-current img'));

$productGalleryTab.on('afterChange', function(){
elevateZoomInstall($('.img-gallery-tab .slick-current img'))
})


  /*=====================================================================
        23: modal slider
    ======================================================================*/
  
    var myModal = document.querySelector('.modal')
    if(myModal){
      myModal.addEventListener('shown.bs.modal', function () {
      
        $('.modal-gallery').slick({
          dots: false,
          infinite: true,
          fade: true,
          speed: 300,
          arrows:false,
          autoplay:false,
          slidesToShow: 1,
          slidesToScroll: 1,
          asNavFor: '.modal-thumb',
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        });  
      
  
        $('.modal-thumb').slick({
          dots: false,
          infinite: true,
          speed: 300,
          arrows:false,
          fade: false,
          autoplay:false,
          slidesToShow: 3,
          slidesToScroll: 1,
          asNavFor: '.modal-gallery',
          focusOnSelect: true,
          responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          }
          ]
          });
        
          
        });
    }
    

    /*=====================================================================
        24: blog page image slider and zoom
    ======================================================================*/
      $('.blog-img-slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        arrows: true,
        prevArrow: '<i class="flaticon-left-chevron btn-left"></i>',
        nextArrow: '<i class="flaticon-right-chevron btn-right"></i>',
        autoplay:false,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });

    /*================================================
        25: packery blog masonry
    ================================================*/
    $(window).ready(function(){
      $('.grid').packery({
          itemSelector: '.grid-item'
        });
  });

  /*=========================================================
        26: contact page Google Map
    ==========================================================*/

    if($('#map').length !==0){
            
      var googleMapSelector = $('#map');
      var latitude = $('.google-map-wrapper').attr('data-latitude');
      var longitude = $('.google-map-wrapper').attr('data-longitude');
      var zoome = $('.google-map-wrapper').attr('data-zoom');
      var zoomtoNum = Number(zoome);
      var mapmarker = $('.google-map-wrapper').attr('data-marker');
      var myCenter = new google.maps.LatLng(latitude, longitude);

      function initialize() {
          var mapProp = {
              center: myCenter,
              zoom: zoomtoNum,
              scrollwheel: false,
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              styles: [
                      {
                          "featureType": "landscape.man_made",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "color": "#f7f1e0"
                              }
                          ]
                      },
                      {
                          "featureType": "landscape.natural",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "color": "#d0e3b4"
                              }
                          ]
                      },
                      {
                          "featureType": "landscape.natural.terrain",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "visibility": "off"
                              }
                          ]
                      },
                      {
                          "featureType": "poi",
                          "elementType": "labels",
                          "stylers": [
                              {
                                  "visibility": "off"
                              }
                          ]
                      },
                      {
                          "featureType": "poi.business",
                          "elementType": "all",
                          "stylers": [
                              {
                                  "visibility": "off"
                              }
                          ]
                      },
                      {
                          "featureType": "poi.medical",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "color": "#fbd3da"
                              }
                          ]
                      },
                      {
                          "featureType": "poi.park",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "color": "#bde6ab"
                              }
                          ]
                      },
                      {
                          "featureType": "road",
                          "elementType": "geometry.stroke",
                          "stylers": [
                              {
                                  "visibility": "off"
                              }
                          ]
                      },
                      {
                          "featureType": "road",
                          "elementType": "labels",
                          "stylers": [
                              {
                                  "visibility": "off"
                              }
                          ]
                      },
                      {
                          "featureType": "road.highway",
                          "elementType": "geometry.fill",
                          "stylers": [
                              {
                                  "color": "#ffe36f"
                              }
                          ]
                      },
                      {
                          "featureType": "road.highway",
                          "elementType": "geometry.stroke",
                          "stylers": [
                              {
                                  "color": "#efd151"
                              }
                          ]
                      },
                      {
                          "featureType": "road.arterial",
                          "elementType": "geometry.fill",
                          "stylers": [
                              {
                                  "color": "#ffffff"
                              }
                          ]
                      },
                      {
                          "featureType": "road.local",
                          "elementType": "geometry.fill",
                          "stylers": [
                              {
                                  "color": "black"
                              }
                          ]
                      },
                      {
                          "featureType": "transit.station.airport",
                          "elementType": "geometry.fill",
                          "stylers": [
                              {
                                  "color": "#cfb2db"
                              }
                          ]
                      },
                      {
                          "featureType": "water",
                          "elementType": "geometry",
                          "stylers": [
                              {
                                  "color": "#a2daf2"
                              }
                          ]
                      }
                  ]
          };
          var map = new google.maps.Map( document.getElementById('map'), mapProp );
          var marker = new google.maps.Marker({
              position: myCenter,
              icon: mapmarker,
          });
          marker.setMap(map);

         
      }
      if (googleMapSelector.length) {
          google.maps.event.addDomListener(window, 'load', initialize);
      }
  }
    
});
