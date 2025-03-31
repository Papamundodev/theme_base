<?php
$template = basename(__FILE__, ".php") ;
$object = get_queried_object();
$content = wpautop($object->description) ?? "";
global $wp_query;
?>

    <div id="<?=$template?>" class="<?=$template?>">

    <section id="taxonomy-<?=$object->slug?>" class="taxonomy section">

            <!-- Page Title -->
        <div class="wrapper">

            <div class="page-title">
                <h1><?=$object->name?></h1>
            </div><!-- End Page Title -->
        </div>

        <?php get_template_part('partials/modules/module-command-mobile'); ?>

        <div class="wrapper">
            <div class="page-description    ">
                <?=$content?>
            </div><!-- End Page Title -->
        </div>

        <div class="wrapper">
            <?php
            $wp_query->set('post_type', 'card');
            $card_query = $wp_query->get_posts(); // Réexécuter la requête avec les nouveaux paramètres
            ?>
            <?php if(is_array($card_query) && count($card_query) > 0): ?>
                <div class="">
                    <?php usort($card_query, function($a, $b) {
                        $ordre_a = get_field('ordre', $a->ID);
                        $ordre_b = get_field('ordre', $b->ID);
                        return $ordre_a - $ordre_b;
                    });
                    ?>
                    <div class="layout-card-preview">
                        <?php $i = 1; foreach ($card_query as $post) : setup_postdata($post); ?>
                            <?php if($post->post_type == 'card'): ?>
                                <?php if($i === 1): ?>
                                    <div class="card-preview card-preview-center">
                                        <?php get_template_part('partials/article/card-preview', null, ['post' => $post]); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; $i++; ?>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                    <div class="layout-card-preview">
                    <?php $i = 1; foreach ($card_query as $post) : setup_postdata($post); ?>
                        <?php if($post->post_type == 'card'): ?>
                            <?php if($i > 1 && $i <= 10): ?>
                                <div class="card-preview">
                                    <?php get_template_part('partials/article/card-preview', null, ['post' => $post]); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; $i++; ?>
                    <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                    <div class="layout-card-preview layout-card-preview-2-cols">
                    <?php $i = 1; foreach ($card_query as $post) : setup_postdata($post); ?>
                        <?php if($post->post_type == 'card'): ?>
                            <?php if($i > 10): ?>
                                <div class="card-preview">
                                    <?php get_template_part('partials/article/card-preview', null, ['post' => $post]); ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; $i++; ?>
                    <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>
                <?php get_template_part('pagination'); ?>
            <?php endif; ?>
        </div>
     
    </section>

    </div>
 