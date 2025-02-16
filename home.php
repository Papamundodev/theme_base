<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
global $wp_query;
?>
<main id="main-<?=$theme_template_name?>" class="">

    <section class="section">
        <div class="container">
            <div class="page-title">
                <h1><?=$object->post_title?></h1>
            </div>
        </div>

        <div class="container">
            <?php if(is_array($wp_query->posts) && count($wp_query->posts) > 0): ?>
                <div class="row list-layout">
                    <?php foreach ($wp_query->posts as $post) : setup_postdata($post); ?>
                        <div class="col-lg-4 px-0" data-aos="fade-up" data-aos-delay="200">
                            <?php get_template_part('partials/article/post-preview', null, ['post' => $post]); ?>
                        </div>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
                <?php get_template_part('pagination'); ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();