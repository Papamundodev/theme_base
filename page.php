<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>">

        <section class="">


        </section>

    </main>

<?php
get_footer();