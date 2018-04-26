<?php
/* Template Name: Thank You Page */
?>


<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="page-content">
        <div class="container">
            <h1><?php the_title() ?></h1>

            <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; endif; ?>


<?php get_footer(); ?>