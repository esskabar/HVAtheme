<?php


function global_scripts()
{
    //wp_enqueue_style('semantic-css', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.css', '', '1.0.1');
    //wp_enqueue_script('semantic-js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.js', array('vendor'));

    wp_enqueue_style('main-style', get_template_directory_uri() . '/build/css/style.min.css', array());

    wp_enqueue_style('fontello', get_template_directory_uri() . '/src/fonts/fontello/css/fontello.css', '', '1.0.1');
    wp_enqueue_style('fontello-animation', get_stylesheet_directory_uri() . '/src/fonts/fontello/css/animation.css', '', '1.0.1');

    wp_localize_script('meta-ajaxscript', 'ajaxMeta', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    wp_enqueue_script('vendor', get_template_directory_uri() . '/build/js/vendors.min.js', array('jquery'));
    wp_enqueue_script('custom', get_template_directory_uri() . '/build/js/custom.min.js', array('vendor'));

    wp_enqueue_script('gmap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCXIK7j_jFGMw0gPRN8GSvcVhigi0IAd9k', array('jquery'));

}

add_action('wp_enqueue_scripts', 'global_scripts');


function remove_head_scripts()
{
    remove_action('wp_head', 'wp_print_scripts');
    remove_action('wp_head', 'wp_print_head_scripts', 9);
    remove_action('wp_head', 'wp_enqueue_scripts', 1);
    remove_action('wp_head', 'wp_print_styles', 99);
    remove_action('wp_head', 'wp_enqueue_style', 99);

    add_action('wp_footer', 'wp_print_scripts', 5);
    add_action('wp_footer', 'wp_enqueue_scripts', 5);
    add_action('wp_footer', 'wp_print_head_scripts', 5);
    add_action('wp_head', 'wp_print_styles', 30);
    add_action('wp_head', 'wp_enqueue_style', 30);
}

add_action('wp_enqueue_scripts', 'remove_head_scripts');


show_admin_bar(false);


add_theme_support('menus');


add_theme_support('post-thumbnails');


if (function_exists('acf_add_options_page')) {
    acf_add_options_page('Theme Settings');
}


add_image_size('full_hd', 1920, 1080);
add_image_size('gallery', 397, 297, true);
add_image_size('floor_plane', 500, 500);


function jag_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'jag_mime_types');


function custom_posts()
{
    $labels = array(
        'name' => 'Unit',
        'singular_name' => 'Unit',
        'add_new' => 'Add Unit',
        'add_new_item' => 'Add Unit',
        'edit_item' => 'Edit Unit',
        'new_item' => 'New Unit',
        'view_item' => 'Preview Unit',
        'search_items' => 'Find Unit',
        'not_found' => 'Nothing Find',
        'not_found_in_trash' => 'No Unit',
        'parent_item_colon' => '',
        'menu_name' => 'Unit'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'taxonomies' => array('category'),
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'Unit'),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-admin-users',
        'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnails', 'thumbnail'),
        //'register_meta_box_cb' => 'add_events_metaboxes'
    );
    register_post_type('Unit', $args);

}

add_action('init', 'custom_posts');

//AJAX SECTION GALLERY

add_action('wp_ajax_nopriv_meta_fetch', 'wpex_metadata_fetch');
add_action('wp_ajax_meta_fetch', 'wpex_metadata_fetch');

function wpex_metadata_fetch()
{
    $page = (int)$_POST['page'];
    $ppp = (int)$_POST['ppp'];
    $page_id = (int)$_POST['page_id'];

    while (has_sub_field("page_builder", $page_id)) {

        if (get_row_layout() == "site_gallery_section") // Размещение: paragraph
        {
            $images = get_sub_field('Images_site_gallery');

            foreach (array_slice($images, $page * $ppp, $ppp) as $image) { ?>
                <div class="col-md-4" style="display:none;">
                    <a class="boxe" href="<?php echo $image['sizes']['full_hd']; ?>">
                        <?php echo "<img src='{$image['sizes']['gallery']}' width='396px' height='296px'/>"; ?>
                    </a>
                </div>
                <?php
            }
        }
    }

    die();

}


function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCXIK7j_jFGMw0gPRN8GSvcVhigi0IAd9k';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCXIK7j_jFGMw0gPRN8GSvcVhigi0IAd9k');
}
add_action('acf/init', 'my_acf_init');