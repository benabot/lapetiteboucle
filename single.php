<?php get_header(); ?>

<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
?>
		<article>
			<header>
				<h2><?php the_title(); ?></h2>
				<div>
					Publié le : <?php the_date(); ?> |
					<?php
					$categories = get_the_category();
					$catTotal = count($categories);
					if ($catTotal > 1) {
					?>
						Dans les catégories <?php the_category(' &bull; '); ?>
					<?php
					} else {
					?>
						Dans la catégorie <?php the_category(' '); ?>
					<?php
					}


					?>

				</div>

			</header>
			<?php
			the_post_thumbnail('medium');
			the_content();


			?>
		</article>
<?php
	}
}
?>
<?php get_footer(); ?>