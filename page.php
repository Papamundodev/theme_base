<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>" class="">

        <section class="">

        <h1 class="text-center text-uppercase text-white"><?php the_title(); ?></h1>

        </section>

    </main>

<?php
get_footer();