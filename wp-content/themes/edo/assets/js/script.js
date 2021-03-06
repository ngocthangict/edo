(function($){
    "use strict"; // Start of use strict
    /**==============================
    ***  Effect tab category
    ===============================**/
    
    var labels = ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs'];
    var layout = '<span class="box-count day"><span class="number">{dnn}</span> <span class="text">Days</span></span><span class="dot">:</span><span class="box-count hrs"><span class="number">{hnn}</span> <span class="text">Hrs</span></span><span class="dot">:</span><span class="box-count min"><span class="number">{mnn}</span> <span class="text">Mins</span></span><span class="dot">:</span><span class="box-count secs"><span class="number">{snn}</span> <span class="text">Secs</span></span>';
            
    function tab_animated(){
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var href = $(this).attr('href');

            $(href).find('.owl-item.active').each(function(i){
                var style = $(this).attr('style');
               $(this).attr("style",style+
                    "-webkit-animation-delay:" + i * 200 + "ms;"
                    + "-moz-animation-delay:" + i * 200 + "ms;"
                    + "-o-animation-delay:" + i * 200 + "ms;"
                    + "animation-delay:" + i * 200 + "ms;").addClass('fadeInUp animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                         $(this).removeClass('fadeInUp animated');
                }); 
            })
        });
    }

    /* ---------------------------------------------
     Owl carousel
     --------------------------------------------- */
    function init_carousel(){
        $('.kt-owl-carousel').each(function(){
          var config = $(this).data();
          //config.navText = ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'];
          var animateOut = $(this).data('animateout');
          var animateIn = $(this).data('animatein');

          if(typeof animateOut != 'undefined' ){
            config.animateOut = animateOut;
          }
          if(typeof animateIn != 'undefined' ){
            config.animateIn = animateIn;
          }
          var owl = $(this);
          setTimeout(function(){
            owl.owlCarousel(config);

              $(this).find('.owl-item').removeClass('last-item');
              $(this).find('.owl-item.active').last().addClass('last-item');

              var t = $(this);
              owl.on('changed.owl.carousel', function(event) {
                var item      = event.item.index;
                t.find('.owl-item').removeClass('last-item');
                setTimeout(function(){
                    t.find('.owl-item.active').last().addClass('last-item');
                }, 100);
                
              })
          }, 1000);
          
        });
    }

    /* Top menu*/
    function scrollCompensate(){
        var inner = document.createElement('p');
        inner.style.width = "100%";
        inner.style.height = "200px";
        var outer = document.createElement('div');
        outer.style.position = "absolute";
        outer.style.top = "0px";
        outer.style.left = "0px";
        outer.style.visibility = "hidden";
        outer.style.width = "200px";
        outer.style.height = "150px";
        outer.style.overflow = "hidden";
        outer.appendChild(inner);
        document.body.appendChild(outer);
        var w1 = parseInt(inner.offsetWidth);
        outer.style.overflow = 'scroll';
        var w2 = parseInt(inner.offsetWidth);
        if (w1 == w2) w2 = outer.clientWidth;
        document.body.removeChild(outer);
        return (w1 - w2);
    }

    function resizeTopmenu(){
        if($(window).width() + scrollCompensate() >= 768){
            var main_menu_w = $('#main-menu').innerWidth();
            $("#main-menu .megamenu ").each(function(){
                var menu_width = $(this).innerWidth();
                var offset_left = $(this).position().left;
                if(menu_width > main_menu_w){
                    $(this).css('width',main_menu_w+'px');
                    $(this).css('left','0');
                }else{
                    if((menu_width + offset_left) > main_menu_w){
                        var t = main_menu_w-menu_width;
                        var left = parseInt((t/2));
                        $(this).css('left',left);
                    }
                }
            });
        }

        if($(window).width()+scrollCompensate() < 1025){
            $("#main-menu li.dropdown:not(.active) >a").attr('data-toggle','dropdown');
        }else{
            $("#main-menu li.dropdown >a").removeAttr('data-toggle');
        }
    }
    /* ---------------------------------------------
     Stick menu
     --------------------------------------------- */
     function stick_menu(){
        if($('#header .main-menu').length >0){
            var offset = $('#header .main-menu').offset();
            var header_height = offset.top;
            var h = $(window).scrollTop();
            var width = $(window).width();
            if(width > 991){

                if(h > 250){
                    $('#header .main-menu').addClass('main-menu-ontop');
                }else{
                    $('#header .main-menu').removeClass('main-menu-ontop');
                }
            }else{
                $('#header .main-menu').removeClass('main-menu-ontop');
            }
        }
        
     }

     function kt_bxslider(){
        $('.kt-bxslider').each(function(){
            var slider = $(this).bxSlider(
                {
                    nextText:'<i class="fa fa-angle-right"></i>',
                    prevText:'<i class="fa fa-angle-left"></i>',
                    //auto: true
                }
            );
            slider.reloadSlider();
        })
        
     }

    /**==============================
    ***  Auto width megamenu
    ===============================**/
    function auto_width_megamenu(){
        var full_width = parseInt($('.container').innerWidth());

        //full_width = $( document ).width();
        var menu_width = parseInt($('.vertical-menu-content').actual('width'));
        var w = ((full_width - menu_width)-2);
        $('.vertical-menu-content').find('.megamenu').css('width',w+'px');
    }
    /* ---------------------------------------------
     Woocommercer Quantily
     --------------------------------------------- */
     function woo_quantily(){
        $('body').on('click','.quantity-plus',function(){
            var obj_qty = $(this).closest('.box-qty').find('input.qty'),
                val_qty = parseInt(obj_qty.val()),
                min_qty = parseInt(obj_qty.attr('min')),
                max_qty = parseInt(obj_qty.attr('max')),
                step_qty = parseInt(obj_qty.attr('step'));
            val_qty = val_qty + step_qty;
            if(max_qty && val_qty > max_qty){ val_qty = max_qty; }
            obj_qty.val(val_qty);
            return false;
        });
        $('body').on('click','.quantity-minus',function(){
            var obj_qty = $(this).closest('.box-qty').find('input.qty'), 
                val_qty = parseInt(obj_qty.val()),
                min_qty = parseInt(obj_qty.attr('min')),
                max_qty = parseInt(obj_qty.attr('max')),
                step_qty = parseInt(obj_qty.attr('step'));
            val_qty = val_qty - step_qty;
            if(min_qty && val_qty < min_qty){ val_qty = min_qty; }
            if(!min_qty && val_qty < 0){ val_qty = 0; }
            obj_qty.val(val_qty);
            return false;
        });
      }
    function hasOnlyCountdown(){
        jQuery( '.only_countdown' ).each(function(){
            var max_time = $(this).find('.max-time-sale');
            if( max_time.length > 0 ){
                var y = max_time.data('y');
                var m = max_time.data('m');
                var d = max_time.data('d');
                var austDay = new Date( y, m - 1, d, 0, 0, 0 );
                $(this).find('.countdown-only').countdown({
                    until: austDay,
                    labels: labels, 
                    layout: layout
                });
            }
        });
    }
    /* ---------------------------------------------
     Scripts ready
     --------------------------------------------- */
    $(document).ready(function() {
        init_carousel();
        resizeTopmenu();
        kt_bxslider();
        auto_width_megamenu();
        woo_quantily();
        tab_animated();
        
        hasOnlyCountdown();
        // Select menu
        $( "#category-select" ).selectmenu();
        // count downt
        var $count_down = $('.countdown-lastest');
        if( $count_down.length > 0 ) {
            var labels = ['Years', 'Months', 'Weeks', 'Days', 'Hrs', 'Mins', 'Secs'];
            var layout = '<span class="box-count day"><span class="number">{dnn}</span> <span class="text">Days</span></span><span class="dot">:</span><span class="box-count hrs"><span class="number">{hnn}</span> <span class="text">Hrs</span></span><span class="dot">:</span><span class="box-count min"><span class="number">{mnn}</span> <span class="text">Mins</span></span><span class="dot">:</span><span class="box-count secs"><span class="number">{snn}</span> <span class="text">Secs</span></span>';
            $count_down.each(function() {
                var austDay = new Date($(this).data('y'),$(this).data('m') - 1,$(this).data('d'),$(this).data('h'),$(this).data('i'),$(this).data('s'));
                $(this).countdown({
                    until: austDay,
                    labels: labels, 
                    layout: layout
                });
            });
        }

        /// tre menu category
        $(document).on('click','.widget_product_categories .product-categories li',function(){
            $(this).toggleClass('active');
            $(this).children('ul').slideToggle();
        })
        // Zoom
        if($('.easyzoom').length >0){
            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();

            // Get an instance API
            var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

            // Setup thumbnails example
            $('.thumbnails').on('click', 'a', function(e) {
                $(this).closest('.product-list-thumb').find('a').each(function(){
                    $(this).removeClass('selected');
                })
                
                $(this).addClass('selected');

                var $this = $(this);
                e.preventDefault();
                // Use EasyZoom's `swap` method
                api1.swap($this.data('standard'), $this.attr('href'));

            });

            // Setup toggles example
            var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

            $('.toggle').on('click', function() {
                var $this = $(this);
                if ($this.data("active") === true) {
                    $this.text("Switch on").data("active", false);
                    api2.teardown();
                } else {
                    $this.text("Switch off").data("active", true);
                    api2._init();
                }
            });
        }

        /** TOP review**/
        $(document).on('click','.block-top-review .product-name',function(){
            $(this).closest('.list-product').find('.product').each(function(){
                $(this).removeClass('active');
            })
            $(this).closest('.product').addClass('active');
            return false;
        })

        /* scroll top */ 
        $(document).on('click','.scroll_top',function(){
            $('body,html').animate({scrollTop:0},400);
            return false;
        })
        // Top menu vetical
        if($('.shop-menu').length >0){
            $(document).on('click','.shop-menu .icon',function(){
                $(this).closest('.shop-menu').find('.block-vertical-menu').slideToggle();
            })
            /* Close vertical */
            $(document).on('click','*',function(e){
                var container = $(".shop-menu");
                if (!container.is(e.target) && container.has(e.target).length === 0){
                    container.find('.block-vertical-menu').hide();
                }
            })
        }

        // Display list product
        $(document).on('click','.display-product-option li',function(){
            var type = $(this).data('type');
            $(this).closest('.display-product-option').find('li').each(function(){
                $(this).removeClass('selected');
            })
            $(this).addClass('selected');
            if(type=='list'){
                $('body').find('.category-products').addClass('products-list-view');
            }else if(type=="grid"){
                $('body').find('.category-products').removeClass('products-list-view');
            }

            // ajax set product style view
            var data = {
                action: 'fronted_set_products_view_style',
                security : ajax_frontend.security,
                type: type
            };
            $.post(ajax_frontend.ajaxurl, data, function(response){
                console.log(response);
            })
        })
        // OWL Product thumb
        $('.product .thumbnails').owlCarousel(
            {
                dots:false,
                nav:true,
                navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                margin:20,
                responsive : {
                  // breakpoint from 0 up
                  0 : {
                      items : 2,
                  },
                  // breakpoint from 480 up
                  480 : {
                      items : 2,
                  },
                  // breakpoint from 768 up
                  768 : {
                      items : 2,
                  },
                  1000 : {
                      items : 3,
                  }
              }
            }
        );
        // Vertical menu
        $(document).on('click','.block-vertical-menu-style2 .vertical-head',function(){
            if($('body').hasClass('home')){

            }else{
                $('.block-vertical-menu-style2 .vertical-menu-content').slideToggle();
            }
        })

        // Find store
        $(document).on('click','#find-store-button',function(){
            
            var t = $(this);
            var value = $(this).closest('.find-store-form').find('input.input-box-text').val();
            $(this).closest('.find-store-form').find('find-store-messages').html('');
            if(value == ""){
                $(this).closest('.find-store-form').find('.find-store-messages').html('Please enter Zipcode, City or Country');
            }else{
                $(this).html('Loading...');
                setTimeout(function(){t.html('Go');}, 1000);
                $(this).closest('.find-store-form').find('.find-store-messages').html('Did not find any results');
            }
            
            
        })

        // owl-nav postion
        if( $('.controls-top-left').length >0 ){
            $('.controls-top-left').each(function(){
                var parent = $(this).closest('.block3');
                var title_w = parent.find('.block-head .block-title').outerWidth()-21;
                parent.find('.owl-controls').css('left',title_w+'px');

            })
        }

        $(document).on('click','.top-banner-header .close-banner-top',function(){
            $(this).closest('.top-banner-header').slideUp();
        })

    });
    /* ---------------------------------------------
     Scripts initialization
     --------------------------------------------- */
    $(window).load(function() {
        resizeTopmenu();
        auto_width_megamenu();
        init_carousel();
        //custom_color_vertical_menu();
        /* Show hide scrolltop button */
        if( $(window).scrollTop() == 0 ) {
            $('.scroll_top').stop(false,true).fadeOut(600);
        }else{
            $('.scroll_top').stop(false,true).fadeIn(600);
        }

        // Mini cart Scrollbar
        if($('.block-mini-cart .mini-cart-content').length >0 ){
            $(".block-mini-cart .mini-cart-content").mCustomScrollbar();
        }
        
    });
    /* ---------------------------------------------
     Scripts resize
     --------------------------------------------- */
    $(window).resize(function(){
        resizeTopmenu();
        auto_width_megamenu();
    });
    /* ---------------------------------------------
     Scripts scroll
     --------------------------------------------- */
    $(window).scroll(function(){
        stick_menu();
        auto_width_megamenu();
        /* Show hide scrolltop button */
        if( $(window).scrollTop() == 0 ) {
            $('.scroll_top').stop(false,true).fadeOut(600);
        }else{
            $('.scroll_top').stop(false,true).fadeIn(600);
        }
    });
})(jQuery); // End of use strict