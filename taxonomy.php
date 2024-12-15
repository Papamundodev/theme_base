<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");

?>



    <main id="main-<?=$theme_template_name?>">

        <section class="section-container">
            <?php get_template_part('partials/cards/loop-card', null, ['posts' => $posts]); ?>
        </section>
    </main>

<?php
get_footer();