<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Mumoira
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once PREFIX_CODEBY_CORE_DIR . '/lib/dependency_required/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'codeby_core_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function codeby_core_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		array(
			'name'         => 'Meta Box', // The plugin name.
			'slug'         => 'meta-box', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/meta-box.5.6.3.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),
        array(
			'name'         => 'Post Duplicator', // The plugin name.
			'slug'         => 'post-duplicator', // The plugin slug (typically the folder name).
			'source'       => 'https://downloads.wordpress.org/plugin/post-duplicator.2.28.zip', // The plugin source.
			'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		),
    array(
  'name'         => 'Post Types Order', // The plugin name.
  'slug'         => 'post-types-order', // The plugin slug (typically the folder name).
  'source'       => 'https://downloads.wordpress.org/plugin/post-types-order.1.9.8.zip', // The plugin source.
  'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
array(
'name'         => 'Elementor', // The plugin name.
'slug'         => 'elementor', // The plugin slug (typically the folder name).
'source'       => 'https://downloads.wordpress.org/plugin/elementor.3.6.5.zip', // The plugin source.
'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
array(
'name'         => 'Elementor Pro', // The plugin name.
'slug'         => 'elementor-pro', // The plugin slug (typically the folder name).
'external_url'       => 'https://github.com/tien-wordpress/webb-bash/raw/main/assets/elementor-pro-3.7.1.zip', // The plugin source.
'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
array(
'name'         => 'All-in-One WP Migration', // The plugin name.
'slug'         => 'all-in-one-wp-migration', // The plugin slug (typically the folder name).
'source'       => 'https://downloads.wordpress.org/plugin/all-in-one-wp-migration.7.61.zip', // The plugin source.
'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
array(
'name'         => 'String locator', // The plugin name.
'slug'         => 'string-locator', // The plugin slug (typically the folder name).
'source'       => 'https://downloads.wordpress.org/plugin/string-locator.2.5.0.zip', // The plugin source.
// 'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
array(
'name'         => 'The Paste', // The plugin name.
'slug'         => 'the-paste', // The plugin slug (typically the folder name).
'source'       => 'https://downloads.wordpress.org/plugin/the-paste.1.1.0.zip', // The plugin source.
// 'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//			'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'codeby_core',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
