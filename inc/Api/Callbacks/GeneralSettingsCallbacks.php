<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class GeneralSettingsCallbacks extends BaseController 
{

    public function partyInputSanitize() {
        return;
    }

    public function timeRangeSanitize() {
        return;
    }

    public function adminGeneralSection() 
    {
        echo 'Set here the general options for the reservation feature';
    }

    public function minPartyEntry( $args )
    {
        $name = 'min_party_size';
		$classes = $args['class'];
        $value = get_option( $name );
        
        echo 
        '<div class="' . $classes . '">
            <input 
                type="number" 
                id="' . $name . '" 
                name="' . $name . '" 
                value="'.$value.'" 
            >
            <label for="' . $name . '"><div></div></label>
        </div>';
    }

    public function maxPartyEntry( $args )
    {
        $name = 'max_party_size';
		$classes = $args['class'];
        $value = get_option( $name );
        
        echo 
        '<div class="' . $classes . '">
            <input 
                type="number" 
                id="' . $name . '" 
                name="' . $name . '" 
                value="'.$value.'" 
            >
            <label for="' . $name . '"><div></div></label>
        </div>';
    }
    
    public function timeStepEntry( $args )
    {
        $name = 'time_range_step';
		$classes = $args['class'];
        $value = get_option( $name );
        
        echo 
        '<div class="' . $classes . '">
            <input 
                type="number" 
                id="' . $name . '" 
                name="' . $name . '" 
                value="'.$value.'" 
            >
            <label for="' . $name . '"><div></div></label>
        </div>';
    }    

}