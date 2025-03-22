

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
        <?php if(is_single()): ?>
        <div id="module-join-us" class="wrapper-module">
            <div class="wrapper-popover-header">
                <p>Join us</p>
                <button popovertarget="module-join-us" popovertargetaction="hide" class="button-mobile-close-module btn">
                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                    </svg>
                </button>
            </div>
            <?php get_template_part('partials/modules/module-join-us'); ?>
        </div>
        <?php endif; ?>
    </div>
</aside>


<!-- closing div for wrapper layout -->
</div>


  <a href="#" id="scroll-top" class="scroll-top">
    <svg width="800px" height="800px" viewBox="0 0 32 32" version="1.1">
    <g id="Page-1" stroke="none" stroke-width="1" fill-rule="evenodd">
        <g id="Icon-Set-Filled" transform="translate(-362.000000, -1089.000000)" fill="#000000">
            <path d="M384.535,1105.54 C384.145,1105.93 383.512,1105.93 383.121,1105.54 L379,1101.41 L379,1112 C379,1112.55 378.553,1113 378,1113 C377.447,1113 377,1112.55 377,1112 L377,1101.41 L372.879,1105.54 C372.488,1105.93 371.854,1105.93 371.465,1105.54 C371.074,1105.14 371.074,1104.51 371.465,1104.12 L377.121,1098.46 C377.361,1098.22 377.689,1098.15 378,1098.21 C378.311,1098.15 378.639,1098.22 378.879,1098.46 L384.535,1104.12 C384.926,1104.51 384.926,1105.14 384.535,1105.54 L384.535,1105.54 Z M378,1089 C369.163,1089 362,1096.16 362,1105 C362,1113.84 369.163,1121 378,1121 C386.837,1121 394,1113.84 394,1105 C394,1096.16 386.837,1089 378,1089 L378,1089 Z" id="arrow-up-circle" >
            </path>
        </g>
    </g>
    </svg>
  </a>
<?php wp_footer(); ?>
</body>
</html>