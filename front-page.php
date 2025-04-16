<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop($object->post_content);
?>


<main id="main-<?=$theme_template_name?>" class="main">


<section class="design-system">
    <div class="container">
        <h1 class="page-title">Design System</h1>
        <div class="wrapper wrapper-border-inline table-component">
            <div class="logo-system">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Logo</h2>
                </div>
                <div class="grid-table">
                <div class="site-logo img-container-logo-sm">
                    <a class="" href="<?=home_url();?>" rel="home" aria-label="Page d'accueil">
                        <img src="<?=get_template_directory_uri();?>/assets/images/logo.jpg" alt="logo du site">
                    </a>
                </div>
                <a class="" href="<?=home_url();?>" rel="home" aria-label="Page d'accueil">
                        <span class="fs-xxl"><?=get_bloginfo('name');?></span>
                    </a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline table-component">
            <div class="font-system ">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Font</h2>
                </div>
                <div class="grid-table">
                    <p class="">fs-xs</p>
                    <p class="fs-xs">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">fs-sm</p>
                    <p class="fs-sm">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">fs-md</p>
                    <p class="fs-md">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">fs-lg</p>  
                    <p class="fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">fs-xl</p>
                    <p class="fs-xl">Lorem ipsum dolor.</p>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline table-component">
            <div class="color-text-system">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Color</h2>
                </div>
                <div class="grid-table">
                    <p class="">default-color</p>
                    <p class="default-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">gray-color</p>
                    <p class="gray-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">heading-color</p>
                    <p class="heading-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">accent-color</p>
                    <p class="accent-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="bg-background-color element-ratio-calculating grid-table">
                    <div class="flex-column-start">
                        <p class="">Background Color</p>
                        <div class="bg-color-computed"></div>
                    </div>
                    <div class="gap-lg">
                        <p class="fs-sm default-color text-color"><span class="ratio"></span></p>
                        <p class="fs-sm gray-color text-color"><span class="ratio"></span></p>
                        <p class="fs-sm heading-color text-color"><span class="ratio"></span></p>
                        <p class="fs-sm accent-color text-color"><span class="ratio"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline flex-col-3 color-text-system ">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Background Color</h2>
            </div>
            <div class="flex-auto">
                <div>
                    <div class="bg-accent-color-2 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-3 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-4 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-5 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-2 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-3 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-4 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-5 element-ratio-calculating">
                        <div class="bg-color-computed"></div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline border-radius-system">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Border Radius</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline flex-col-2">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Test</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <div class="bg-accent-color-2">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-accent-color-2">
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline table-component">
            <div class="font-family-system ">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Font Family</h2>
                </div>
                <div class="grid-table">
                    <p class="">Fira Sans</p>
                    <p class="primary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">Outfit</p>
                    <p class="secondary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">EB Garamond</p>
                    <p class="tertiary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">Oswald</p>  
                    <p class="quaternary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline img-sizes-system">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Img Sizes</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>


<?php
get_footer();