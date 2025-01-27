<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
?>

    <main id="main-<?=$theme_template_name?>" class="">

        <section class="section " data-aos="fade-up">
            <div class="" >
                <div class="container d-flex flex-column align-items-center justify-content-center">
                    <h1>404</h1>
                    <p>Page not found</p>
                    <p class="mb-5">The page you are looking for does not exist.</p>
                    <a href="<?=home_url()?>" class="btn btn-primary">Go back to home</a>
                </div>
            </div>
        </section>

    </main>

<?php
get_footer();