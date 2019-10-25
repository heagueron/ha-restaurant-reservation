<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $callbacks_mngr;

    public $pages = [];
    public $subpages = [];

    public function register()
    {       
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();
        $this->setSubpages();
        
        $this->settings->addPages( $this->pages )->withSubPage('Reservations')->addSubPages( $this->subpages )->register(); // method chainning
    }


    /****************************************************
     * Pages and subpages
     * 
     ****************************************************/

    public function setPages()
    {
        $this->pages = array(
            [
                'page_title'    => 'DOMDevs OOP Reservation',
                'menu_title'    => 'DOMDevs OOP Reservation',
                'capability'    => 'manage_options',
                'menu_slug'     => 'dd_oop_reservation',
                'callback'      => array( $this->callbacks, 'adminReservationList'),
                'icon_url'      => 'dashicons-store',
                'position'      => 110,
           ],
        );

    }

    public function setSubpages()
    {
        $this->subpages = array(
            [
                'parent_slug'   => 'dd_oop_reservation',
                'page_title'    => 'Settings',
                'menu_title'    => 'Settings',
                'capability'    => 'manage_options',
                'menu_slug'     => 'dd_oop_reservation_settings',
                'callback'      => array( $this->callbacks, 'adminSettings'),
           ]
        );
    }

}