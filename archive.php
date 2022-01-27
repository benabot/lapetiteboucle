<?php get_header(); ?>

<section class="section home-actu">
    <div class="section__container">
    <?php
if (is_category()) {
?>
    <!-- <h1 class="titre-1"> -->
        <!--  -->
    <!-- </h1> -->
    <h1 class="titre-1 titre-cat">Nos <span class="titre-cat__vert-bg"><?php single_cat_title(""); ?></span></h1>
    <h3 class="titre-2 sous-titre-cat icon__carre icon__carre--brb"> <?php echo category_description(); ?></h3>
<?php
}
?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <article>
            <h2 class="titre-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="actu-infos">
                Publié le <?php the_time(get_option('date_format')); ?>
            </div>
            <?php
            the_post_thumbnail('medium');
            the_excerpt();
            ?>
        </article>
<?php
    }
}
?>
    </div>
</section>
<?php get_footer(); ?>