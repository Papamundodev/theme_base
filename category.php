<?php
/*
 * get template's name for main class
 */

$theme_template_name = basename(__FILE__, ".php");

/*
 * This template sort categories by hierarchy ,
 * and send the query to the appropriate template
 *
 * 4 Options :
 * - has_no_parent  : check if a cat has no parent
 * - middle         : check if a cat has parent and child
 * - child          : check if a cat has parent and no child
 * - hidden         : check if the cat is hidden
 */

$theme_sorting_cats = array(
    'has_no_parent' =>  \Theme_base\Base::cat_has_no_parent_category(get_queried_object()),
    'middle'        =>  \Theme_base\Base::cat_middle_category(get_queried_object()),
    'child'         =>  \Theme_base\Base::cat_child_category(get_queried_object()),
);


/*
 * THE QUERY
 */
global $wp_query;
?>



<?php get_header();?>

    <main id="main-<?=$theme_template_name?>" class="">

            <?php switch ($theme_sorting_cats):

            case $theme_sorting_cats["has_no_parent"] : ?>

                <?php get_template_part("partials/categories/parent-category");?>

                <?php break; ?>


            <?php case $theme_sorting_cats["middle"] : ?>

                <?php get_template_part("partials/categories/middle-category"); ?>

                <?php break; ?>

            <?php case $theme_sorting_cats["child"] : ?>

                <?php get_template_part("partials/categories/child-category");?>

                <?php break; ?>

        <?php endswitch ?>

    </main>


<?php get_footer();?>