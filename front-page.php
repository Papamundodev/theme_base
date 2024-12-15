<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$posts = get_posts(array(
    'post_type' => 'card',
    'posts_per_page' => -1,
));
?>


    <main id="main-<?=$theme_template_name?>">

        <section class="section-container">
            <?php get_template_part('partials/cards/loop-card', null, ['posts' => $posts]); ?>
        </section>
    </main>

<?php
get_footer();