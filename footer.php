

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
<aside class="right" id="aside-categories-related">
    <div class="wrapper-side-right">
        <?php get_template_part('partials/article/aside/aside-categories-related'); ?>

            <?php
            $object = get_queried_object();
            $breadcrumbs = \Theme_base\Base::get_breadcrumbs($object);
            ?>
            <div id="breadcrumbs" class="breadcrumbs-custom">
                <ul>
                    <?php foreach ($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb === end($breadcrumbs)): ?>
                            <li><?= $breadcrumb['text'] ?></li>
                        <?php else: ?>
                            <li><a href="<?= $breadcrumb['url'] ?>"><?= $breadcrumb['text'] ?></a></li><span class="separator"></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
    </div>
</aside>
<?php endif; ?>

</div>


<?php wp_footer(); ?>
</body>
</html>