<?php get_header(); ?>
<?php
if (is_category()) {
?>
    <h1><?php the_category(' '); ?></h1>
<?php
}
?>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <section>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post__meta">
                Publié le <?php the_time(get_option('date_format')); ?>
            </div>
            <?php
            the_post_thumbnail('medium');
            the_excerpt();
            ?>
            <a href="<?php the_permalink(); ?>">lire la suite...</a>
        </section>
<?php
    }
}
?>
<?php get_footer(); ?>