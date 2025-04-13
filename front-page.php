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
        <div class="wrapper table-component">
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

        <div class="wrapper table-component">
            <div class="font-system ">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Font</h2>
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

        <div class="wrapper table-component">
            <div class="color-text-system">
                <div class="design-system-header bg-gray-color">
                    <h2 class="">Color</h2>
                </div>
                <div class="grid-table">
                    <p class="">text default-color</p>
                    <p class="default-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">text gray-color</p>
                    <p class="gray-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">text heading-color</p>
                    <p class="heading-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <p class="">text accent-color</p>
                    <p class="accent-color fs-lg">Lorem ipsum dolor.</p>
                </div>
            </div>
        </div>

        <div class="wrapper flex-col-3 color-text-system ">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Background Color</h2>
            </div>
            <div class="flex-auto">
                <div>
                    <div class="bg-accent-color-2">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-3">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-4">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-5">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-2">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-3">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-4">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-5">
                        <p class="default-color">Lorem ipsum dolor.</p>
                        <p class="gray-color">Lorem ipsum dolor.</p>
                        <p class="heading-color">Lorem ipsum dolor.</p>
                        <p class="accent-color">Lorem ipsum dolor.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper  border-radius-system">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Border Radius</h2>
            </div>
            <div class=" flex-auto">
                <div class="flex-item">
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div class="flex-item">
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div class="flex-item">
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div class="flex-item">
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div class="flex-item">
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color">
                        <div class="card-border-radius"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>


<?php
get_footer();