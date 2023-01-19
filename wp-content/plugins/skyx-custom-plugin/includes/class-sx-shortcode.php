<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists('SxShortcode') ) {
    class SxShortcode
    {
        protected static $instacne;

        public function __construct()
        {
            add_shortcode('office_locations', [$this , 'display_locations']);
        }

        public static function getInstance()
        {
            if (self::$instacne === null) {
                self::$instacne = new self();
            }
            return self::$instacne;
        }

        function display_locations()
        {
            load_template(SKYX_TEMPLATE_DIR . "template-contact-locations.php", true);
        }
    }
}
