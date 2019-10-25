<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController 
{
    public function adminReservationList()
    {
        return require_once( "$this->plugin_path/templates/reservation-list.php");
    }

    public function adminSettings()
    {
        return require_once( "$this->plugin_path/templates/admin-settings.php");
    }

    // public function adminTaxonomies()
    // {
    //     return require_once( "$this->plugin_path/templates/taxonomies.php");
    // }

    // public function adminWidgets()
    // {
    //     return require_once( "$this->plugin_path/templates/widgets.php");
    // }

    // public function ddOptionsGroup( $input )
    // {
    //     return $input;
    // }

    // public function ddAdminSection()
    // {
    //     echo 'check this awesome section';
    // }

    public function ddTextExample()
    {
        $value = esc_attr( get_option ( 'text_example') );
        echo '<input 
            type="text" 
            class="regular-text" 
            name="text_example"
            value="'.$value.'"
            placeholder="write here">';
    }

    public function ddFirstName()
    {
        $value = esc_attr( get_option ( 'first_name') );
        echo '<input 
            type="text" 
            class="regular-text" 
            name="first_name"
            value="'.$value.'"
            placeholder="write first name">';
    }

}