<div class="unit_post_section" id="floor-plans">
    <h2 class="section_title"><?php echo 'Floor Plans' ?></h2>
    <div class="wrapper_categories_slider">

        <div class="container">
            <?php
            echo '<div class="wrapper_title_categories">
                    <div class="nav nav-tabs title_categories vertical-active" role="tablist">';

            $args_unit = array(
                'post_type' => 'Unit',
                'taxonomy' => 'category',
                'hide_empty' => true,
                'exclude' => 1
            );
            $categories = get_terms($args_unit);

            foreach ($categories as $category) {
                echo '<div class="categories_list"><a href="#' . $category->slug . '" role="tab" data-toggle="tab"> ' . $category->name . '</a></div>';
            }
            echo '</div>
            </div>';
            ?>

            <div class="tab-content">

                <?php foreach ($categories as $category) {
                    echo '<div class="tab-pane fade" id="' . $category->slug . '"><div class="tab-pane_slider">';
                    $the_query = new WP_Query(array(
                        'post_type' => 'Unit',
                        'child_of' => 0,
                        'parent' => '',
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => 0,
                        'hierarchical' => 1,
                        'exclude' => '',
                        'include' => '',
                        'number' => 0,
                        'taxonomy' => 'category',
                        'pad_counts' => false,
                        'category_name' => $category->slug,
                    ));
                    while ($the_query->have_posts()) :
                        $the_query->the_post(); ?>

                        <div class="wrapper_unit_slider">
                            <div class="left_section">
                                <?php $image = get_field('unit_image') ?>
                                <div class="wrapper_img">
                                    <div class="image_unit">
                                        <img src="<?php echo $image['sizes']['floor_plane']; ?>" alt="">
                                    </div>
                                </div>


                            </div>
                            <div class="right_section">
                                <?php $image = get_field('unit_table_bkg', 'option') ?>
                                <div class="unit_table_description"
                                     style="background-image: url('<?php echo $image['url']; ?>')">
                                    <div class="wrapper_data_table">
                                        <div class="title_unit"><?php the_title(); ?></div>
                                        <div class="bedrooom_unit"><?php the_field('unit_bedroom_num'); ?></div>
                                        <div class="bathrooom_unit"><?php the_field('unit_bathroom'); ?></div>
                                        <div class="sqft_unit"><?php the_field('unit_sqft'); ?> SQFT</div>
                                        <div class="price_unit">$<?php the_field('unit_price') ?></div>
                                    </div>
                                </div>

                                <div class="bottom_buttons">
                                    <div class="reserve_form reserve-current">Reserve now</div>

                                    <?php if(get_field('custom_button')): ?>
                                    <a class="reserve_form" href="<?php the_field('custom_button_link'); ?>"><?php the_field('custom_button_title'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php endwhile;
                    wp_reset_query();
                    echo "</div></div>";
                } ?>
            </div>
        </div>
    </div>
</div>

