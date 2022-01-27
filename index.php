<?php get_header(); ?>

<section class="section section__page">
    <div class="section__container">

    <!-- <h1 class="titre-1"> -->
        <!--  -->
    <!-- </h1> -->

<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <article>
            <h1 class="titre-3 sous-titre-cat icon__carre icon__carre--brb"><?php the_title(); ?></h1>
        
            <?php
            the_post_thumbnail('medium');
            the_content();
            ?>
            	<?php if( is_page( 'stock-de-cartouches' ) ) { 
                
                    ?>
                    <div><?php printf( __( 'Dernière mise à jour : %s', 'textdomain' ), get_the_modified_date( 'j F Y' ) ); ?></div>
<?php
                } ?>

        </article>

<?php
    }
}
?>
    </div>
</section>
<?php get_footer(); ?>