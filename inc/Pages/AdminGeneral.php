<?php
/**
 * @package DOMDevs OOP Reservation Plugin
 */

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

use \Inc\Api\Callbacks\GeneralSettingsCallbacks;

class AdminGeneral extends BaseController
{
    public $settings;

    public $general_callbacks;

    public function register()
    {
        $this->settings = new SettingsApi();
        $this->general_callbacks = new GeneralSettingsCallbacks();

        $this->setGeneralSettings();
        $this->setSections();
        $this->setFields();

        $this->settings->register_settings();

    }

    public function setGeneralSettings()
    {
        $args = [
            [
                'option_group'  =>  'general_settings',
                'option_name'   =>  'min_party_size',
                'callback'      =>  array( $this->general_callbacks, 'partyInputSanitize'),

            ],
            [
                'option_group'  =>  'general_settings',
                'option_name'   =>  'max_party_size',
                'callback'      =>  array( $this->general_callbacks, 'partyInputSanitize'),

            ],
            [
                'option_group'  =>  'general_settings',
                'option_name'   =>  'time_range_steps',
                'callback'      =>  array( $this->general_callbacks, 'timeRangeSanitize'),

            ],

        ];
        $this->settings->setSettings( $args );
    }

    public function setSections()
    {
        $args = array(
            array(
                'id'        =>  'dd_admin_general',
                'title'     =>  'General Options',
                'callback'  =>  array( $this->general_callbacks, 'adminGeneralSection'),
                'page'      =>  'dd_oop_reservation', // menu_slug from main page
            ),
        );

        $this->settings->setSections( $args );
    }

    public function setFields()
    {
        $args = [
            [
                'id'        =>  'min_party_size', // from the settings
                'title'     =>  'Min party size',
                'callback'  =>  array( $this->general_callbacks, 'minPartyEntry'),
                'page'      =>  'dd_oop_reservation', // menu_slug from main page
                'section'   =>  'dd_admin_general',
                'args'      =>  array(
                    'label_for' => 'min_party_size',
                    'class'     => 'ui-toggle'
            )],
            [
                'id'        =>  'max_party_size', // from the settings
                'title'     =>  'Max party size',
                'callback'  =>  array( $this->general_callbacks, 'maxPartyEntry'),
                'page'      =>  'dd_oop_reservation', // menu_slug from main page
                'section'   =>  'dd_admin_general',
                'args'      =>  array(
                    'label_for' => 'max_party_size',
                    'class'     => 'ui-toggle'
            )],
            [
                'id'        =>  'time_range_step', // from the settings
                'title'     =>  'Time range steps',
                'callback'  =>  array( $this->general_callbacks, 'timeStepEntry'),
                'page'      =>  'dd_oop_reservation', // menu_slug from main page
                'section'   =>  'dd_admin_general',
                'args'      =>  array(
                    'label_for' => 'time_range_step',
                    'class'     => 'ui-toggle'
            )]

        ];
        $this->settings->setFields( $args );
    }

}