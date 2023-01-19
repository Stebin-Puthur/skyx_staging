<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Skyx')) {
    class Skyx
    {
        protected static $instacne;
        public $sxShortcode;

        public function __construct()
        {
            add_action('plugins_loaded', array($this, 'initialize'), 20);
        }

        public static function getInstance()
        {
            if (self::$instacne === null) {
                self::$instacne = new self();
            }

            return self::$instacne;
        }

        public function initialize()
        {
            $this->includes();
            $this->init();
        }

        public function includes()
        {
            include_once SKYX_INCLUDES_DIR . 'class-sx-shortcode.php';
        }

        public function init()
        {
            $this->sxShortcode = SxShortcode::getInstance();
        }

    }
}