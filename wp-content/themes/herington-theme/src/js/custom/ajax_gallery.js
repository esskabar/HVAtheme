'use strict';

(function ($) {

    $(document).ready(function () {


        $(".site_gallery_section .loadmore").on("click", function (e) {
            e.preventDefault();

            $('.site_gallery_section .loadmore i').toggleClass('icon-spin4 animate-spin icon-plus-1');

            var $container = $('#metaWrapper'),
                length = $container.data('length'),
                ppp = $container.data('ppp'),
                number = $container.find('> .col-md-4').length,
                page = number / ppp,
                page_id = $container.data('postid');
            var ajaxurl = '/wp-admin/admin-ajax.php';

            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    'page': page,
                    'ppp': ppp,
                    'page_id': page_id,
                    action: 'meta_fetch'
                },
                success: function (response) {

                    if (length - number <= ppp) {
                        $('.site_gallery_section .loadmore').hide();
                    }

                    $('.site_gallery_section .loadmore i').toggleClass('icon-spin4 animate-spin icon-plus-1');
                    $container.append(response);
                    $('.site_gallery_section .col-md-4').fadeIn('slow');


                    $("#metaWrapper").data('lightGallery').destroy(true);
                    $("#metaWrapper").lightGallery({
                        selector: '.boxe',
                        download: false
                    });

                }


            });

            return false;
        });

    });
})(jQuery);
