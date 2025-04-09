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
$base->registerWidgets();
$base->sidebar_widgets_language_selector_init();


function pre_debug($data){
    echo '<pre class="debug" style="color: red;">';
    print_r($data);
    echo '</pre>';
}

$card = new CustomPostType( 'theme_base', 'card', 'Card', 'Cards', 2, 'Card Description' );
$card->register();

$arcanes = new Taxonomy('theme_base', 'arcanes', 'Arcane', 'Arcanes', array($card->getSlug(), 'post'));
$arcanes->associateToCustomPostType(array($card->getSlug(), 'post'));

