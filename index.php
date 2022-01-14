<?php get_header(); ?>
<div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia, reprehenderit vero! Inventore rem ipsa cum. Nostrum reiciendis ratione asperiores illo exercitationem illum, tempora alias aut dicta ab eaque quod ex!</div>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <section>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <span class="">
                Publié le <?php the_time(get_option('date_format')); ?> |
                par <?php the_author(); ?> | dans <?php the_category(' - ') ?>
            </span>
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