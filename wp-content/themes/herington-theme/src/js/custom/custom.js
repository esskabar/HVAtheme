'use strict';

(function ($) {

    $(window).on('load', function () {
        $('body').addClass('loaded');
    });


    // Resize Event //
    $(window).resize(function () {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            $(this).trigger('resizeEnd');
        }, 600);
    });


    // Light Gallery Init //
    $(document).ready(function () {
        $("#metaWrapper").lightGallery({
            selector: '.boxe',
            download: false
        });
    });


    // Sticky menu on scroll //
    $(document).scroll(function () {

        if ($(window).width() > 600) {

            var scrollTop = $(document).scrollTop();
            if (scrollTop > 20) {
                $('header').addClass('sticky');
                $('.hero_image .wrapper_reserve_section').css('transform', 'translateX(-115%)');
            } else {
                $('header').removeClass('sticky');
                $('.hero_image .wrapper_reserve_section').css('transform', 'translateX(0)');
            }
        }
    });


    // Mobile menu toggle //
    $(document).ready(function () {
        $('.navbar-toggle').on('click', function () {
            $(this).toggleClass('open');
            $(this).parent('#navbarNav').toggleClass('open');
            $('header').addClass('sticky');
            $('.hero_image .wrapper_reserve_section').css('transform', 'translateX(-115%)');
        })
    });


    // Modal Form //
    $(document).ready(function () {

        // Set form bg-image //
        if ($('.wrapper_modal__block').length) {
            var img_attr = $('.modal_front_bkg').attr('data-img_bkg');
            $('.wrapper_modal__block .wraper_inputs').css('background-image', 'url(  ' + img_attr + ' )');
        }

        // Show Modal-1 on click //
        $('.reserve-modal').on('click', function () {
            $('#reserve_selected').fadeIn('slow');
        });

        // Hide Modal on click 'close btn'  //
        $('.wrapper_modal__block .close').on('click', function () {
            $(this).closest('.wrapper_modal__block').fadeOut('slow');
        });

        // Hide Modal on mouseover click  //
        $(document).mouseup(function (e) {
            var container = $(".modal__block");
            if (container.has(e.target).length === 0) {
                container.closest('.wrapper_modal__block').fadeOut('slow');
            }
        });

    });


    // Init selectpicker //
    $(document).ready(function () {
        $("select").each(function () {
            $(this).selectpicker({});
        });
    });


    // Set Sticky menu on small devices //
    $(document).ready(function () {
        if ($(window).width() <= 600) {
            $('header').addClass('sticky');
            $('.hero_image .wrapper_reserve_section').css('transform', 'translateX(-115%)');
        }
    });

    // Set Sticky menu on small devices //
    $(window).on('load resizeEnd', function () {
        if ($(window).width() <= 600) {
            $('header').addClass('sticky');
            $('.hero_image .wrapper_reserve_section').css('transform', 'translateX(-115%)');
        }
    });


    // 10 Reasons section - View Full list //
    $(document).ready(function () {
        $('.ten-reasons .item:nth-child(n + 5)').hide();

        $('.ten-reasons .loadmore').on('click', function () {
            $('.ten-reasons .item').fadeIn('slow');
            $(this).fadeOut('slow');
        });
    });


    // Set Ploor Plane Title to Modal Form input val //
    $(document).ready(function () {
        var input_title = $('#reserve_current input[name="title-980"]');
        input_title.attr('readonly', 'readonly');

        $('.reserve-current').on('click', function () {
            $('#reserve_current').fadeIn('slow');

            var current_title = $(this).closest('.right_section').find('.title_unit').text();
            input_title.val(current_title).attr('value', current_title);
        });

    });


    // Anchor slide menu //
    $(document).on('click', 'header a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 65
        }, 500);
    });

    // add spec header class to thank-you page //
    $('.page-template-thank-you-page header').addClass('thank-you');


})(jQuery);