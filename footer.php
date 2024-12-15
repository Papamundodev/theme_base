<footer>
    <?php get_template_part('partials/navbar', 'navbar', ['theme_location' => 'footer']); ?>
    <div class="footer__copyright">
        <span>© <?=date('Y')?> <?=get_bloginfo('name')?>, Inc.</span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>