<?php
$object = get_queried_object();
$theme_template_name = basename(__FILE__, ".php");
$content = wpautop($object->description) ?? "";
?>
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
        <?php foreach($sub_cats as $sub_cat): ?>
            <div class="sub-cat">
                <a class="btn" href="<?=$sub_cat['url']?>"><?=$sub_cat['title']?></a>
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

<div class="wrapper">
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