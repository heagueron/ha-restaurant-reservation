<?php
/**
 * Plugin Name: DOMDevs OOP Reservation Plugin
 * Description: This is a Object Oriented Programming DOMDevs Reservation Plugin
 * Author: Hector Aguero
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? No entry allowed here!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' )  ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
} else {
   die('autoload.php not found on: ' . dirname( __FILE__ ) );
}

/**
 * The code that runs during plugin activation
 */
function activate_advanced1_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_advanced1_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_advanced1_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_advanced1_plugin' );

if ( class_exists('Inc\\Init') ) {
    Inc\Init::register_services();
} else {
    die('Class Init does not found!');
}