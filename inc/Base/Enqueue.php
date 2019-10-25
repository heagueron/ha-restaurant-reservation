<?php
/**
 * @package DDPlugin Advanced1
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }
    function enqueue() {
        wp_register_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css', false, '1.0.0'  );
        wp_enqueue_style( 'mypluginstyle');
        
        wp_enqueue_script( 'mypluginsscript', $this->plugin_url . 'assets/myscript.js');

    }
}