

<footer>
    <div class="wrapper">
        <?php get_template_part('partials/header/navbar-desktop', "navbar", ['theme_location' => 'footer']); ?>
    </div>
    <div class="wrapper">
        <span>© <?=date('Y')?> <?=get_bloginfo('name')?>, Inc.</span>
    </div>
</footer>

<!-- closing div for wrapper center content -->
</div>

<?php if (is_single()) : ?>
<aside class="right" >
    <div class="wrapper-all-modules">
        <div id="module-breadcrumbs" class="wrapper-module">
            <?php
            $object = get_queried_object();
            $breadcrumbs = \Theme_base\Base::get_breadcrumbs($object);
            ?>
            <div class="wrapper-popover-header">
                <p>Breadcrumbs</p>
                <button popovertarget="module-breadcrumbs" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
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
        <div id="module-categories-related" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Categories</p>
                <button popovertarget="module-categories-related" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-related-categories'); ?>
        </div>
        <div id="module-socials" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Socials</p>
                <button popovertarget="module-socials" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-socials'); ?>
        </div>
        <div id="module-topics" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Topics</p>
                <button popovertarget="module-topics" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-topics'); ?>
        </div>
    </div>
</aside>


<?php endif; ?>

<!-- closing div for wrapper layout -->
</div>


<?php wp_footer(); ?>
</body>
</html>