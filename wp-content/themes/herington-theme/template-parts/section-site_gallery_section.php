<div class="site_gallery_section" id="gallery">
    <h2 class="section_title"><?php the_sub_field('title_gallery_section') ?></h2>
    <?php
    $images = get_sub_field('Images_site_gallery');
    $ppp = 3; ?>

    <div class="container" id="metaWrapper" data-postid="<?php echo $post->ID; ?>" data-ppp="<?php echo $ppp; ?>" data-length="<?php echo count($images); ?>">

        <?php foreach (array_slice($images, 0, $ppp) as $image) { ?>
            <div class="col-md-4">
                <a class="boxe" href="<?php echo $image['sizes']['full_hd']; ?>">
                    <?php echo "<img src='{$image['sizes']['gallery']}' width='396px' height='296px'/>"; ?>
                </a>
            </div>
        <?php } ?>
    </div>

    <?php if (count($images) > $ppp) : ?>
        <div class="loadmore"><?php the_sub_field('view_more'); ?> <i class="icon-plus-1"></i></div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>
