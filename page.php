<?php get_header(); ?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <h1><?php the_title(); ?></h1>
<?php
        the_post_thumbnail('medium');
        the_content();
    }
}
?>
<?php get_footer(); ?>