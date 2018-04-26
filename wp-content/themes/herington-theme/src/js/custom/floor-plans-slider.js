'use strict';

(function ($) {

    var $nav_tabs_slider = $('.nav-tabs');



    // Function equal height nav-tabs //
    function tab_pane_slider_height() {
        var height = $('.tab-pane_slider').outerHeight() - 50;
        $nav_tabs_slider.find('.slick-slide a').css('line-height', height / 3 + 'px');

        setTimeout(function() {
            $nav_tabs_slider.find('.slick-current a').trigger("click");
        }, 600);

        console.log('Function equal height nav-tabs');
    }



    // Trigger Click on active slide item, to call function equal height nav-tabs  //
    $nav_tabs_slider.on('init', function () {
        setTimeout(function() {
            $nav_tabs_slider.find('.slick-current a').trigger("click");
        }, 600);

        console.log('nav-tabs init');
    });



    // Call function equal height nav-tabs when slide change //
    /*$nav_tabs_slider.on('afterChange', function () {
        tab_pane_slider_height();

        console.log('afterChange');
    });*/



    $(document).ready(function () {

        // Set active first tab in Floor Plans section //
        $('.wrapper_title_categories ul.title_categories li.categories_list:first-child').addClass('active');
        $('.wrapper_categories_slider .tab-content .tab-pane:first-child').addClass('in active');


        // Floor Plans items slider init //
        $('.tab-pane_slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
            nextArrow: '<i class="icon-right-open-big"></i>',
            prevArrow: '<i class="icon-left-open-big"></i>'
        });



        // nav_tabs_slider init //
        $nav_tabs_slider.slick({
            arrows: false,
            dots: false,
            centerMode: true,
            slidesToShow: 3,
            verticalSwiping: true,
            vertical: true,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        vertical: false
                    }
                }]
        });


        // Trigger Goto active slide when event click on item //
        $nav_tabs_slider.find('a[data-toggle=tab]').click(function () {
            var index = $(this).closest('.slick-slide').attr('data-slick-index');
            $nav_tabs_slider.slick('slickGoTo', index);

            console.log('on.click');
        });



        // Call function equal height nav-tabs on resizeEnd //
        $(window).on('resizeEnd', function () {
            tab_pane_slider_height();

            console.log('resizeEnd');
        });

    });
    
})(jQuery);