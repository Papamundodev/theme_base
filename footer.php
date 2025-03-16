

<footer>
    <div class="wrapper">
        <?php get_template_part('partials/header/navbar-desktop', "navbar", ['theme_location' => 'footer']); ?>
    </div>
    <div class="wrapper">
        <span>© <?=date('Y')?> <?=get_bloginfo('name')?>, Inc.</span>
    </div>
</footer>

</div>

<?php if (is_single()) : ?>
<aside class="right">
    <div class="wrapper-side-right">
        <?php get_template_part('partials/article/aside/aside-categories-related'); ?>
    </div>
</aside>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>