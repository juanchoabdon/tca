jQuery(function($) {
        'use strict';

        (function() {

            $(window).on('load', function() {

                /*
                =========================================================================================
                01. Spinner
                =========================================================================================
                */
                $(".outslider_loading").fadeOut("slow");


                /*
                =========================================================================================
                02. paralax image
                =========================================================================================
                */
                $('.parallax-window').parallax({imageSrc: './images/form-bg.jpg'});
                $('.parallax-window').parallax({imageSrc: './images/sign-up-bg.png'});
                $('.parallax-window').parallax({imageSrc: './images/quote-slider-bg.png'});

            });
        }());


        (function() {

            $(window).on('scroll', function() {
                    /*
                    =========================================================================================
                    03. NAVBAR
                    =========================================================================================
                    */
                    if ($(window).scrollTop() > 30) {
                        $(".header-area").addClass("ds_padding");
                    } else {
                        $(".header-area").removeClass("ds_padding");
                    } 


                    // ONE PAGE NAV
                    var topHeight = $(".rev_slider_wrapper").outerHeight();
                    var windowScroll = $(window).scrollTop();

                    if (windowScroll > topHeight) {
                        $(".onepage nav").addClass("navbar-fixed-top");
                    } else {
                        $(".onepage nav").removeClass("navbar-fixed-top");
                    }

                    $(".page").each(function() {
                        var bb = $(this).attr("id");
                        var hei = $(this).outerHeight();
                        var grttop = $(this).offset().top - 80;
                        if ($(window).scrollTop() > grttop - 1 && $(window).scrollTop() < grttop + hei - 1) {
                            var uu = $(".one-page > li >a[href='#" + bb + "']").parent().addClass("active");
                        } else {
                            var uu = $(".one-page > li >a[href='#" + bb + "']").parent().removeClass("active");
                        }
                    });

                    // HOME 9 NAV
                    var topHeight9 = $(".header-9-top").outerHeight();
                    var windowScroll9 = $(window).scrollTop();

                    if (windowScroll9 > topHeight9) {
                        $(".home-9-header-area nav").addClass("navbar-fixed-top");
                    } else {
                        $(".home-9-header-area nav").removeClass("navbar-fixed-top");
                    }

                    // HEADER V2
                    if ($(window).scrollTop() > 10) {
                        $(".v-2-header-area").addClass("toggle-header");
                    } else {
                        $(".v-2-header-area").removeClass("toggle-header");
                    }
                    /*
                    =========================================================================================
                    04. PROGRESS BAR
                    =========================================================================================
                    */

                    $(".progress_cont").each(function() {
                        var base = $(this);
                        var windowHeight = $(window).height();
                        var itemPos = base.offset().top;
                        var scrollpos = $(window).scrollTop() + windowHeight - 100;
                        if (itemPos <= scrollpos) {
                            var auptcoun = base.find(".progress-bar").attr("aria-valuenow");
                            base.find(".progress-bar").css({
                                "width": auptcoun + "%"
                            });
                            var str = base.find(".skill>span").text();
                            var res = str.replace("%", "");
                            if (res == 0) {
                                $({
                                    countNumber: 0
                                }).animate({
                                    countNumber: auptcoun
                                }, {
                                    duration: 4000,
                                    easing: 'linear',
                                    step: function() {
                                        base.find(".skill>span").text(Math.ceil(this.countNumber) + "%");
                                    }
                                });
                            }
                        }
                    });
            });

        }());

    (function() {


        /*
        =========================================================================================
        05. MEGA MENU
        =========================================================================================
        */
        $("#menuzord").menuzord();

        $(".menuzord-menu-onepage > li >a").on('click', function() {
            $(this).parent().addClass("active");
            $(".menuzord-menu-onepage > li >a").not(this).parent().removeClass("active");
            var TargetId = $(this).attr('href');
            $('html, body').animate({
                scrollTop: $(TargetId).offset().top - 50
            }, 1000, 'swing');
            return false;
        });


        /*
        =========================================================================================
        06. SERVICE SLIDER
        =========================================================================================
        */
        var service_slider = $("#service-slider");
        service_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        07. SERVICE 2 SLIDER
        =========================================================================================
        */
        var service2_slider = $("#service-2-slider");
        service2_slider.owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });


        /*
        =========================================================================================
        08. SERVICE 3 SLIDER
        =========================================================================================
        */
        var service3_slider = $("#service-3-slider");
        service3_slider.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        09. SERVICE 4 SLIDER
        =========================================================================================
        */
        var service4_slider = $("#service-4-slider");
        service4_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        /*
        =========================================================================================
        10. SERVICE 5 SLIDER
        =========================================================================================
        */
        var service5_slider = $("#service-5-slider");
        service5_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        /*
        =========================================================================================
        11. SERVICE 6 SLIDER
        =========================================================================================
        */
        var service6_slider = $("#service-6-slider");
        service6_slider.owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        /*
        =========================================================================================
        12. SERVICE 7 SLIDER
        =========================================================================================
        */
        var service7_slider = $("#service-7-slider");
        service7_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        13. SERVICE 8 SLIDER
        =========================================================================================
        */
        var service8_slider = $("#service-8-slider");
        service8_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        14. SERVICE SLIDER
        =========================================================================================
        */
        var service9_slider = $("#service-9-slider");
        service9_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        /*
        =========================================================================================
        15. QUOTE SLIDER
        =========================================================================================
        */
        var quote_slider = $("#quote-slider");
        quote_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        16. QUOTE 2 SLIDER
        =========================================================================================
        */
        var quote2_slider = $("#quote-2-slider");
        quote2_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });

        /*
        =========================================================================================
        17. QUOTE 3 SLIDER
        =========================================================================================
        */
        var quote3_slider = $("#quote-3-slider");
        quote3_slider.owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 3
                }
            }
        });

        /*
        =========================================================================================
        18. QUOTE 4 SLIDER
        =========================================================================================
        */
        var quote4_slider = $("#quote-4-slider");
        quote4_slider.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });


        /*
        =========================================================================================
        19. QUOTE 4 SLIDER
        =========================================================================================
        */
        var quote5_slider = $("#quote5-slider");
        quote5_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });

        /*
        =========================================================================================
        20. QUOTE 2 SLIDER
        =========================================================================================
        */
        var quote6_slider = $("#quote-6-slider");
        quote6_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });


        /*
        =========================================================================================
        21. CLIENT SLIDER
        =========================================================================================
        */
        var client_slider = $("#client-slider");
        client_slider.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                400: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        });

        /*
        =========================================================================================
        22. COUNTER
        =========================================================================================
        */
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        /*
        =========================================================================================
        23. DATE COUNTDOWN
        =========================================================================================
        */
        var endDate = "July 26, 2016 20:39:00";
        $('.tk-countdown .row').countdown({
            date: endDate,
            render: function(data) {
                $(this.el).html('<div><div class="days"><span>' + this.leadingZeros(data.days, 2) + '</span><span>days</span></div><div class="hours"><span>' + this.leadingZeros(data.hours, 2) + '</span><span>hours</span></div></div><div class="tk-countdown-ms"><div class="minutes"><span>' + this.leadingZeros(data.min, 2) + '</span><span>minutes</span></div><div class="seconds"><span>' + this.leadingZeros(data.sec, 2) + '</span><span>seconds</span></div></div>');
            }
        });


        /*
        =========================================================================================
        24. CONTACT  FORM VALIDATION
        =========================================================================================
        */

        $("#Name").keyup(function() {
            "use strict";
            var value = $(this).val();
            if (value.length > 1) {
                $(this).parent().find(".error_message").remove();
                $(this).css({
                    "border-bottom": "2px solid rgba #464747"
                })
            } else {
                $(this).parent().find(".error_message").remove();
                $(this).parent().append("<div class='error_message'>Name value should be at least 2</div>");
            }
        });
        $("#Email").keyup(function() {
            "use strict";
            var value = $(this).val();
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (testEmail.test(value)) {
                $(this).parent().find(".error_message").remove();
                $(this).css({
                    "border-bottom": "2px solid rgba #464747"
                })
            } else {
                $(this).parent().find(".error_message").remove();
                $(this).parent().append("<div class='error_message'>Please entire a valid email. </div>");
            }
        });
        $("#contact_submit").on('click', function() {
            "use strict";
            var nameValue = $("#Name").val();
            if (!nameValue.length) {
                $("#Name").css({
                    "border-bottom": "2px solid red"
                });
                $("#Name").parent().find(".error_message").remove();
                $("#Name").parent().append("<div class='error_message'>Name is required</div>");
                return false;
            }
            if (nameValue.length < 1) {
                $("#Name").css({
                    "border-bottom": "2px solid red"
                });
                $("#Name").parent().find(".error_message").remove();
                $("#Name").parent().append("<div class='error_message'>Name value should be at least 2</div>").show();
                return false;
            }
            var emailValue = $("#Email").val();
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (!emailValue) {
                $("#Email").css({
                    "border-bottom": "2px solid red"
                });
                $("#Email").parent().find(".error_message").remove();
                $("#Email").parent().append("<div class='error_message'>Email is required</div>").show();
                return false;
            }
            if (!testEmail.test(emailValue)) {
                $("#Email").css({
                    "border-bottom": "2px solid red"
                });
                $("#Email").parent().find(".error_message").remove();
                $("#Email").parent().append("<div class='error_message'>Please entire a valid email.</div>").show();
                return false;
            }
            var subjectValue = $("#Subject").val();
            var phoneValue = $("#Phone").val();
            var messageValue = $("#Message").val();
            if (nameValue && emailValue) {
                $(".feedback_box").slideDown();
                $.ajax({
                    url: 'mail/mail.php',
                    data: {
                        name: nameValue,
                        email: emailValue,
                        phone: phoneValue,
                        subject: subjectValue,
                        message: messageValue
                    },
                    type: 'POST',
                    success: function(result) {
                        "use strict";
                        $(".show_result").append("<div class='result_message'>" + result + "</div>");
                        $(".result_message").slideDown();
                        $("#Name").val("");
                        $("#Email").val("");
                        $("#Phone").val("");
                        $("#Subject").val("");
                        $("#Message").val("");
                    }
                });
            }
            return false;
        });



        /*
        =========================================================================================
        25. GALLERY SECTION
        =========================================================================================
        */

        $("#second").bootFolio({
            bfLayout: "bflayhover",
            bfFullWidth: "full-width",
            bfHover: "bfhoverCrafty",
            bfAnimation: "scale",
            bfSpace: "20",
            bfAniDuration: 500,
            bfCaptioncolor: "rgba(0, 0, 0, 0)",
            bfTextcolor: "#ffffff",
            bfTextalign: "center",
            bfNavalign: "center"
        });
        $('.image-link').magnificPopup({type:'image'});

        /*
        =========================================================================================
        26. MATCH HEIGHT
        =========================================================================================
        */
        $('.match_item').matchHeight({
            byRow: true,
            property: 'height',
            target: null,
            remove: false
        });
    }());
    /*
    =========================================================================================
    27. SHOPPING CART AND SEARCH CONTENT
    =========================================================================================
    */
    (function ($) {
          $('.add-to-cart').on('click', function() {
            $('.add-to-cart-content').toggleClass("open-cart");
            return false;
          });
          $('.filter-search').on('click', function() {
            $('.search-content').toggleClass("open-search");
            return false;
          });

    })(jQuery);

    /*
    =========================================================================================
    28. SHOP SECTION
    =========================================================================================
    */
    $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 300,
          values: [ 50, 200 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );

        $(".shop-price-slider input").css("color","#1bb580");
        $(".ui-widget-header").css({ border: "1px solid #1bb580", height: "4px" });
        $(".shop-price-slider-content span").css({
            "background-color": "#323232",
            "border-color": "#323232",
            "top": "-2px",
            "height": "8px",
            "width": "8px",
            "margin": "0px",
            "border-radius": "0px",
            "outline": "none",
            "box-shadow": "none"
        });
        $(".client-img a span img").css({ width: "inherit" });
    });
    (function ($) {
          $('.spinner .btn:last-of-type').on('click', function() {
            $('.spinner input').val( parseInt($('.spinner input').val(), 10) + 1);
          });
          $('.spinner .btn:first-of-type').on('click', function() {
            $('.spinner input').val( parseInt($('.spinner input').val(), 10) - 1);
          });
          $(".s-q-left .spinner input").css({
            "outline": 0,
            "box-shadow": "none",
            "width": "25px",
          });

    })(jQuery);


});
