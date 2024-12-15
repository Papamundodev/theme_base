<?php

namespace Moon;

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
            wp_register_style('main', get_template_directory_uri() . '/assets/build/css/main.css', [], null, 'all');
            wp_enqueue_style('main');
        });
    }   

    public function includeScripts() : void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_register_script('main',  get_template_directory_uri() . '/assets/build/js/main.js', ['wp-api'], null, true);
            wp_localize_script('main', 'ajaxurl', [admin_url('admin-ajax.php')]);
            wp_enqueue_script('main');
        });
    }

    public function themeSupports() : void
    {
        add_action('after_setup_theme', function () {
            add_image_size('medium', 250, '', true); // Medium Thumbnail
            add_image_size('small', 120, '', true); // Small Thumbnail
            add_image_size('large', 1024, '', true); // Large Thumbnail 

            // Menus
            add_theme_support('menus');
            add_theme_support('post-thumbnails');
            // Enables post and comment RSS feed links to head
            add_theme_support('automatic-feed-links');
    
            // I18N
            load_theme_textdomain('moon', get_template_directory() . '/languages');
    
            // Content width
            if ( ! isset ($content_width)) {
                $content_width = 800;
            }
        }, 99);
    }

    public function registerMenus() : void
    {
        register_nav_menus([
            'header' => 'Header',
            'footer' => 'Footer',
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
     * currentYear
     *
     * function footer copyright to get current year
     * Used in footer.php
     */

    public static function currentYear() :string
    {
        return date('Y');
    }


   
    /**
     * Get nav menu items by location
     *
     * @param string|null $location The menu location id
     */
    public static function  wp_get_menu_array(?string $location = null, $args = [])
    {
        
        // Get all locations
        $locations = get_nav_menu_locations();

        if ($location === null || !array_key_exists($location, $locations)) {
            return;
        }

        // Get object id by location
        $object = wp_get_nav_menu_object($locations[$location]);
        // Get menu items by menu name
        $menu_items = wp_get_nav_menu_items($object->name, array( 'update_post_term_cache' => false ));
        _wp_menu_item_classes_by_context( $menu_items );
        // Return menu post objects
        $menu = array();

        foreach ($menu_items as $m) {
       
            if (empty($m->menu_item_parent)) {
                $menu[$m->ID] = array();
                $menu[$m->ID]['ID'] = intval($m->ID);
                $menu[$m->ID]['title'] = $m->title;
                $menu[$m->ID]['classes'] = $m->classes;
                $menu[$m->ID]['url'] = $m->url;
                $menu[$m->ID]['object_id'] = intval($m->object_id);
                $object = get_post($m->object_id);
                $menu[$m->ID]['parent_object_id'] = $object->post_parent;
                $menu[$m->ID]['target'] = $m->target;
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
        $children = array();
        if (!empty($menu_array)) {
            foreach ($menu_array as $k => $m) {
                if ($m->menu_item_parent == $menu_item->ID) {
                    $children[$m->ID] = array();
                    $children[$m->ID]['ID'] = intval($m->ID);
                    $children[$m->ID]['title'] = $m->title;
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
     * initAjax
     *
     * create Ajax from class Ajax
     */

     public function initAjax() :void
     {
         $ajax = new Ajax();
         $ajax->initCreatePost();
     }

     public static function complus_pagination( \WP_Query $query = null) : array
     {
         // When we're on page 1, 'paged' is 0, but we're counting from 1,
         // so we're using max() to get 1 instead of 0
         $currentPage = max( 1, get_query_var( 'paged', 1 ) );
 
         // This creates an array with all available page numbers, if there
         // is only *one* page, max_num_pages will return 0, so here we also
         // use the max() function to make sure we'll always get 1
         $pages = range( 1, max( 1, $query->max_num_pages ) );
 
         // Now, map over $pages and return the page number, the url to that
         // page and a boolean indicating whether that number is the current page
         return array_map( function( $page ) use ( $currentPage ) {
             return [
                 "isCurrent" => $page == $currentPage,
                 "page" => $page,
                 "url" => get_pagenum_link( $page )
             ];
         }, $pages );
     }




     /*
     fin
     */
}