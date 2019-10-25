<?php
/**
 * @package DDPlugin Advanced1
 */

namespace Inc\Base;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}