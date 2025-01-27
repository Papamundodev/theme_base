<?php

use Theme_base\Base;

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}



$base = new Base('theme_base', 'theme_base');

$base->themeSupports();
$base->registerMenus();
$base->includeStyles();
$base->includeScripts();
$base->addSVGSupport();
$base->add_pagination_link_attributes();


function pre_debug($data){
    echo '<pre class="debug" style="color: red;">';
    print_r($data);
    echo '</pre>';
}


/**
 * Add category to Yoast breadcrumb
 */
add_filter( 'wpseo_breadcrumb_links', function( $links ) {
    if ( is_single() ) {
        $cats = get_the_category();
        if ( ! empty( $cats ) ) {
            $cat_link = array(
                'url' => get_category_link( $cats[0]->term_id ),
                'text' => $cats[0]->name
            );
            array_splice( $links, -1, 0, array( $cat_link ) );
        }
    }
    return $links;
});