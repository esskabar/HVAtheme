<div class="section-urban" id="amenities">
    <div class="col img"
         style="background-image:url('<?php echo get_sub_field('left_img')['sizes']['large']; ?>')"></div>
    <div class="col content">
        <div class="row top">
            <h3 class="title"><?php echo get_sub_field('content_title'); ?></h3>
            <div class="content"><?php echo get_sub_field('content_text'); ?></div>
        </div>
        <div class="row bottom" style="background-image:url('<?php echo get_sub_field('right_img')['sizes']['large']; ?>')">
            <div class="time"><span><?php echo get_sub_field('time'); ?></span></div>
            <div class="dest"><?php echo get_sub_field('dest'); ?></div>
        </div>
    </div>
</div>