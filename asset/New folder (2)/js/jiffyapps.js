        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript
        |--------------------------------------------------------------------------
        |
        | @author 		: Candra Dwi Waskito & Supatmo Agus Edi Cahyono;
        | @created 		: 11 February 2015;
        | @version 		: 1.1;
        |
        */

        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Push Menu
        |--------------------------------------------------------------------------
        |
        */
                $('.toggle-menu').jPushMenu({
                closeOnClickLink: false
                });
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Dropdown Toggle
        |--------------------------------------------------------------------------
        |
        */
                $('.dropdown-toggle').dropdown();
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Nice Scroll
        |--------------------------------------------------------------------------
        |
        */
                $("html").niceScroll({
                    scrollspeed: 60,
                    cursoropacitymax: 0.7,
                    cursorwidth: "10px",
                    autohidemode: true,
                    horizrailenabled: false // nicescroll can manage horizontal scroll
                });
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Button Scroll to Dream Call
        |--------------------------------------------------------------------------
        |
        */
                $(".btn-dream-call").click(function() {
                    $('html, body').animate({
                        scrollTop: $("#dream-call").offset().top
                    }, 2000);
                });
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Owl Carousel
        |--------------------------------------------------------------------------
        |
        */
                var owl = $(".owl-apps");
                    owl.owlCarousel({
                    itemsCustom : [
                    [0, 2],
                    [320, 2],
                    [360, 3],
                    [450, 4],
                    [600, 6],
                    [700, 6],
                    [1000, 8],
                    [1200, 10],
                    [1400, 10],
                    [1600, 10],
                    [1900, 10]
                    ],
                    navigation : false
                });
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Animate Block
        |--------------------------------------------------------------------------
        |
        */
                var $elems = $('.animateblock');
                var winheight = $(window).height();
                var fullheight = $(document).height();    
                $(window).scroll(function () {
                    animate_elems();
                });    
                function animate_elems() {
                    wintop = $(window).scrollTop();
                    $elems.each(function () {
                        $elm = $(this);
                        if ($elm.hasClass('animated')) {
                            return true;
                        }
                        topcoords = $elm.offset().top;
    
                        if (wintop > (topcoords - (winheight * .75))) {
                            $elm.addClass('animated');
                        }
                    });
                }            
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Counter Data
        |--------------------------------------------------------------------------
        |
        */
                $('#counterdata').data('countToOptions', {
                    formatter: function (value, options) {
                      return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    }
                });
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Start All TImers
        |--------------------------------------------------------------------------
        |
        */
                $('.timer').each(count);
                    function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                }            
                timerSeconds = 15;
                timerFinish = new Date().getTime()+(timerSeconds*1000);
                timer = setInterval("stopWatch()",50);
        /*
        |--------------------------------------------------------------------------
        | Jiffy Apps Javascript Bootstrap Tooltip
        |--------------------------------------------------------------------------
        |
        */
                $('[data-toggle="tooltip"]').tooltip({
                    placement: "top",
                    trigger: "focus",
                    animation: false
                })
            
            new WOW().init(); 