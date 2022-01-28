<?php get_header(); ?>
<section class="section ">
    <div class="section__container">
    <h1 class="titre-1 titre-cat">Les <span class="titre-cat__vert-bg"><?php post_type_archive_title(); ?></span></h1>
    <h3 class="titre-2 sous-titre-cat icon__carre icon__carre--brb">Déposez vos cartouches en déchetterie à Amiens et dans la Somme</h3>
<p class="collecte__intro">Pour un apport volontaire des points de collecte de cartouche sont à votre disposition à Amiens et dans la Somme. N’hésitez pas à les utiliser. La plupart sont situés dans des déchetteries.</p>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <article class="post-collecte">
            <h2 class="post-collecte__titre"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-collecte__add icon-text-aligner">
<svg class="icon icon--sm color-vert"><use class="color-vert" href="#icon-place" xlink:href="#icon-place"></use></svg>
            <?php echo get_post_meta(get_the_ID(), 'adresse', true); ?>
            </div>
            <?php
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