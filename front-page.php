<?php get_header(); ?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <section class="hero">

            <div class="hero__block-titre">
                <h1 class="hero__titre-1"><?php bloginfo('name'); ?></h1>
                <h2 class="hero__titre-2"><?php bloginfo('description'); ?></h2>
                <a href="#intro" class="bouton bouton--blanc">en savoir plus</a>
            </div>
            <div class="hero__block-img">
                <?php
                the_post_thumbnail(array(440, 332));
                ?>

            </div>
        </section>

        <section id="intro" class="section home-intro">
            <div class="section__container">
                <h2 class="titre--mono titre-3 icon__carre icon__carre--brt"><?php the_title(); ?></h2>

                <?php
                the_content();
                ?>

            </div>
        </section>
        <section class="section home-chiffres">
            <div class="section__container">
                <div class="chiffres__para"><svg class="icon--float color-bleu">
                        <use href="#icon-directions_bike" xlink:href="#icon-directions_bike"></use>
                    </svg><span class="chiffres__titre titre--mono titre-2">Nous collectons</span><span class="chiffres__chiffre color-bleu"><?php echo get_post_meta(get_the_ID(), 'kilo', true); ?></span> de cartouches
                    à Amiens et dans la Somme chaque année</div>
                <div class="chiffres__para"><svg class="icon--float color-rouge">
                        <use href="#icon-cached" xlink:href="#icon-cached"></use>
                    </svg><span class="chiffres__titre titre--mono titre-2">Nous recyclons</span><span class="chiffres__chiffre color-rouge"><?php echo get_post_meta(get_the_ID(), 'pourcentage', true); ?></span> des cartouches
                    de marque (les compatibles ne se remanufacturent pas)</div>
                <div class="chiffres__para"><svg class="icon--float color-jaune">
                        <use href="#icon-local_printshop" xlink:href="#icon-local_printshop"></use>
                    </svg><span class="chiffres__titre titre--mono titre-2">Nous fournissons</span><span class="chiffres__chiffre color-jaune"><?php echo get_post_meta(get_the_ID(), 'points', true); ?></span> de collecte de cartouche
                    à Amiens et dans la Somme</div>
                <a href="<?php echo get_site_url(); ?>/contact" class="bouton bouton--blanc">ça m’intéresse</a>
            </div>
        </section>
        <section id="services" class="section home-actions">
            <article class="section__container">
                <h2 class="titre--mono titre-2 icon__carre icon__carre--brb">Nos actions</h2>
                <p>L’objet social de notre association déclarée loi 1901 est « soutien et sensibilisation au développement durable ». C’est dans ce cadre que s’inscrivent nos activités.</p>
                <p>Notre action principale est la collecte des déchets d’impression usagés et/ou neufs périmés en vu de leur re-manufacturation. Nous collectons dès que c’est possible avec des véhicules propres. D’abord nous collectons, ensuite nous trions par marque et références, et enfin nous acheminons vers des partenaires re-manufactureurs en France ou en pays frontaliers. Ces partenariats représentent la grosse majorité des recettes de notre association.</p>
                <p>Nous proposons des animations de sensibilisation, participons à des évènements liés au monde des associations (exemple: salons), et collaborons avec d’autres structures investies dans le développement durable.</p>
                <p>Nos collaborations sont les plus locales possibles, par soucis de cohérence concernant notre emprunte carbone. Ainsi, nous avons le plaisir de collecter aujourd’hui dans plus de 200 structures privées (entreprises) ou publiques (déchetteries, communauté de communes).</p>
            </article>
            <article class="section__container">
                <h3 class="titre--mono titre-3">Déposez vos cartouches</h3>
                <div class="card">
                    <h4 class=" titre-4">Les points de collecte</h4>
                    <p><?php echo get_post_meta(get_the_ID(), 'texte-collecte', true); ?></p>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/la_petite_boucle-carte.png" alt="carte des points de collecte de cartouches à Amiens et dans la Somme" width="640" height="360">
                    <a href="<?php echo get_site_url(); ?>/collectes" class="bouton bouton--blanc">j'y vais !</a>
                </div>
            </article>
            <article class="section__container">
                <h3 class="titre--mono titre-3">Entreprises, collectivités</h3>
                <div class="card card--noir">
                    <h4 class=" titre-4 color-vert">Nous collectons vos consommables</h4>
                    <p><?php echo get_post_meta(get_the_ID(), 'texte-entreprise', true); ?></p>
                    <a href="<?php echo get_site_url(); ?>/contact" class="bouton bouton--vert">en savoir plus</a>
                </div>
            </article>
        </section>
<?php
    }
}
?>
<section class="section home-actu">
    <div class="section__container">
        <h2 class="titre--mono titre-2 icon__carre icon__carre--brb ">Les actualités du tonnerre</h2>
        <?php

        $args = array(
            'post_type' => 'post',
            'category_name' => 'actualites',
            'posts_per_page' => 3,
        );


        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
        ?>
                <article>
                    <h3 class="titre-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <span class="actu-infos">
                        Publié le <?php the_time(get_option('date_format')); ?>
                    </span>
                    <p><?php the_excerpt(); ?></p>
                </article>
        <?php
            endwhile;
        endif;

        wp_reset_postdata();
        ?>
    </div>
</section>

<?php get_footer(); ?>