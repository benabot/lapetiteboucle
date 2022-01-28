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
    <div class="hidden" hidden>
        <?php get_template_part('template-parts/icons/icons.svg'); ?>
    </div>
    <header class="header">
        <div class="logo">

            <?php the_custom_logo(); ?>

        </div>
        <label for="hamburger">&#9776;</label>
        <input type="checkbox" id="hamburger" />
        <?php wp_nav_menu(
            array(
                'menu' => 'primary',
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_id' => 'nav--container',
                'container_aria_label' => 'Navigation principale',
                'menu_id' => 'nav--list',
            )
        );

        ?>
    </header>
    <main class="main--page">