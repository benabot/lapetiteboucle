</main>
<aside aria-label="Sidebar" id="sidebar--bas" class="">
    <?php dynamic_sidebar('footerbar-1') ?>
</aside>
<footer>

    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer',
            'container' => 'ul',
            'menu_id' => 'footer__menu',
        )
    );

    ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>