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
        
        // Ajouter cette configuration pour l'environnement local
        if (defined('LOCAL_DEV_SITE') && LOCAL_DEV_SITE) {
            add_action('phpmailer_init', [$this, 'configure_smtp_for_local']);
        }

        // Désactiver Gravatar
        add_filter('option_show_avatars', '__return_false');
        
        // OU optimiser Gravatar en utilisant un placeholder local
        add_filter('pre_get_avatar_data', [$this, 'replace_gravatar'], 10, 2);

        // Désactiver les styles Gutenberg frontend
        add_action('wp_enqueue_scripts', function() {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style'); // Si vous utilisez WooCommerce
        }, 100);

        // Désactiver les source maps en production
        if (!defined('WP_DEBUG') || !WP_DEBUG) {
            add_action('wp_head', function() {
                remove_action('wp_head', 'wp_generator');
                echo '<meta name="sourcemap" content="none">' . "\n";
            });
            
            add_filter('style_loader_src', [$this, 'remove_source_maps'], 999, 2);
            add_filter('script_loader_src', [$this, 'remove_source_maps'], 999, 2);
        }
    }

    public function configure_smtp_for_local($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'localhost';
        $phpmailer->SMTPAuth = false;
        $phpmailer->Port = 1025; // Port par défaut de Mailpit
        
        // Optionnel : forcer l'email de destination pour les tests
        // $phpmailer->addAddress('votre-email@example.com');
    }

    public function replace_gravatar($args, $id_or_email) : array
    {
        // Remplacer par une image locale par défaut
        $args['url'] = get_template_directory_uri() . '/assets/images/default-avatar.png';
        
        // Désactiver la requête vers Gravatar
        $args['found_avatar'] = true;
        
        return $args;
    }

    public function includeStyles() : void
    {
        add_action('wp_enqueue_scripts', function () {
            // AOS uniquement sur les pages nécessaires
            wp_enqueue_style('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.css', [], null);
            // Style principal avec Bootstrap et Bootstrap Icons intégrés
            wp_enqueue_style('main', get_template_directory_uri() . '/assets/build/css/main.css', [], null);
        });
    }   

    public function includeScripts() : void
    {
        add_action('wp_enqueue_scripts', function () {
            // Bootstrap uniquement si nécessaire
            wp_enqueue_script('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.js', [], null, true);
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



    public function process_contact_form() {
        add_action('admin_post_nopriv_submit_contact_form', [$this, 'handle_contact_form']);
        add_action('admin_post_submit_contact_form', [$this, 'handle_contact_form']);
    }

    public function handle_contact_form() {
        if (!isset($_POST['contact_nonce']) || !wp_verify_nonce($_POST['contact_nonce'], 'submit_contact_form')) {
            wp_die('Nonce verification failed');
        }

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = get_field('email', 'option');
        $headers = array(
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . $name . ' <' . $email . '>'
        );

        $email_content = "Nom: " . $name . "<br>";
        $email_content .= "Email: " . $email . "<br>";
        $email_content .= "Message:<br>" . nl2br($message);

        $sent = wp_mail($to, $subject, $email_content, $headers);

        $redirect_url = add_query_arg(
            array(
                'status' => $sent ? 'success' : 'error'
            ),
            wp_get_referer()
        );

        wp_safe_redirect($redirect_url);
        exit;
    }
    

     /*
     fin
     */

    public function remove_source_maps($src, $handle) : string
    {
        if (strpos($src, '.map') !== false) {
            return '';
        }
        return str_replace(['.map', '.min.map'], '', $src);
    }
}