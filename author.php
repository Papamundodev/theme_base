<?php
get_header();
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
global $wp_query;
$author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name', $author_id);
$author_avatar = get_avatar($author_id, 100);
$author_bio = get_the_author_meta('user_description', $author_id);
$author_posts_url = get_author_posts_url($author_id);
$author_gravatar = get_user_meta($author_id, 'social_links', true);

?>

    <main id="main-<?=$theme_template_name?>">

        <section class="section">

            <!-- Page Title -->
            <div class="wrapper">
                <div class="wrapper-side">
                    <div class="author-info">
                        <div class="author-info-avatar"><?=$author_avatar?></div>
                        <h1 class="author-info-name"><?=$author_name?></h1>
                        <div class="author-info-bio"><?=$author_bio?></div>
                    </div>
                </div>
                <?php get_template_part('partials/modules/module-join-us', null, ['author_id' => $author_id]); ?>
            </div>



            <div class="wrapper">
                <h2>Posts by <?=$author_name?></h2>
                <?php if(is_array($wp_query->posts) && count($wp_query->posts) > 0): ?>
                    <div class="">
                        <?php foreach ($wp_query->posts as $post) : setup_postdata($post); ?>
                            <div class="post-preview">
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