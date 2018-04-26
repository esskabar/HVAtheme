<?php $image = get_sub_field('hero_image');?>

<div class="hero_image bkg_hero_image" style="background-image: url('<?php echo $image['url']?>')" id="top">
    <div class="wrapper_reserve_section">
        <div class="reserve_logo">
            <?php $image = get_field('header_logo','option'); ?>
            <img class="logo" src="<?php echo $image['url']; ?>" alt="">
        </div>
        <div class="oval_separete"></div>
        <div class="wrapper_reserve_titles">
            <div class="reserve_title"><?php the_field('resrve_title' , 'option')?></div>
            <div class="reserve_subtitle"><?php the_field('reserve_subtitle' , 'option')?></div>
            <div class="reserve_subtitle_blue"><?php the_field('reserve_subtitle_blue' , 'option')?></div>
            <div class="reserve_button reserve-modal"><?php the_field('reserve_button', 'option')?></div>
        </div>
    </div>
</div>