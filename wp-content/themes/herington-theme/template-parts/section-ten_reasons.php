<div class="ten-reasons" id="neigborhood">
    <div class="bg" style="background-image:url('<?php echo get_sub_field('bg_img')['sizes']['full_hd']; ?>')"></div>
    <div class="content">
        <div class="title">
            <?php echo get_sub_field('title');?>
        </div>
        <?php if (have_rows('list')): ?>
            <div class="list">
                <?php while (have_rows('list')):
                    the_row(); ?>
                    <div class="item"><?php echo get_sub_field('item');?></div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class="loadmore">View Full List<?php the_sub_field('view_more'); ?> <i class="icon-plus-1"></i></div>
    </div>
</div>