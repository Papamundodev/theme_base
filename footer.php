<footer>
    <div class="wrapper">
        <?php get_template_part('partials/header/navbar', "navbar", "footer" ); ?>
    </div>
    <div class="wrapper">
        <span>© <?=date('Y')?> <?=get_bloginfo('name')?>, Inc.</span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>