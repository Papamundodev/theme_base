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
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="default-color">default-color</p>
                            <div class="text-color default-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="default-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="gray-color">gray-color</p>
                            <div class="text-color gray-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="gray-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="heading-color">heading-color</p>
                            <div class="text-color heading-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="heading-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="accent-color">accent-color</p>
                            <div class="text-color accent-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="accent-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="bg-background-color element-ratio-calculating grid-table">
                    <div class="flex-column-center">
                        <p class="">Background Color</p>
                        <div class="bg-color-computed"></div>
                    </div>
                    <div class="gap-lg flex-center fs-sm">
                        <p class=" default-color text-color"><span class="ratio"></span></p>
                        <p class=" gray-color text-color"><span class="ratio"></span></p>
                        <p class=" heading-color text-color"><span class="ratio"></span></p>
                        <p class=" accent-color text-color"><span class="ratio"></span></p>
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
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">accent-color-2</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-3 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">accent-color-3</p>
                            <div class="bg-color-computed"></div>
                        </div>  
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-4 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">accent-color-4</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-accent-color-5 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">accent-color-5</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">surface-color</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-2 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">surface-color-2</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-3 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">surface-color-3</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-4 element-ratio-calculating">
                       <div class="flex-column-center gap-xs">
                            <p class="fs-sm">surface-color-4</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-surface-color-5 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">surface-color-5</p>
                            <div class="bg-color-computed"></div>
                        </div>
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
                <div class="">
                    <div class="">
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

    
        <div class="wrapper wrapper-border-inline flex-col-2">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Dropdowns</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <div class="bg-background-color">
                        <div class="" aria-label="dropdown-navigation">
                            <details name="dropdown-details" class="dropdown-details dropdown">
                                <summary class="default-color">
                                    <div class="svg-container">
                                        <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                            <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                            <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                                        </svg>  
                                    </div>
                                    <p class="dropdown-title">This element is a details</p>
                                </summary>
                                <ul class="dropdown-menu">
                                    <li><p class=" " href="">its nice.</p></li>
                                    <li><p class=" " href="">its accessible.</p></li>
                                    <li><p class=" " href="">Still not supported in all browser and mobile.</p></li>
                                </ul>
                            </details>
                            <details name="dropdown-details" class="dropdown-details dropdown">
                                <summary class="default-color">
                                    <div class="svg-container">
                                        <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                            <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                            <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                                        </svg>  
                                    </div>
                                    <p class="dropdown-title">They are link to each other through the name attribute.</p>
                                </summary>
                                <ul class="dropdown-menu">
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><p>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p></li>
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                </ul>
                            </details>
                            <details name="dropdown-details" class="dropdown-details dropdown">
                                <summary class="default-color">
                                    <div class="svg-container">
                                        <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                            <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                            <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                                        </svg>  
                                    </div>
                                    <p class="dropdown-title">How many HTML elements are there?</p>
                                </summary>
                                <ul class="dropdown-menu">
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a class=" " href="">Lorem ipsum dolor sit amet.</a></li>
                                </ul>
                            </details>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-background-color">
                        <nav aria-label="navigation" tabindex="0" class="dropdown-hover dropdown-toggle dropdown dropdown-hover-default dropdown">
                            <div class="dropdown-link ">
                                <div class="svg-container">
                                    <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                        <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                        <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                                    </svg> 
                                </div>
                                <a class="dropdown-title" role="button" class="">this is a nice dropdown hover.</a> 
                            </div>
                            <ul class="dropdown-menu">
                                <li><p>that allows the header/summary to be clickable.</p></li>
                                <li><p>the content of the header is limited to 1 line and therefor the width of the dropdown is limited to the width of the container.
                                    You can always add a scroll if its really needed.
                                </p></li>
                                <li><p>ist supported in all platform</p></li>
                                <li><p>you have to be carefull of the content under it and the superposition.</p></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline nav-system ">
            <div class="design-system-header bg-gray-color">
                <h2 class="">Nav</h2>
            </div>
            <header class="bg-background-color">
        <!-- Logo -->
                <div class="wrapper-logo flex-start gap-xl">
                    <?php get_template_part('partials/header/logo'); ?>
                </div>

                <?php
                $theme_location = "header";
                 $menu_items = \Theme_base\Base::wp_get_menu_array($theme_location);
                 ?>
                <?php if(is_array($menu_items) && count($menu_items) > 0): ?>
                <nav aria-label="navigation" class="dropdown-hover dropdown dropdown-<?=$theme_location === 'footer' ? "footer" : "header" ?>">
                    <div class="dropdown-link dropdown-button">
                        <div class="svg-container">
                            <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                            </svg> 
                        </div>
                        <a role="button" class="dropdown-title nav-link">Menu Mobile</a>
                    </div>
                    <ul class="dropdown-menu">
                        <li>
                            <details name="dropdown-details" class="dropdown-details dropdown">
                                <summary class="default-color">
                                    <div class="svg-container">
                            <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                            </svg>  
                        </div>
                        <p class="dropdown-title">Le menu burger (dev)</p>
                    </summary>
                    <ul class="">
                        <li><p class=" " href="">i need to add the Menu burger</p></li>
                        <li><p class=" " href="">Also animation.</p></li>
                        <li><p class=" " href="">its supported everywhere.</p></li>
                        <li><p class=" " href="">let's seperate it in a mixin.</p></li>
                    </ul>
                    </details>
                    </li>
                    <?php foreach($menu_items as $item): ?>
                    <?php if(empty($item['children'])):?>
                            <li class="<?= \Theme_base\Base::get_active_class($item) ?>">
                        <a class="nav-link" 
                        href="<?=$item['url']?>"
                        target="<?=$item['target']?>"
                        rel="<?= $item['target'] === '_blank' ? 'noopener' : '' ?>"
                        ><?=$item['title']?></a>
                        </li>
                    <?php else: ?>
                <details class="dropdown-details dropdown">
                    <summary class="default-color">
                        <div class="svg-container">
                            <svg class="plus-icon-svg" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg">
                                <path id="path-1" d="M32 128C32 123.582 35.5817 120 40 120L216 120C220.418 120 224 123.582 224 128V128C224 132.418 220.418 136 216 136H128H40C35.5817 136 32 132.418 32 128V128Z" />
                                <path id="path-2" d="M128 224C123.582 224 120 220.418 120 216V40C120 35.5817 123.582 32 128 32V32C132.418 32 136 35.5817 136 40V128V216C136 220.418 132.418 224 128 224V224Z" />
                            </svg> 
                        </div>
                        <a class="dropdown-title"><?=$item['title']?></a>
                    </summary>
                    <ul class="">
                        <?php foreach($item['children'] as $child): ?>
                        <?php if(empty($child['children'])):?>
                            <li class="<?= \Theme_base\Base::get_active_class($child) ?>">
                        <a class="nav-link" 
                        href="<?=$child['url']?>"
                        target="<?=$child['target']?>"
                        rel="<?= $child['target'] === '_blank' ? 'noopener' : '' ?>"
                        ><?=$child['title']?></a>
                        </li>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    </ul>
                </details>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                </nav>
                <?php endif; ?>

                <div class="wrapper-header-right-content flex-end gap-md">
                    <?php if (function_exists('aas_open_search_form')): ?>
                        <div class="wrapper-open-search">
                            <?=do_shortcode('[aas_open_search]'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (function_exists('theme_light_dark_form')): ?>
                        <div class="wrapper-theme-light-dark">
                            <?=do_shortcode('[theme_light_dark]'); ?>
                        </div>
                    <?php endif; ?>
                </div>      
    
            </header>
        </div>


    </div>
</section>

</main>


<?php
get_footer();