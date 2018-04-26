<!doctype html>
<html lang="ru-en" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

    <!--[if lte IE 9 ]>
    <script>
        alert('Browser version is too old and site will not be displayed correctly. Please, upgrade your browser.');
    </script>
    <![endif]-->

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">


    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php //$image2 = get_field('header_background_hero', 'option');?>
<?php //var_dump($image2);?>
<header>
    <div class="wrapper-nav">
        <nav class="navbar">

            <div class="navigation-menu" id="navbarNav">
                <?php wp_nav_menu(array(
                    'menu' => 'Main menu',
                    'menu_class' => 'navbar-nav',
                    'container' => false
                )); ?>

                <div class="reserved-right reserve-modal">
                    <?php the_field('reserve_button', 'option')?>
                </div>

                <button type="button" class="navbar-toggle" data-target="#navbar">
                    <div class="animate-burger">
                        <span class="top"></span>
                        <span class="middle"></span>
                        <span class="bottom"></span>
                    </div>
                </button>
            </div>

        </nav>
    </div>

    <div class="wrapper_reserve_section">
        <div class="reserve_logo">
            <?php $image = get_field('header_logo','option'); ?>
            <img class="logo" src="<?php echo $image['url']; ?>" alt="">
        </div>
    </div>

</header>

