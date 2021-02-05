<?php
 
defined( 'ABSPATH' ) || exit;
 
/**
* Plugin Name: Admin Notices Remover | WP Rocket Test
* Version: 0.1a
* Description: Disable .htaccess and wp-content/advanced-cache.php admin notices
* Author: Manuel Rodrigo Escobar 
* Author URI: https://github.com/rodrigoesv
* License: GNU General Public License v3 or later
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
 
// Using wp_rocket_loaded as recomended on https://github.com/wp-media/wp-rocket-helpers/blob/master/_wp-rocket-helper-plugin/wp-rocket-helper-plugin.php
// Hooking into `wp_rocket_loaded` is a safe way to make sure all WP Rocket features are available, however, it’s not required.
add_action( 'wp_rocket_loaded', 'remove_htaccess_and_advanced_cache_admin_notices' );

// Function to remove the admin notices for each action 
function remove_htaccess_and_advanced_cache_admin_notices () {

    // Removed the action for the .htaccess admin notice. Found the name of the fuction on https://github.com/wp-media/wp-rocket/blob/df26acdfbe015d056fc442cfbf28734f9635aa9f/inc/admin/ui/notices.php#L391
    remove_action( 'admin_notices', 'rocket_warning_htaccess_permissions' );

    // Found how this error looks like in this reported issue: https://github.com/wp-media/wp-rocket/issues/2730
    // Found this notices is created in this file https://github.com/wp-media/wp-rocket/blob/df26acdfbe015d056fc442cfbf28734f9635aa9f/inc/Engine/Cache/AdvancedCache.php#L162    
    remove_action( 'admin_notices', 'rocket_warning_advanced_cache_permissions' );
};




