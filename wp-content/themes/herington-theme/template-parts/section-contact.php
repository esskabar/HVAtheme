<div class="section-contact" id="contact">
    <div class="col-left">
        <div class="col-info">
            <div class="office-hours">
                <?php echo get_field('office_hours','options');?>
            </div>
            <div class="address">
                <?php echo get_field('address','options');?>
            </div>
        </div>
        <div class="col-logo_phone">
            <div class="bg" style="background-image:url('<?php echo get_field('col-logo_phone_bg','options')['sizes']['large']; ?>')"></div>
            <img src="<?php echo get_field('header_logo','options')['sizes']['large']; ?>" alt="">
            <span class="phone"><?php echo get_field('header_phone','options');?></span>
        </div>
    </div>
    <div class="col-right">
        <div class="form">
            <?php echo do_shortcode('[contact-form-7 id="35" title="Contact form Modal"]'); ?>
        </div>
    </div>
</div>