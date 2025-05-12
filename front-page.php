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
                <div class="design-system-header ">
                    <h2 class="">Logo</h2>
                </div>
                <div class="grid-table">
                <div class="site-logo img-container-logo-sm">
                    <a class="" href="<?=home_url();?>" rel="home" aria-label="Page d'accueil">
                        <img src="<?=get_template_directory_uri();?>/assets/images/logo.jpg" alt="logo du site">
                    </a>
                </div>
                <a class="fs-xxl" href="<?=home_url();?>" rel="home" aria-label="Page d'accueil">
                        <?=get_bloginfo('name');?>
                    </a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline table-component">
            <div class="font-system ">
                <div class="design-system-header ">
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
            <div class="font-family-system ">
                <div class="design-system-header ">
                    <h2 class="">Font Family</h2>
                </div>
                <div class="grid-table">
                    <p class="">Fira Sans</p>
                    <p class="text-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">EB Garamond</p>
                    <p class="primary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">Outfit</p>
                    <p class="secondary-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
                <div class="grid-table">
                    <p class="">Oswald</p>  
                    <p class="heading-font fs-lg">Lorem ipsum DOLOR.</p>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-border-inline table-component font-weight-system">
            <div class="font-family-system ">
                <div class="design-system-header ">
                    <h2 class="">Font Weight</h2>
                </div>
                <div class="grid-table">
                    <p class="">Text font weight</p>
                    <div class="text-font">
                        <p class="weight-100">Weight 100 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-200">Weight 200 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-300">Weight 300 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-400">Weight 400 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-500">Weight 500 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-600">Weight 600 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-700">Weight 700 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-800">Weight 800 - The quick brown fox jumps over the lazy dog</p>
                        <p class="weight-900">Weight 900 - The quick brown fox jumps over the lazy dog</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline table-component color-text-system">
                <div class="design-system-header ">
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
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="link-color">link-color</p>
                            <div class="text-color link-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="link-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="link-hover-color">link-hover-color</p>
                            <div class="text-color link-hover-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="link-hover-color fs-lg">Lorem ipsum dolor.</p>
                </div>
                <div class="grid-table">
                    <div class="gap-xs element-ratio-calculating">
                        <div class="flex-column-center">
                            <p class="link-active-color">link-active-color</p>
                            <div class="text-color link-active-color">
                                <p class="color-computed"></p>
                            </div>
                        </div>
                    </div>
                    <p class="link-active-color fs-lg">Lorem ipsum dolor.</p>
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

        <div class="wrapper wrapper-border-inline background-color-system ">
            <div class="design-system-header ">
                <h2 class="">Background Color</h2>
            </div>
            <div class="flex-auto">
                <div>
                    <div class="bg-background-color element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">background-color</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p> 
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-background-color-2 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">background-color-2</p>
                            <div class="bg-color-computed"></div>
                        </div>  
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-background-color-3 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">background-color-3</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
                <div>
                    <div class="bg-background-color-4 element-ratio-calculating">
                        <div class="flex-column-center gap-xs">
                            <p class="fs-sm">background-color-4</p>
                            <div class="bg-color-computed"></div>
                        </div>
                        <p class="default-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="gray-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="heading-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="accent-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
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
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
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
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
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
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
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
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
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
                        <p class="link-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-hover-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                        <p class="link-active-color text-color">Lorem ipsum dolor. <span class="ratio"></span></p>
                    </div>
                </div>
            </div>
        </div>

         <div class="wrapper wrapper-border-inline text-system ">
            <div class="design-system-header ">
                <h2 class="">Text</h2>
            </div>
            <div class="flex-auto">
                <div class="bg-surface-color-2">
                    <div class="">
                        <div class="text-content">
                            <h3 class="">La couleur du background est surface-color-2.</h3>
                            <p class="">Max line length: Limit paragraphs to ~60–75 characters (including spaces). In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility” css-tricks.com. Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below).</p>
                            <ul class="bg-surface-color">
                                <li>Max line length: Limit paragraphs to ~60–75 characters (including spaces).</li>
                                <li>In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility” css-tricks.com.</li>
                                <li>Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below).</li>
                            </ul>
                            <div class="button-wrapper">
                                <div class="button-container">
                                    <button class=" button heading-font">Button even larger text</button>
                                </div>
                            </div>
                            <a href="" class="accent-color">Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below)</a>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-color">
                    <div class="">
                        <div class="text-content">
                            <h3 class="">La couleur du background est surface-color.</h3>
                            <p class="">Max line length: Limit paragraphs to ~60–75 characters (including spaces). In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility” css-tricks.com. Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below).</p>
                            <ul class="bg-surface-color-3">
                                <li>On aura le default-color pour le texte.</li>
                                <li>On aura le heading-color pour les titres.</li>
                                <li>On aura l'accent-color pour les boutons.</li>
                            </ul>
                            <div class="button-wrapper">
                                <div class="button-container">
                                    <button class=" button heading-font">Button even larger text</button>
                                </div>
                            </div>
                            <a href="" class="">Link</a>
                        </div>
                    </div>
                </div>
                <div class="bg-surface-color-3">
                    <div class="">
                        <div class="text-content ">
                            <h3 class="">La couleur du background est surface-color-3.</h3>
                            <p class="">Max line length: Limit paragraphs to ~60–75 characters (including spaces). In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility” css-tricks.com. Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below).</p>
                            <ul class="bg-surface-color-2">
                                <li>On aura le default-color pour le texte.</li>
                                <li>On aura le heading-color pour les titres.</li>
                                <li>On aura pas d'accent-color.</li>
                            </ul>
                            <div class="button-wrapper">
                                <div class="button-container">
                                    <button class=" button heading-font">Button even larger text</button>
                                </div>
                            </div>
                            <a href="" class="">Link</a>
                        </div>
                    </div>
                </div>
                <div class="bg-background-color-4">
                    <div class="">
                        <div class="text-content">
                            <h3 class="">La couleur du background est background-color-4.</h3>
                            <p class="">Max line length: Limit paragraphs to ~60–75 characters (including spaces). In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility”
                            <ul class="">
                                <li>On aura le default-color pour le texte.</li>
                                <li>On aura le heading-color pour les titres.</li>
                                <li>On aura l'accent-color pour les boutons.</li>
                            </ul>
                            <div class="button-wrapper">
                                <div class="button-container">
                                    <button class=" button heading-font">Button even larger text</button>
                                </div>
                            </div>
                            <a href="" class="">Link</a>
                        </div>
                    </div>
                </div>
                <div class="bg-background-color-3">
                    <div class="">
                        <div class="text-content">
                            <h3 class="">La couleur du background est background-color-3.</h3>
                            <p class="">Max line length: Limit paragraphs to ~60–75 characters (including spaces). In CSS, this often translates to max-width: 60ch; for the text container. As CSS-Tricks notes, “typographers will recommend that a paragraph have a width of around 75 characters for legibility” css-tricks.com. Too-long lines make the eye work harder; break at natural points (see bullet on vertical rhythm below).</p>
                            <ul class="">
                                <li>On aura le default-color pour le texte.</li>
                                <li>On aura le heading-color pour les titres.</li>
                                <li>pas d'accent color.</li>
                            </ul>
                            <div class="button-wrapper">
                                <div class="button-container">
                                    <button class=" button heading-font">Button even larger text</button>
                                </div>
                            </div>
                            <a href="" class="">Link</a>
                        </div>
                    </div>
                </div>

                <div class="bg-accent-color">
                    <div class="">
                        <div class="bg-accent-color-3">
                            <div class="">
                                <p class="default-color">Cet color n'a pas de bon contrast donc on ne peut pas l'utiliser pour le texte. seulement pour les decors.</p>
                            </div>
                        </div>
                        <div class="bg-accent-color-4">
                            <div class="">
                                <p class="default-color">Cet color n'a pas de bon contrast donc on ne peut pas l'utiliser pour le texte. seulement pour les decors.</p>
                            </div>
                        </div>
                        <div class="bg-surface-color-4">
                            <div class="">
                                <p class="default-color">Cet color n'a pas de bon contrast donc on ne peut pas l'utiliser pour le texte. seulement pour les decors.</p>
                            </div>
                        </div>
                        <div class="bg-surface-color-5">
                            <div class="">
                                <p class="default-color">Cet color n'a pas de bon contrast donc on ne peut pas l'utiliser pour le texte. seulement pour les decors.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline border-radius-system">
            <div class="design-system-header ">
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




        <div class="wrapper wrapper-border-inline img-sizes-system">
            <div class="design-system-header ">
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


        <div class="wrapper wrapper-border-inline button-system ">
            <div class="design-system-header ">
                <h2 class="">Buttons</h2>
            </div>
            <div class="flex-auto">
                <div class="button-wrapper">
                    <div class="button-container">
                        <button class="button text-font">Button</button>
                    </div>
                </div>
                <div class="button-wrapper">
                    <div class="button-container">
                        <button class=" button primary-font">Button medium</button>
                    </div>
                </div>
                <div class="button-wrapper">
                    <div class="button-container">
                        <button class=" button secondary-font">Button large text</button>
                    </div>
                </div>
                <div class="button-wrapper">
                    <div class="button-container">
                        <button class=" button heading-font">Button even larger text</button>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="wrapper wrapper-border-inline dropdown-system">
            <div class="design-system-header ">
                <h2 class="">Dropdowns</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <h2 class="title-2">Mobile and accordion</h2>
                    <div class="bg-background-color">
                        <div class="" aria-label="dropdown-navigation">
                            <details name="dropdown-details" class="dropdown-details dropdown">
                                <summary class="default-color">
                                    <div class="svg-container">
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><path d='M353.8 853.1H147V646.2L.7 500 147 353.8V147h206.8L500 .7 646.2 147h206.9v206.8L999.3 500 853.1 646.2v206.9H646.2L500 999.3 353.8 853.1z' fill='currentColor'></path></svg>
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
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><path d='M353.8 853.1H147V646.2L.7 500 147 353.8V147h206.8L500 .7 646.2 147h206.9v206.8L999.3 500 853.1 646.2v206.9H646.2L500 999.3 353.8 853.1z' fill='currentColor'></path></svg>
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
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><path d='M353.8 853.1H147V646.2L.7 500 147 353.8V147h206.8L500 .7 646.2 147h206.9v206.8L999.3 500 853.1 646.2v206.9H646.2L500 999.3 353.8 853.1z' fill='currentColor'></path></svg>
                                    </div>
                                    <p class="dropdown-title">To do</p>
                                </summary>
                                <ul class="dropdown-menu">
                                    <li><a class=" " href="">arranger l'animation after hover on the dropdown-link.</a></li>
                                    <li><a class=" " href="">fix .ative header.</a></li>
                                    <li><a class=" " href="">remove underline for nav , replace by gradient .</a></li>
                                </ul>
                            </details>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="bg-background-color w-1">
                        <h2 class="title-2">Hover desktop</h2>
                        <nav aria-label="navigation" tabindex="0" class="dropdown-hover dropdown">
                            <div class="dropdown-link">
                                <div class="svg-container">
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><path d='M353.8 853.1H147V646.2L.7 500 147 353.8V147h206.8L500 .7 646.2 147h206.9v206.8L999.3 500 853.1 646.2v206.9H646.2L500 999.3 353.8 853.1z' fill='currentColor'></path></svg>
                                </div>
                                <p class="dropdown-title" class="">this is a nice dropdown hover.</p> 
                            </div>
                            <ul class="dropdown-menu">
                                <li><p>that allows the header/summary to be clickable.</p></li>
                                <li><p>the content of the header is limited to 1 line and therefor the width of the dropdown is limited to the width of the container.
                                    You can always add a scroll if its really needed.
                                </p></li>
                                <li><p>ist supported in all platform</p></li>
                                <li><a href="">you have to be carefull of the content under it and the superposition.</a></li>
                                 <li><a href="">links on 2 lignes look weirds, reduce the offset.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div>
                    <div class="bg-background-color w-1">
                        <h2 class="title-2">Popover</h2>
                        <nav class="dropdown-popover dropdown w-1">
                            <div class="dropdown-link">
                                <div class="svg-container">
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1000 1000'><path d='M353.8 853.1H147V646.2L.7 500 147 353.8V147h206.8L500 .7 646.2 147h206.9v206.8L999.3 500 853.1 646.2v206.9H646.2L500 999.3 353.8 853.1z' fill='currentColor'></path></svg>
                                </div>
                                <button popovertarget="dropdown-popover" class="dropdown-title btn">This is a nice dropdown popover.</a>
                            </div>
                            <div class="" popover id="dropdown-popover" >
                                <ul class="dropdown-menu">
                                <button popovertarget="dropdown-popover" popovertargetaction="hide" class="button-mobile-close-module btn-links">
                                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.8,16l5.5-5.5c0.8-0.8,0.8-2,0-2.8l0,0C24,7.3,23.5,7,23,7c-0.5,0-1,0.2-1.4,0.6L16,13.2l-5.5-5.5  c-0.8-0.8-2.1-0.8-2.8,0C7.3,8,7,8.5,7,9.1s0.2,1,0.6,1.4l5.5,5.5l-5.5,5.5C7.3,21.9,7,22.4,7,23c0,0.5,0.2,1,0.6,1.4  C8,24.8,8.5,25,9,25c0.5,0,1-0.2,1.4-0.6l5.5-5.5l5.5,5.5c0.8,0.8,2.1,0.8,2.8,0c0.8-0.8,0.8-2.1,0-2.8L18.8,16z"/>
                                    </svg>
                                </button>
                                    <li class="">
                                        <a href="" title="" target="_blank" rel="noopener" class="" >Lorem ipsum dolor sit amet.</a>
                                    </li>
                                    <li><p>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p></li>
                                    <li><p>Lorem ipsum dolor sit amet.</p></li>
                                    <li><p>Lorem ipsum dolor sit amet.</p></li>
                                    <li><p>Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.</p></li>
                                    <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                    <li><a href="">Lorem ipsum dolor sit amet.</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline nav-system ">
            <div class="design-system-header ">
                <h2 class="">Nav</h2>
            </div>
            <header class="bg-background-color">
                <div class="wrapper-logo flex-start gap-xl">
                    <?php get_template_part('partials/header/logo'); ?>
                </div>

                <div class="wrapper-navbar">
                    <?php get_template_part('partials/header/navbar-desktop', null, ['theme_location' => 'header']); ?>
                </div>

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

        <div class="wrapper wrapper-border-inline dropdown-system">
            <div class="design-system-header ">
                <h2 class="">Texts</h2>
            </div>
            <div class=" flex-auto">
                <div class="">
                    <h2 class="title-2">Mobile and accordion</h2>
                    <div class="bg-background-color">
                        <ul>
                            <li><p>1. Font Size and Line Height

                            Font size: 16px–18px is ideal for body text.

                            Line height: 1.5–1.8× the font size (e.g., 24px line height for 16px font) improves readability.</p></li>  
                            <li><p>2. Line Length

                            Ideal: 50–75 characters per line.

                            Too long = tiring to read; too short = choppy and awkward.</p></li>  
                            <li><p>3. Spacing

                            Paragraph spacing: Use clear vertical spacing (e.g., margin-bottom: 1em) to separate thoughts.

                            Avoid cramming multiple paragraphs together.</p></li>  
                            <li><p>4. Contrast

                            Text should be high-contrast (e.g., dark text on light background or vice versa).

                            Avoid low-contrast gray-on-white, which strains the eyes.</p></li>  
                            <li><p>5. Alignment

                            Use left-aligned text (for left-to-right languages); justified text can cause uneven gaps.</p></li>  
                            <li><p>6. Avoid Walls of Text

                            Break up long paragraphs into shorter chunks (3–4 lines max).

                            Use headings, bullet points, or bold key phrases to help scanning.</p></li>  
                            <li><p>7. Readable Font

                            Use a font that is easy to read, such as Arial, sans-serif, or Georgia, serif.</p></li>  
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-border-inline ">
            <div class="design-system-header ">
                <h2 class="">3D</h2>
            </div>
            <div class="design-system-3d">
                <div class="scene">
                    <div class="title">
                        <h1>Hello</h1>
                    </div>
                    <div class="panel">
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

</main>


<?php
get_footer();