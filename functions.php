<?php

use Theme_base\Base;
use Theme_base\CustomPostType;
use Theme_base\Taxonomy;

if (is_file(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}



$base = new Base('theme_base', 'theme_base');

$base->themeSupports();
$base->registerMenus();
$base->includeStyles();
$base->includeScripts();
$base->addSVGSupport();
$base->initAjax();



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
