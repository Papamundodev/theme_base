<?php
$template = basename(__FILE__, ".php") ;
$object = get_queried_object();
$content = wpautop($object->description) ?? "";
global $wp_query;
?>

    <div id="<?=$template?>" class="<?=$template?>">

    <section label="taxonomy-<?=$object->slug?>" class="taxonomy section">

             <!-- Page Title -->
        <div class="wrapper">

            <div class="page-title">
                <h1><?=$object->name?></h1>
            </div><!-- End Page Title -->
        </div>
        <?php get_template_part('partials/modules/module-command-mobile'); ?>

        <?php
        // display sub cat
        $terms_query = get_terms( array(
            'taxonomy'   => $object->taxonomy,
            'hide_empty' => false,
            'hierarchical' => true,
            'orderby' => 'name',
            'parent' => $object->term_id,
        ) );
        $sub_cats = \Theme_Base\Base::wp_get_term_array($terms_query,[]);
        ?>

        <?php if(is_array($sub_cats) && count($sub_cats) > 0): ?>
        <div class="wrapper">
            <div class="sub-cats">
                <h2>Sub Categories</h2>

                <?php $subcat_names = []; foreach($sub_cats as $sub_cat): ?>
                    <?php $subcat_names[] = $sub_cat['slug']; ?>
                    <div class="sub-cat">
                        <button class="open-module btn" popovertarget="module-<?=$sub_cat['slug']?>">
                            <p><?=$sub_cat['title']?></p>
                        </button>   
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <div class="wrapper">
            <div class="page-description    ">
                <?=$content?>
            </div><!-- End Page Title -->
        </div>
     
    </section>
    
    </div>

    <?php foreach($sub_cats as $sub_cat): ?>

        <div popover id="module-<?=$sub_cat['slug']?>">
            <div class="wrapper wrapper-card-preview">
                <?php
                $wp_query->set('post_type', 'card');
                $wp_query->set('tax_query', array(
                    array(
                        'taxonomy' => $object->taxonomy,
                        'field' => 'slug',
                        'terms' => $sub_cat['slug'],
                    ),  
                ));
                $card_query = $wp_query->get_posts(); // Réexécuter la requête avec les nouveaux paramètres
                ?>
                <?php if(is_array($card_query) && count($card_query) > 0): ?>
            
                        <?php usort($card_query, function($a, $b) {
                            $ordre_a = get_field('ordre', $a->ID);
                            $ordre_b = get_field('ordre', $b->ID);
                            return $ordre_a - $ordre_b;
                        });
                        ?>
                        <div class="layout-card-preview">
                            <?php foreach ($card_query as $post) : setup_postdata($post); ?>
                                <?php if($post->post_type == 'card'): ?>
                            
                                        <div class="card-preview">
                                            <?php get_template_part('partials/article/card-preview', null, ['post' => $post]); ?>
                                        </div>
                    
                                <?php endif;?>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </div>

                    <?php get_template_part('pagination'); ?>
                <?php endif; ?>
            </div>
        </div>

    <?php endforeach; ?>