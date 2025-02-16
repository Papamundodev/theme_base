<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$content = wpautop($object->description);
?>

    <main id="main-<?=$theme_template_name?>">

    <section id="category-<?=$object->slug?>" class="category section">

        <!-- Page Title -->
        <div class="container">
            <div class="page-title">
                <h1><?=$object->name?></h1>
            </div><!-- End Page Title -->
        </div>

        <?php if($content) : ?>
            <div class="container text-center mb-5">
                <?=$content;?>
            </div>
        <?php endif; ?>

        <div class="container">
            <div class="row list-layout">
                <?php if(is_array($posts) && count($posts) > 0): ?>
                    <?php foreach ($posts as $post) : setup_postdata($post); ?>
                        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                <?php endif; ?>

                <?php if(is_array($posts) && count($posts) > 0): ?>
                    <?php get_template_part('pagination'); ?>
                <?php endif; ?>
            </div>

        </div>
    </section>


                <!-- Latest insurances -->
    <section id="insurances-carousel" class="carrousels section light-background ">
        <!-- Section Title -->
        <div class="container">
            <?php get_template_part('partials/carrousel'); ?>
        </div>
    </section><!-- /Latest insurances -->
    </main>

<?php
get_footer();