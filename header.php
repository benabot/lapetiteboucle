<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <?php
        if (is_user_logged_in()) {
            wp_nav_menu(
                array(
                    'theme_location' =>  'member',
                    'container' => 'ul',
                    'menu_id' => 'member__menu',
                )
            );
        }

        ?>
        <div>
            <?php
            if (is_home()) {
                // This is the blog posts index
            ?>
                <h1><?php bloginfo('name'); ?></h1>
            <?php
            } else {
                // This is not the blog posts index
            ?> <h1> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a></h1><?php
                                                                                            }
                                                                                                ?>

            <h2><?php bloginfo('description'); ?></h2>
        </div>
        <div>
            <?php the_custom_logo(); ?>
        </div>
    </header>
    <?php wp_nav_menu(
        array(
            'menu' => 'primary',
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_id' => 'header__menu--container',
            'container_aria_label' => 'Navigation principale',
            'menu_id' => 'header__menu',
        )
    );

    ?>
    <main>