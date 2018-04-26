<div class="section-welcome" style="background-image:url('<?php echo get_sub_field('bg_img')['sizes']['full_hd']; ?>')" id="recidents">
    <div class="container">
        <div class="title">
            <?php echo get_sub_field('title') ?>
        </div>

        <?php $count = count(get_sub_field('list')); ?>
        <?php if (have_rows('list')): ?>
        <div class="row">
            <?php while (have_rows('list')):
            the_row(); ?>
            <?php if ($count == 1): ?>
            <div class="col-md-12">
                <?php elseif ($count == 2): ?>
                <div class="col-md-6">
                    <?php elseif ($count == 3): ?>
                    <div class="col-md-4">
                        <?php elseif ($count == 4): ?>
                        <div class="col-md-3">
                            <?php endif; ?>

                            <a class="btn"
                               href="<?php echo get_sub_field('href') ?>"><?php echo get_sub_field('title') ?></a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>