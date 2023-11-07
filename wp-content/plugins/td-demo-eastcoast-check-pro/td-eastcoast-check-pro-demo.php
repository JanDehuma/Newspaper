<?php
/*
Plugin Name: tagDiv EastCoast Check PRO Demo Plugin
Plugin URI: http://tagdiv.com
Description: tagDiv plugin with custom post types, taxonomies & custom fields and more for EastCoast Check PRO Demo.
Author: tagDiv
Version: 1.0.0
Author URI: http://tagdiv.com
*/

defined( 'ABSPATH' ) || exit;

// load demo custom modules & styles
require_once('td-eastcoast-check-pro-demo-cm-styles.php');
new td_eastcoast_check_pro_demo_cm_styles( dirname(__FILE__ ), plugins_url( __FILE__ ) );

add_action( 'tdc_init', function() {
	new td_eastcoast_check_pro_demo_plugin();
}, 11 );

class td_eastcoast_check_pro_demo_plugin {

	var $plugin_url = '';
	var $plugin_path = '';

	public function __construct() {
		$this->plugin_url = plugins_url(__FILE__ );
		$this->plugin_path = dirname(__FILE__ );

		/**
		 * example on how to add new custom filter option for tdb_filters_loop_sorting_options shortcode
		 */

		// this adds sorting options for dropwdown & composer
		//add_filter( 'tdb_filters_loop_sorting_options', function ( $options ) {
		//
		//	// new custom sorting options
		//	$new_custom_sorting_options = array(
		//		'Caca order' => 'caca_order',
		//		'Hello World' => 'hello_world',
		//		'Lorem Ipsum' => 'lorem_ips'
		//	);
		//
		//	return array_merge(
		//		$options,
		//		$new_custom_sorting_options
		//	);
		//
		//});

		// this adds filter functionality for td query
		//add_filter( 'td_data_source_blocks_query_args', function ( $args, $atts ) {
		//
		//	// block type
		//	$block_type = $atts['block_type'] ?? null;
		//
		//	// get block sort
		//	$sort = $atts['sort'] ?? '';
		//
		//	// apply it on `tdb_filters_loop` blocks
		//	if ( $block_type === 'tdb_filters_loop' ) {
		//
		//		// set `caca_order` wp query args
		//		if ( $sort === 'caca_order' ) {
		//			$args['meta_key'] = 'tdcf_test_field';
		//			$args['orderby'] = 'meta_value_num';
		//			$args['order'] = 'ASC';
		//		}
		//
		//	}
		//
		//	return $args;
		//
		//}, 10, 2 );

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

		// sync json acf-json fields @see td-eastcoast-check-pro-demo/includes/acf-json
		add_action( 'admin_init', array( $this, 'sync_acf_fields' ) );

		/**
		 * CPT UI
		 */
		add_action( 'after_setup_theme',  function () {
            // we need priority 9, to avoid invalid tax error
            add_action( 'init', array( $this, 'cptui_register_my_cpts' ), 9 );
			add_action( 'init', array( $this, 'cptui_register_my_taxes' ), 9 );
		});

		// load plugin's config/shortcodes
		add_action( 'tdc_loaded', array( $this, 'td_demo_plugin_config' ), 10 );

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
         * Post Type: directories.
         */

        $labels = [
            "name" => __( "directories", "newspaper" ),
            "singular_name" => __( "directory", "newspaper" ),
            "menu_name" => __( "My Directories", "newspaper" ),
            "all_items" => __( "All directories", "newspaper" ),
            "add_new" => __( "Add new", "newspaper" ),
            "add_new_item" => __( "Add new directory", "newspaper" ),
            "edit_item" => __( "Edit directory", "newspaper" ),
            "new_item" => __( "New directory", "newspaper" ),
            "view_item" => __( "View directory", "newspaper" ),
            "view_items" => __( "View directories", "newspaper" ),
            "search_items" => __( "Search directories", "newspaper" ),
            "not_found" => __( "No directories found", "newspaper" ),
            "not_found_in_trash" => __( "No directories found in bin", "newspaper" ),
            "parent" => __( "Parent directory:", "newspaper" ),
            "featured_image" => __( "Featured image for this directory", "newspaper" ),
            "set_featured_image" => __( "Set featured image for this directory", "newspaper" ),
            "remove_featured_image" => __( "Remove featured image for this directory", "newspaper" ),
            "use_featured_image" => __( "Use as featured image for this directory", "newspaper" ),
            "archives" => __( "directory archives", "newspaper" ),
            "insert_into_item" => __( "Insert into directory", "newspaper" ),
            "uploaded_to_this_item" => __( "Upload to this directory", "newspaper" ),
            "filter_items_list" => __( "Filter directories list", "newspaper" ),
            "items_list_navigation" => __( "directories list navigation", "newspaper" ),
            "items_list" => __( "directories list", "newspaper" ),
            "attributes" => __( "directories attributes", "newspaper" ),
            "name_admin_bar" => __( "directory", "newspaper" ),
            "item_published" => __( "directory published", "newspaper" ),
            "item_published_privately" => __( "directory published privately.", "newspaper" ),
            "item_reverted_to_draft" => __( "directory reverted to draft.", "newspaper" ),
            "item_scheduled" => __( "directory scheduled", "newspaper" ),
            "item_updated" => __( "directory updated.", "newspaper" ),
            "parent_item_colon" => __( "Parent directory:", "newspaper" ),
        ];

        $args = [
            "label" => __( "directories", "newspaper" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => false,
            "rewrite" => [ "slug" => "tdcpt_directories", "with_front" => true ],
            "query_var" => true,
            "supports" => [ "title", "editor", "thumbnail", "custom-fields", "comments" ],
            "show_in_graphql" => false,
        ];

        register_post_type( "tdcpt_directories", $args );
    }

	// register cptui taxonomies
	function cptui_register_my_taxes() {

        /**
         * Taxonomy: services.
         */

        $labels = [
            "name" => __( "services", "newspaper" ),
            "singular_name" => __( "services", "newspaper" ),
            "menu_name" => __( "Services", "newspaper" ),
            "all_items" => __( "All services", "newspaper" ),
            "edit_item" => __( "Edit services", "newspaper" ),
            "view_item" => __( "View services", "newspaper" ),
            "update_item" => __( "Update services name", "newspaper" ),
            "add_new_item" => __( "Add new services", "newspaper" ),
            "new_item_name" => __( "New services name", "newspaper" ),
            "parent_item" => __( "Parent services", "newspaper" ),
            "parent_item_colon" => __( "Parent services:", "newspaper" ),
            "search_items" => __( "Search services", "newspaper" ),
            "popular_items" => __( "Popular services", "newspaper" ),
            "separate_items_with_commas" => __( "Separate services with commas", "newspaper" ),
            "add_or_remove_items" => __( "Add or remove services", "newspaper" ),
            "choose_from_most_used" => __( "Choose from the most used services", "newspaper" ),
            "not_found" => __( "No services found", "newspaper" ),
            "no_terms" => __( "No services", "newspaper" ),
            "items_list_navigation" => __( "services list navigation", "newspaper" ),
            "items_list" => __( "services list", "newspaper" ),
            "back_to_items" => __( "Back to services", "newspaper" ),
            "name_field_description" => __( "The name is how it appears on your site.", "newspaper" ),
            "parent_field_description" => __( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "newspaper" ),
            "slug_field_description" => __( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "newspaper" ),
            "desc_field_description" => __( "The description is not prominent by default; however, some themes may show it.", "newspaper" ),
        ];


        $args = [
            "label" => __( "services", "newspaper" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_services', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_services",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "tdtax_services", [ "tdcpt_directories" ], $args );

        /**
         * Taxonomy: locations.
         */

        $labels = [
            "name" => __( "locations", "newspaper" ),
            "singular_name" => __( "location", "newspaper" ),
            "menu_name" => __( "Locations", "newspaper" ),
            "all_items" => __( "All locations", "newspaper" ),
            "edit_item" => __( "Edit location", "newspaper" ),
            "view_item" => __( "View location", "newspaper" ),
            "update_item" => __( "Update location name", "newspaper" ),
            "add_new_item" => __( "Add new location", "newspaper" ),
            "new_item_name" => __( "New location name", "newspaper" ),
            "parent_item" => __( "Parent location", "newspaper" ),
            "parent_item_colon" => __( "Parent location:", "newspaper" ),
            "search_items" => __( "Search locations", "newspaper" ),
            "popular_items" => __( "Popular locations", "newspaper" ),
            "separate_items_with_commas" => __( "Separate locations with commas", "newspaper" ),
            "add_or_remove_items" => __( "Add or remove locations", "newspaper" ),
            "choose_from_most_used" => __( "Choose from the most used locations", "newspaper" ),
            "not_found" => __( "No locations found", "newspaper" ),
            "no_terms" => __( "No locations", "newspaper" ),
            "items_list_navigation" => __( "locations list navigation", "newspaper" ),
            "items_list" => __( "locations list", "newspaper" ),
            "back_to_items" => __( "Back to locations", "newspaper" ),
            "name_field_description" => __( "The name is how it appears on your site.", "newspaper" ),
            "parent_field_description" => __( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "newspaper" ),
            "slug_field_description" => __( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "newspaper" ),
            "desc_field_description" => __( "The description is not prominent by default; however, some themes may show it.", "newspaper" ),
        ];


        $args = [
            "label" => __( "locations", "newspaper" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_locations', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_locations",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "tdtax_locations", [ "tdcpt_directories" ], $args );
    }

    public function td_demo_plugin_config() {

		//td_api_block::add( 'td_demo_plugin_shortcode',
		//	array(
		//		"map_in_td_composer" => true,
		//		"name" => 'TD Demo Plugin',
		//		"base" => 'td_demo_plugin',
		//		'tdc_category' => 'Single post',
		//		"file" => $this->plugin_path . '/includes/shortcodes/td_demo_plugin_shortcode.php',
		//		"params" => array(),
		//	)
		//);

	}

}
