<?php
/**
 * Plugin Name: Codeby Core
 * Plugin URI: https://github.com/dnstylish
 * Description: Helper cho anh em codeby dễ dàng quay tay hơn
 * Version: 1.0
 * Author: Yuan
 * Author URI: https://github.com/dnstylish
 * License: Commercial
 **/

namespace CodeByCore;

class CodebyCore{

    public static ?CodebyCore $instance = null;

    public static function get_instance(): CodebyCore
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->autoload();
    }

    private function autoload(): void
    {

        $inc_files = array(
            'eloquent',
            'custom-post-type',
            'helper',
            'cutsom-meta-boxes'
        );

        foreach ($inc_files as $file) {
            include_once(__DIR__ . '/lib/' . $file . '.php');
        }

    }
}

if (!class_exists('CodebyCore')) {
    $self = CodebyCore::get_instance();
    // add_action('admin_notices', array($self, 'test_notice'));
}
