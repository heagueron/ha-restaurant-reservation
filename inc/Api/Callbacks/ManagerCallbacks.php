<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class ManagerCallbacks extends BaseController 
{

    public function checkboxSanitize( $input )
    {
        // 2 ways to sanitize:
        // a)
        // return filter-var($input, FILTER_SANITIZE_NUMBER_INT);
        // b)       
        return ( isset($input) ? true : false );
    }

    public function adminSectionManager() 
    {
        echo 'ACTIVATE/INACTIVATE FEATURES OF THE PLUGIN';
    }

    public function checkboxField( $args )
	{
		$name = $args['label_for'];
		$classes = $args['class'];
		$checkbox = get_option( $name );
		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="" ' . ($checkbox ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
	}
    
}