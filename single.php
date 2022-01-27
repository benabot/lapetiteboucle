<?php get_header(); ?>

<section class="section home-actu">
    <div class="section__container">

    <!-- <h1 class="titre-1"> -->
        <!--  -->
    <!-- </h1> -->
    <h3 class="titre-1 titre-cat">Nos <span class="titre-cat__vert-bg">actualités</span></h3>

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <article>
            <h1 class="titre-3 sous-titre-cat icon__carre icon__carre--brb"><?php the_title(); ?></h1>
            <div class="actu-infos">
                Publié le <?php the_time(get_option('date_format')); ?>
            </div>
            <?php
            the_post_thumbnail('medium');
            the_content();
            ?>
        </article>
        <div class="site__navigation">
	<div class="site__navigation__prev">
		<?php previous_post_link( '<< %link' ); ?>
    </div>
    <div class="site__navigation__next">
        <?php next_post_link( '%link >>' ); ?> 
    </div>
</div>
<?php
    }
}
?>
    </div>
</section>
<?php get_footer(); ?>