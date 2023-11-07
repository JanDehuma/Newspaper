<?php
/*
Plugin Name: APP Find PRO Plugin
Plugin URI: http://tagdiv.com
Description: tagDiv plugin for demos with custom post types & taxonomies
Author: tagDiv
Version: 1.0.0
Author URI: http://tagdiv.com
*/

defined( 'ABSPATH' ) || exit;

add_action( 'tdc_init', function() {
	new td_app_find_pro_demo_plugin();
}, 11 );

class td_app_find_pro_demo_plugin {

	var $plugin_url = '';
	var $plugin_path = '';

	public function __construct() {

		$this->plugin_url = plugins_url(__FILE__ );
		$this->plugin_path = dirname(__FILE__ );

		/**
		 * ACF
		 */

		// this will allow custom fields meta box on posts when the acf plugin is active
		add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );

		// add local acf fields
		add_action( 'init', array( $this, 'acf_add_local_field_groups' ) );

		// export acf fields: (via json sync)
		add_filter( 'acf/settings/save_json', array( $this, 'set_acf_json_save_folder' ) );
		add_filter( 'acf/settings/load_json', array( $this, 'add_acf_json_load_folder' ) );

		// sync json acf-json fields @see td-demo/includes/acf-json
		add_action( 'admin_init', array( $this, 'sync_acf_fields' ) );

		/**
		 * CPT UI
		 */
		add_action( 'after_setup_theme',  function () {

            // we need priority 9, to avoid invalid tax error
			add_action( 'init', array( $this, 'cptui_register_my_cpts' ), 9 );
			add_action( 'init', array( $this, 'cptui_register_my_taxes' ), 9 );

		});

	}

	public function set_acf_json_save_folder( $path ) {
		return $this->plugin_path . '/includes/acf-json';
	}

	public function add_acf_json_load_folder( $paths ) {
		unset( $paths[0] );

		$paths[] = $this->plugin_path . '/includes/acf-json';

		return $paths;
	}

	public function acf_add_local_field_groups() {

		/*
		 * ACF > Export Field Groups - Generated PHP goes here
		 */

	}

	public function sync_acf_fields() {

		if( ! function_exists('acf_get_field_groups' ) )
			return;

		$groups = acf_get_field_groups();
		$sync = array();

		// return here if no field groups
		if( empty( $groups ) )
			return;

		// find json field groups which have not yet been imported
		foreach( $groups as $group ) {
			$local    = acf_maybe_get( $group, 'local', false );
			$modified = acf_maybe_get( $group, 'modified', 0 );
			$private  = acf_maybe_get( $group, 'private', false );

			// ignore db/php/private field groups
			if( $local !== 'json' || $private ) {
				// do nothing
				continue;
			// append to sync if not yet in database
			} elseif( ! $group['ID'] ) {
				$sync[ $group['key'] ] = $group;
			// append to sync if "json" modified time is newer than database
			} elseif( $modified && $modified > get_post_modified_time( 'U', true, $group['ID'], true ) ) {
				$sync[ $group['key'] ]  = $group;
			}
		}

		// return here if no sync needed
		if( empty( $sync ) )
			return;

		foreach( $sync as $key => $v ) {

			// append fields
			if( acf_have_local_fields( $key ) ) {
				$sync[$key]['fields'] = acf_get_local_fields( $key );
			}

			// import
			$field_group = acf_import_field_group( $sync[$key] );

		}

	}

	// register cptui post types
	function cptui_register_my_cpts() {

        /**
         * Post Type: APP Listings
         */
        register_post_type( 'tdcpt_app_listing', array(
            'labels' => array(
                'name' => 'APP Listings',
                'singular_name' => 'APP Listing',
                'menu_name' => 'APP Listings',
                'all_items' => 'All APP Listings',
                'edit_item' => 'Edit APP Listing',
                'view_item' => 'View APP Listing',
                'view_items' => 'View APP Listings',
                'add_new_item' => 'Add New APP Listing',
                'new_item' => 'New APP Listing',
                'parent_item_colon' => 'Parent APP Listing:',
                'search_items' => 'Search APP Listings',
                'not_found' => 'No app listings found',
                'not_found_in_trash' => 'No app listings found in Trash',
                'archives' => 'APP Listing Archives',
                'attributes' => 'APP Listing Attributes',
                'insert_into_item' => 'Insert into app listing',
                'uploaded_to_this_item' => 'Uploaded to this app listing',
                'filter_items_list' => 'Filter app listings list',
                'filter_by_date' => 'Filter app listings by date',
                'items_list_navigation' => 'APP Listings list navigation',
                'items_list' => 'APP Listings list',
                'item_published' => 'APP Listing published.',
                'item_published_privately' => 'APP Listing published privately.',
                'item_reverted_to_draft' => 'APP Listing reverted to draft.',
                'item_scheduled' => 'APP Listing scheduled.',
                'item_updated' => 'APP Listing updated.',
                'item_link' => 'APP Listing Link',
                'item_link_description' => 'A link to a app listing.',
            ),
            'public' => true,
            'show_in_rest' => true,
            'menu_position' => 6,
            'menu_icon' => 'dashicons-welcome-widgets-menus',
            'supports' => array(
                0 => 'title',
                1 => 'author',
                2 => 'editor',
                3 => 'excerpt',
                4 => 'thumbnail',
                5 => 'custom-fields',
            ),
            'taxonomies' => array(
                0 => 'tdtax_app_category',
                1 => 'tdtax_app_tag',
                2 => 'tdtax_app_location',
            ),
            'delete_with_user' => false,
        ) );

	}

	// register cptui taxonomies
	function cptui_register_my_taxes() {

        /**
         * Taxonomy: APP Listings - Categories
         */
        register_taxonomy( 'tdtax_app_category', array(
            0 => 'tdcpt_app_listing',
        ), array(
            'labels' => array(
                'name' => 'Categories',
                'singular_name' => 'Category',
                'menu_name' => 'APP Categories',
                'all_items' => 'All Categories',
                'edit_item' => 'Edit Category',
                'view_item' => 'View Category',
                'update_item' => 'Update Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => 'New Category Name',
                'parent_item' => 'Parent Category',
                'parent_item_colon' => 'Parent Category:',
                'search_items' => 'Search Categories',
                'not_found' => 'No categories found',
                'no_terms' => 'No categories',
                'filter_by_item' => 'Filter by category',
                'items_list_navigation' => 'Categories list navigation',
                'items_list' => 'Categories list',
                'back_to_items' => '← Go to categories',
                'item_link' => 'Category Link',
                'item_link_description' => 'A link to a category',
            ),
            'public' => true,
            'hierarchical' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        ) );

        /**
         * Taxonomy: APP Listings - Tags
         */
        register_taxonomy( 'tdtax_app_tag', array(
            0 => 'tdcpt_app_listing',
        ), array(
            'labels' => array(
                'name' => 'Tags',
                'singular_name' => 'Tag',
                'menu_name' => 'APP Tags',
                'all_items' => 'All Tags',
                'edit_item' => 'Edit Tag',
                'view_item' => 'View Tag',
                'update_item' => 'Update Tag',
                'add_new_item' => 'Add New Tag',
                'new_item_name' => 'New Tag Name',
                'search_items' => 'Search Tags',
                'popular_items' => 'Popular Tags',
                'separate_items_with_commas' => 'Separate tags with commas',
                'add_or_remove_items' => 'Add or remove tags',
                'choose_from_most_used' => 'Choose from the most used tags',
                'not_found' => 'No tags found',
                'no_terms' => 'No tags',
                'items_list_navigation' => 'Tags list navigation',
                'items_list' => 'Tags list',
                'back_to_items' => '← Go to tags',
                'item_link' => 'Tag Link',
                'item_link_description' => 'A link to a tag',
            ),
            'public' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        ) );

        /**
         * Taxonomy: APP Listings - Locations
         */
        register_taxonomy( 'tdtax_app_location', array(
            0 => 'tdcpt_app_listing',
        ), array(
            'labels' => array(
                'name' => 'Locations',
                'singular_name' => 'Location',
                'menu_name' => 'APP Locations',
                'all_items' => 'All Locations',
                'edit_item' => 'Edit Location',
                'view_item' => 'View Location',
                'update_item' => 'Update Location',
                'add_new_item' => 'Add New Location',
                'new_item_name' => 'New Location Name',
                'search_items' => 'Search Locations',
                'not_found' => 'No locations found',
                'no_terms' => 'No locations',
                'items_list_navigation' => 'Locations list navigation',
                'items_list' => 'Locations list',
                'back_to_items' => '← Go to locations',
                'item_link' => 'Location Link',
                'item_link_description' => 'A link to a location',
            ),
            'public' => true,
            'hierarchical' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        ) );

	}
}
