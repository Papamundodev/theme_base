<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
global $wp_query;
$posts = $wp_query->get_posts();
?>

    <main id="main-<?=$theme_template_name?>" class="">

        <section class="section-container">
            <div class="container-posts">
                <?php get_template_part('partials/article/loop-post', null, ['posts' => $posts]); ?>
            </div>
        </section>

    </main>

<?php
get_footer();