<?php

/**
 * Trigger this file on Plugin Uninstall
 * 
 * @package DDPlugin Advanced1
 */

if ( !defined('WP_UNINSTALL_PLUGIN') ){
    die;
}

// Clear Database for this plugin

$reservations = get_posts(  array('post_type'=> 'reservation', 'numberposts' => -1 ));

foreach( $reservations as $reservation ) {
    wp_delete_post( $reservation->ID, true );
}

?>