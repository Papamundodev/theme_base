<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$featured_image = get_the_post_thumbnail_url($object->ID);
$content = wpautop($object->post_content);
$title = $object->post_title;
?>


<main id="main-<?=$theme_template_name?>" class="main">

            <!-- Page Title -->
    <section label="front-page-intro"  class="section front-page-intro">
            <div class="wrapper intro">
                <div class="main-title">
                    <h1><span>Websites &</span><span>SEO services</span></h1>
                </div>
                <div class="intro-text">
                    <p>We build a custom theme <span class=" svg-icon svg-wordpress"></span> for your business</p>
                    <p>Rank higher on <span class=" svg-icon svg-google"></span> with our SEM solution</p>
                    <p>all it needs is your <span class=" svg-icon svg-idea"></span> and your content</p>
                </div>
            </div>
    </section>

    <section label="front-page-services" class="section services">
        <div class="wrapper">
            <div class="title-big">
                <h2>What is Santidev ?</h2>
            </div>
        </div>
        <div class="wrapper">
            <div class="sticky-container">
                <div class="sticky-content">
                    <div class="sticky-item">
                        <div class="sticky-item-content">
                            <div class="main-title">
                                <span class="">01</span>
                            </div>
                            <h3>1 - ur services</h3>
                            <p>We build a custom theme <span class=" svg-icon svg-wordpress"></span> for your business</p>
                            <p>Rank higher on <span class=" svg-icon svg-google"></span> with our SEM solution</p>
                            <p>all it needs is your <span class=" svg-icon svg-idea"></span> and your content</p>
                        </div>
                        <div class="sticky-item-image"  >
                            <img src="<?=get_template_directory_uri();?>/assets/images/process-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="sticky-item">
                        <div class="sticky-item-content">
                            <div class="main-title">
                                <span class="">02</span>
                            </div>
                            <h3>2 - ur services</h3>
                            <p>We build a custom theme <span class=" svg-icon svg-wordpress"></span> for your business</p>
                            <p>Rank higher on <span class=" svg-icon svg-google"></span> with our SEM solution</p>
                            <p>all it needs is your <span class=" svg-icon svg-idea"></span> and your content</p>
                        </div>
                        <div class="sticky-item-image"  >
                            <img src="<?=get_template_directory_uri();?>/assets/images/process-2.jpg" alt="">
                        </div>
                    </div>
                    <div class="sticky-item">
                        <div class="sticky-item-content">
                            <div class="main-title">
                                <span class="">03</span>
                            </div>
                            <h3>3 - ur services</h3>
                            <p>We build a custom theme <span class=" svg-icon svg-wordpress"></span> for your business</p>
                            <p>Rank higher on <span class=" svg-icon svg-google"></span> with our SEM solution</p>
                            <p>all it needs is your <span class=" svg-icon svg-idea"></span> and your content</p>
                        </div>
                        <div class="sticky-item-image"  >
                            <img src="<?=get_template_directory_uri();?>/assets/images/process-1.jpg" alt="">
                        </div>
                    </div>
                    <div class="sticky-item">
                        <div class="sticky-item-content">
                            <div class="main-title">
                                <span class="">04</span>
                            </div>
                            <h3>4 - ur services</h3>
                            <p>We build a custom theme <span class=" svg-icon svg-wordpress"></span> for your business</p>
                            <p>Rank higher on <span class=" svg-icon svg-google"></span> with our SEM solution</p>
                            <p>all it needs is your <span class=" svg-icon svg-idea"></span> and your content</p>
                        </div>
                        <div class="sticky-item-image"  >
                            <img src="<?=get_template_directory_uri();?>/assets/images/process-2.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section label="front-page-posts" class="section services" >
        <div class="wrapper">
            <div class="title-big">
                <h2>What is Santidev ?</h2>
            </div>
        </div>
        <?php
        $posts = get_posts(array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        ?>
        <div class="wrapper">
            <div class="layout-tree">
                <?php $i = 1; foreach($posts as $post) : ?>
                    <div class="card" style="border-left-color: var(--accent-color-<?=$i;?>);">
                        <?php get_template_part('partials/article/post-preview', null, array('post' => $post, 'color' => $i)); ?>
                    </div>
                    <?php if($i == 5) $i = 0; ?>
                <?php $i++; endforeach; ?>
            </div>
        </div>
    </section>




    <div class="wrapper">
        <?php get_template_part('partials/modules/module-command-mobile'); ?>
    </div>

    <?php if($content) : ?>
        <section label="front-page-content" class="section">
            <div class="wrapper content">
                <?=$content;?>
            </div>
        </section>
    <?php endif; ?>



    <!-- Exemple d'intégration Instagram -->
    <section label="front-page-instagram-feed" class="section instagram-feed">
        <div class="wrapper">

            
        </div>
    </section>

</main>


<?php
get_footer();