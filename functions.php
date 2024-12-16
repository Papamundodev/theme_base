<?php

use Moon\Base;
use Moon\CustomPostType;
use Moon\Taxonomy;

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}



$base = new Base('__THEME_NAME__', '__THEME_SLUG__');

$base->themeSupports();
$base->registerMenus();
$base->includeStyles();
$base->includeScripts();
$base->addSVGSupport();
$base->initAjax();


$card = new CustomPostType( 'theme_base', 'card', 'Card', 'Cards', 2, 'Card Description' );
$card->register();

$arcanes = new Taxonomy('theme_base', 'arcanes', 'Arcane', 'Arcanes', array($card->getSlug()));
$arcanes->associateToCustomPostType(array($card->getSlug()));


function pre_debug($data){
    echo '<pre class="debug" style="color: red;">';
    print_r($data);
    echo '</pre>';
}

function get_attachment_id_from_url($url) { 
    $upload_dir = wp_upload_dir();
    $url =  $upload_dir['baseurl'] . '/2024/12/' . $title_slug . '.jpg';
    if(!file_exists($url)){
        $url =  $upload_dir['baseurl'] . '/2024/12/' . $title_slug . '.jpeg';
    }
    $attachement_id = attachment_url_to_postid($url);
    set_post_thumbnail($post, $attachement_id);
    return $attachement_id;
}


function no_paged_cards($query) {
    if ( $query->is_tax () && $query->is_main_query() ) {
    $query->set( 'posts_per_page', -1 );
    }
}
add_action( 'pre_get_posts', 'no_paged_cards' );


function get_post_image($post){
    if (function_exists('get_field')) {  
        $default_image = get_field('default_image', 'option') ?? get_site_icon_url();
        $default_class = 'post-preview__image--default';
    } else {
        $default_image = get_site_icon_url();
        $default_class = 'post-preview__image--default';
    }
    $image = get_the_post_thumbnail_url($post) ? get_the_post_thumbnail_url($post) : $default_image;
    return $image;
}
