<?php

namespace Theme_base;
    
class Base
{
    private string $theme_name;
    private string $theme_slug; 

    public function __construct(string $theme_name, string $theme_slug)
    {
        $this->theme_name = $theme_name;
        $this->theme_slug = $theme_slug;
    }

    public function includeStyles() : void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style('main', get_template_directory_uri() . '/assets/build/css/main.css', [], null);
        });
    }   

    public function includeScripts() : void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_register_script('main', get_template_directory_uri() . '/assets/build/js/main.js', [], null, true);
            wp_enqueue_script('main');
        });
    }

    public function themeSupports() : void
    {
        add_action('after_setup_theme', function () {
            // Menus
            add_theme_support('menus');
            add_theme_support('post-thumbnails');
            add_theme_support('title-tag');
            add_post_type_support('page', 'excerpt');
            // Enables post and comment RSS feed links to head
            add_theme_support('automatic-feed-links');
            // I18N
            load_theme_textdomain('theme_base', get_template_directory() . '/languages');
            // Activer le lazy loading natif
            add_theme_support('lazy-loading-images');
            // Ajouter des tailles d'images optimisées
            add_image_size('icon_small', 32, 32, true);  // Pour les miniatures très petites
            add_image_size('icon', 48, 48, true);  // Pour les miniatures très petites
            add_image_size('mobile', 576, '', true); // Pour les mobiles
            add_image_size('tablet', 768, '', true); // Pour les tablettes
            add_image_size('medium', 992, '', true); // Medium 
            add_image_size('large', 1200, '', true); // Large 

        }, 99);
    }

    public function registerMenus() : void
    {
        register_nav_menus([
            'header' => __('Header', 'theme_base'),
            'footer' => __('Footer', 'theme_base'),
        ]);
    }

    public function allowSVGUploads() :void
    {
        add_action('init', function () {

            add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
                global $wp_version;
                if ($wp_version !== '4.7.1') {
                    return $data;
                }

                $filetype = wp_check_filetype($filename, $mimes);

                return [
                    'ext'             => $filetype['ext'],
                    'type'            => $filetype['type'],
                    'proper_filename' => $data['proper_filename']
                ];
            }, 10, 4);

        });

    }

    public function addSVGSupport() :void
    {
        add_action('init', function () {

            add_filter('upload_mimes', function ($mimes) {
                $mimes['svg'] = 'image/svg+xml';

                return $mimes;
            });

        });

    }


   
    /**
     * Get nav menu items by location
     *
     * @param string|null $location The menu location id
     */
    public static function  wp_get_menu_array(?string $location = null, $args = []) : array
    {
        
        // Get all locations
        $locations = get_nav_menu_locations();

        if ($location === null || !array_key_exists($location, $locations)) {
            return [];
        }

        // Get object id by location
        $object = wp_get_nav_menu_object($locations[$location]);
        // Get menu items by menu name
        $menu_items = wp_get_nav_menu_items($object->name, array( 'update_post_term_cache' => false ));
        _wp_menu_item_classes_by_context( $menu_items );
        // Return menu post objects
        $menu = [];

        foreach ($menu_items as $k => $m) {
       
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = [];
                $menu[$m->ID]['ID'] = intval($m->ID);
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['classes'] = $m->classes;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['object_id'] = intval($m->object_id);
                $object = get_post($m->object_id);
                $menu[$m->ID]['target'] = $m->target;
                unset($menu_items[$k]);
                $menu[$m->ID]['children'] = self::populate_children($menu_items, $m);

                    
            }
        }
        return $menu;
    }

    /**
     * Populate children
     *
     */

    public static function populate_children( array $menu_array = null, \WP_Post $menu_item = null) : array
    {
        $children = [];
        if (!empty($menu_array)) {
            foreach ($menu_array as $k => $m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = [];
                    $children[$m->ID]['ID'] = intval($m->ID);
                    $children[$m->ID]['title'] = $m->title;
                    $children[$m->ID]['classes'] = $m->classes;
                    $children[$m->ID]['url'] = $m->url;
                    $children[$m->ID]['parent'] = intval($menu_item->ID);
                    $children[$m->ID]['target'] = $m->target;
                    $children[$m->ID]['object_id'] = intval($m->object_id);
                    unset($menu_array[$k]);
                    $children[$m->ID]['children'] = self::populate_children($menu_array, $m);
                }
            }
        };
        return $children;
    }



        /**
     * Get nav menu items by location
     *
     * @param string|null $location The menu location id
     */
    public static function  wp_get_term_array($terms_active) : array
    {

        $terms = get_terms( array(
            'taxonomy'   => 'category',
            'hide_empty' => false,
            'hierarchical' => true,
            'orderby' => 'name',
            'parent' => 0,
        ) );
        $menu = [];
        foreach ($terms as $k => $m) {

                $menu[$m->term_id    ] = [];
                $menu[$m->term_id]['ID'] = intval($m->term_id);
                $menu[$m->term_id]['title'] = $m->name;
                $menu[$m->term_id]['slug'] = $m->slug;
                $menu[$m->term_id]['parent'] = $m->parent;
                $menu[$m->term_id]['url'] = get_term_link($m);
                $children = get_term_children($m->term_id, 'category');
                $menu[$m->term_id]['current'] = in_array($m->term_id, $terms_active) ? true : false;
                $menu[$m->term_id]['open'] = !empty($children) && !empty(array_intersect($children, $terms_active)) ? true : false;
                $menu[$m->term_id]['children']= self::populate_term_children($children, $terms_active);
        }

        return $menu;
    }

    /**
     * Populate children
     *
     */

    public static function populate_term_children($child, $terms_active) : array
    {
        $children = [];
        if (!empty($child)) {
            foreach ($child as $k => $m) {
                    $term = get_term_by('id', $m, 'category');
                    $children[$term->term_id    ] = [];
                    $children[$term->term_id]['ID'] = intval($term->term_id);
                    $children[$term->term_id]['title'] = $term->name;
                    $children[$term->term_id]['slug'] = $term->slug;
                    $children[$term->term_id]['parent'] = $term->parent;
                    $children[$term->term_id]['url'] = get_term_link($term);
                    $grandchildren = get_term_children($term->term_id, 'category');
                    $children[$term->term_id]['current'] = in_array($term->term_id, $terms_active) ? true : false;
                    $children[$term->term_id]['open'] = !empty($grandchildren) && !empty(array_intersect($grandchildren, $terms_active)) ? true : false;
                    $children[$term->term_id]['children'] = self::populate_term_children($grandchildren, $terms_active);
            }
        };
    return $children;
    }

    public static function get_active_class($item) : string
    {
        if(in_array('current-menu-item', $item['classes'] ?? [])){
            return 'active';
        }
        return '';
    }



    /**
     * Register sidebars and widgetized areas.
     *
     * search
     *
     */
    public function registerWidgets() :void
    {
        add_action('widgets_init', function () {

            //add sidebars and widgets here

        });
    }

    /**
     * @return void
     * add widget for language selector if wpml is active
     */
    public function sidebar_widgets_language_selector_init() : void
    {
        add_action( 'widgets_init',  function(){
            register_sidebar( array(
                'name'          => 'language_selector_theme_base',
                'id'            => 'language_selector',
                'before_widget' => '<ul class="language-selector">',
                'after_widget'  => '</ul>',
                'before_title'  => '<li>',
                'after_title'   => '</li>',
            ) );
        });
    }


    public static function get_meta_description(){
        if (is_category()){
            return get_queried_object()->description;
        }elseif(is_page() || is_single()){
            return get_the_excerpt();
        }else{
            return bloginfo('description');
        }
    }

    public static function get_breadcrumbs(){
        $links = array();
        $blog_link = array(
            'url' => get_permalink(get_option('page_for_posts')),
            'text' => 'Blog'
        );
        array_push($links, $blog_link);
        $cats = get_the_category();
        if ( ! empty( $cats ) ) {
            $cat_link = array(
            'url' => get_category_link( $cats[0]->term_id ),
            'text' => $cats[0]->name
            );
            array_push($links, $cat_link);
        }
        if (is_single()) {
            $post = get_queried_object();
            $current_page = array(
                'url' => get_permalink($post->ID),
                'text' => $post->post_title
            );
            array_push($links, $current_page);
        }
        return $links;
    }
    

    /**
     * Calcule le temps de lecture estimé d'un contenu
     * @param string $content Le contenu du post
     * @return string Le temps de lecture formaté
     */
    public static function get_reading_time(string $content = '') : string 
    {
        // Si pas de contenu, utiliser le contenu du post courant
        if (empty($content)) {
            $content = get_the_content();
        }

        // Nettoyer le contenu des balises HTML
        $clean_content = strip_tags($content);
        
        // Nombre de caractères par minute (vitesse moyenne de lecture)
        $chars_per_minute = 1500;
        
        // Calculer le temps en minutes
        $chars_count = strlen($clean_content);
        $minutes = ceil($chars_count / $chars_per_minute);
        
        // Formater le résultat
        if ($minutes <= 1) {
            return __('1 min read', 'theme_base');
        } else {
            return sprintf(__('%d min read', 'theme_base'), $minutes);
        }
    }

    /*
    fin
    */

}