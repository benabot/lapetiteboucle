<?php get_header(); ?>
<section class="section ">
    <div class="section__container">
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
		<article>
			<header>
			
				<h2 class="titre-1 titre-cat">Les <span class="titre-cat__vert-bg">points de collecte</span></h2>
			
			
				<h1 class="titre-2 sous-titre-cat icon__carre icon__carre--brb"><?php the_title(); ?></h1>
				<a href="https://www.openstreetmap.org/#map=<?php echo get_post_meta(get_the_ID(), 'coord GPS', true); ?>" target="_blank">
				<div class="post-collecte__add icon-text-aligner">
<svg class="icon icon--lg color-vert"><use class="color-vert" href="#icon-place" xlink:href="#icon-place"></use></svg>
            <?php echo get_post_meta(get_the_ID(), 'adresse', true); ?>
            </div></a>

			</header>

			<?php the_content(); ?>
						<div class="img__box"><?php the_post_thumbnail('medium'); ?></div>
						<a class="bouton bouton--blanc" href="https://www.openstreetmap.org/#map=<?php echo get_post_meta(get_the_ID(), 'coord GPS', true); ?>" target="_blank">j'y vais !</a>

		</article>
<?php
	}
}
?>
<div class="site__navigation">
<div class="site__navigation__next">
        <?php next_post_link( '<< %link' ); ?> 
    </div>
	<div class="site__navigation__prev">
		<?php previous_post_link( '%link >> ' ); ?>
    </div>
 
</div>
	</div>
</section>
<?php get_footer(); ?>