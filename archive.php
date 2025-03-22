<?php
get_header();
global $wp_query;
$posts = $wp_query->posts;
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$content = wpautop($object->description) ?? "";
?>

    <main id="main-<?=$theme_template_name?>">

    <section id="archive-<?=$object->slug?>" class="archive section">

        <?php get_template_part('partials/taxo'); ?>

    </section>
    </main>

<?php
get_footer();