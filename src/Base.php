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
            wp_register_style('main', get_template_directory_uri() . '/assets/build/css/main.css', [], null, 'all');
            wp_register_style('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.css', [], null, 'all');
            wp_enqueue_style('main');
            wp_enqueue_style('swiper');
        });
    }   

    public function includeScripts() : void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_register_script('popper', get_template_directory_uri() . '/node_modules/@popperjs/core/dist/umd/popper.min.js', [], null, true);
            wp_register_script('bootstrap', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js', ['popper'], null, true);
            wp_register_script('swiper', get_template_directory_uri() . '/node_modules/swiper/swiper-bundle.min.js', [], null, true);
            wp_register_script('main', get_template_directory_uri() . '/assets/build/js/main.js', ['swiper'], null, true);
            wp_localize_script('main', 'ajaxurl', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('aas_ajax_nonce'),
            ));
            
            wp_enqueue_script('popper');
            wp_enqueue_script('bootstrap');
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

    public static function get_active_class($item) : string
    {
        if(in_array('current-menu-item', $item['classes'] ? $item['classes'] : [])){
            return 'active';
        }
        return '';
    }

        /**
     * initAjax
     *
     * create Ajax from class Ajax
     */

     public function initAjax() :void
     {
         $ajax = new Ajax();
         $ajax->initSearchAutocomplete();
     }


     public static function search_posts( $search_term, $post_types = ['post', 'page' ] ) {
        global $wpdb;
    
        // Sanitize the search term
        $search_term = sanitize_text_field( $search_term );
    
        // Return empty array if search term is empty
        if ( empty( $search_term ) ) {
            return array();
        }
    
        // Prepare the LIKE clause
        $like = '%' . $wpdb->esc_like( $search_term ) . '%';
    
        // Build the SQL query
        $sql = $wpdb->prepare(
            sprintf("
            SELECT DISTINCT ID
            FROM {$wpdb->posts}
            WHERE post_type IN (%s)
            AND post_status = 'publish'
            AND ( post_title LIKE %%s )
            ", implode(',', array_fill(0, count($post_types), '%s'))),
            array_merge( $post_types, array( $like, $like ) )
        );
    
        // Get the results
        $post_ids = $wpdb->get_col( $sql );
    
        // If no posts found, return empty array
        if ( empty( $post_ids ) ) {
            return array();
        }
    
        $results = [];
        // Get the posts
        foreach ($post_types as $post_type) {
            $posts = [];
            $posts = get_posts( array(
                'post__in'       => $post_ids,
                'post_type'      => $post_type,
                'post_status'    => 'publish',
                'posts_per_page' => 10, // Adjust as needed
                'orderby'        => 'post__in',
            ) );
            $results[$post_type] = $posts ?? 'fuck';
        }
        return $results;
    }


    

     /*
     fin
     */
}