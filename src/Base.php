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
        wp_register_style('main', get_template_directory_uri() . '/assets/build/main.css', [], null, 'all');
        wp_enqueue_style('main');
    }   

    public function includeScripts() : void
    {
        wp_register_script('main', get_template_directory_uri() . '/assets/build/main.js', [], null, true);
        wp_enqueue_script('main');
    }

    public function themeSupports() : void
    {
        add_action('after_setup_theme', function () {
            add_image_size('medium', 250, '', true); // Medium Thumbnail
            add_image_size('small', 120, '', true); // Small Thumbnail
    
            // Menus
            add_theme_support('menus');
    
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
}