</main>

<footer>
<div class="footer-widget">
<?php dynamic_sidebar('footerbar-1') ?>
</div>
    <?php wp_nav_menu(
        array(
            'theme_location' => 'legal',
            'container' => 'ul',
            'menu_class' => 'footer-legal',
        )
    );

    ?>
</footer>
<?php wp_footer(); ?>
</body>

</html>