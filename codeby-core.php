<?php
/**
 * Plugin Name: Codeby Core
 * Plugin URI: https://codeby.com
 * Description: Collection of Wordpress functions, mini classes and snippets for everyday developer's routine life.
 * Author: Yuan CodeBy
 * Author URI: https://codeby.com
 * Version: 1.0
 * Text Domain: codeby-core
 * Domain Path: /languages
 * License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
namespace CodeByCore;
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Define constants
 *
 * @since 1.0
 */
if ( ! defined( 'PREFIX_VERSION_NUM' ) ) 		define( 'PREFIX_VERSION_NUM'		, '1.0' ); // Plugin version constant
if ( ! defined( 'PREFIX_CODEBY_CORE' ) )		define( 'PREFIX_CODEBY_CORE'		, trim( dirname( plugin_basename( __FILE__ ) ), '/' ) ); // Name of the plugin folder eg - 'codeby-core'
if ( ! defined( 'PREFIX_CODEBY_CORE_DIR' ) )	define( 'PREFIX_CODEBY_CORE_DIR'	, plugin_dir_path( __FILE__ ) ); // Plugin directory absolute path with the trailing slash. Useful for using with includes eg - /var/www/html/wp-content/plugins/codeby-core/
if ( ! defined( 'PREFIX_CODEBY_CORE_URL' ) )	define( 'PREFIX_CODEBY_CORE_URL'	, plugin_dir_url( __FILE__ ) ); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/codeby-core/

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
            'custom-meta-boxes'
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

// Load everything
require_once( PREFIX_CODEBY_CORE_DIR . 'loader.php' );
require_once( PREFIX_CODEBY_CORE_DIR . 'lib/dependency_required/index.php' );

// Register activation hook (this has to be in the main plugin file or refer bit.ly/2qMbn2O)
register_activation_hook( __FILE__, 'prefix_activate_plugin' );