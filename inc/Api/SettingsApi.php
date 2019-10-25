<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Api;

class SettingsApi
{
    // These variables will receive arrays from Init
    public $admin_pages     = array();
    public $admin_subpages  = array();
    public $settings        = array();
    public $sections        = array();
    public $fields          = array();

    public function register()
    {
        if ( ! empty( $this->admin_pages ) ) {
            add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
        }

        $this->register_settings();

    }

    public function register_settings(){
        if ( ! empty( $this->settings ) ) {
            add_action( 'admin_init', array( $this, 'registerCustomFields' ) );
        }
    }

    /****************************************************
     * Pages and subpages
     * 
     ****************************************************/

    // Populate custom main pages
    public function addPages(array $pages) 
    {
        $this->admin_pages = $pages;
        return $this; // returning the whole class, now loaded with $pages for method chainning.
    }

    public function withSubPage( string $title = null ) {
        if ( empty( $this->admin_pages ) ) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpage = array(
            [
                'parent_slug'   => $admin_page['menu_slug'],
                'page_title'    => $admin_page['page_title'],
                'menu_title'    => ($title) ? $title : $admin_page['menu_title'],
                'capability'    => $admin_page['capability'],
                'menu_slug'     => $admin_page['menu_slug'],
                'callback'      => $admin_page['callback'],
           ],
        );

        $this->admin_subpages = $subpage;

        return $this;

        // Now the class returns having $this->admin_subpages loaded with $subpage ...

    }

    // Populate custom subpages
    public function addSubPages( array $subpages ) {
        $this->admin_subpages = array_merge( $this->admin_subpages, $subpages);
        return $this;
    }

    function addAdminMenu() {

        // Add main pages
        foreach ( $this->admin_pages as $page ) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }

        foreach ( $this->admin_subpages as $page ) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback']
            );
        }

    }

    /****************************************************
     * Custom Post Types
     * 
     ****************************************************/

    // Populate settings
    public function setSettings(array $settings) 
    {
        $this->settings = $settings;
        return $this;
    }

    // Populate sections
    public function setSections(array $sections) 
    {
        $this->sections = $sections;
        return $this;
    }

    // Populate fields 
    public function setFields(array $fields) 
    {
        $this->fields = $fields;
        return $this;
    }


    public function registerCustomFields()
    {
        // Adding an option in SETTINGS TAB requires 3 different actions

        // 1. Register setting
        foreach ( $this->settings as $setting ) {
            register_setting(
                $setting['option_group'], // A settings group name (default: "general," "discussion," and "reading," among others)
                $setting['option_name'], // The name of an option to sanitize and save.
                ( isset( $setting['callback'] ) ? $setting['callback'] : '') // Data used to describe the setting when registered.
                
                // see: https://developer.wordpress.org/reference/functions/register_setting/
            );
        }

        // 2. Add settings section
        foreach ( $this->sections as $section ) {
            add_settings_section( 
                $section['id'], // Slug-name to identify the section.
                $section['title'], // Formatted title of the section.
                $section['callback'], // Function that echos out any content at the top of the section (between heading and fields).
                $section['page'] //The slug-name of the settings page on which to show the section.

                // see: https://developer.wordpress.org/reference/functions/add_settings_section/
            );
        }
        
        // 3. Add settings field
        foreach ( $this->fields as $field ) {
            add_settings_field( 
                $field["id"],
                $field["title"],
                $field["callback"], 
                $field["page"], 
                $field["section"], 
                ( isset( $field['args'] ) ? $field['args'] : '') // Data used to describe the setting when registered.
                
            );
        }  

    }

}