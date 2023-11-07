<?php
/*
Plugin Name: tagDiv Real Estate PRO Demo Plugin
Plugin URI: http://tagdiv.com
Description: tagDiv plugin with custom post types, taxonomies & custom fields and more for Real Estate PRO Demo.
Author: tagDiv
Version: 1.0.0
Author URI: http://tagdiv.com
*/

defined( 'ABSPATH' ) || exit;

// load demo custom modules & styles
require_once('td-real-estate-pro-demo-cm-styles.php');
new td_real_estate_pro_demo_cm_styles( dirname(__FILE__ ), plugins_url( __FILE__ ) );

add_action( 'tdc_init', function() {
	new td_real_estate_pro_demo_plugin();
}, 11 );


class td_real_estate_pro_demo_plugin {

	var $plugin_url = '';
	var $plugin_path = '';

    function __construct() {

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
         * Post Type: Properties.
         */

        $tdcpt_properties_labels = [
            "name" => esc_html__( "Properties", "newspaper" ),
            "singular_name" => esc_html__( "Property", "newspaper" ),
        ];
    
        $tdcpt_properties_args = [
            "label" => esc_html__( "Properties", "newspaper" ),
            "labels" => $tdcpt_properties_labels,
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
            "rewrite" => [ "slug" => "tdcpt_properties", "with_front" => true ],
            "query_var" => true,
            "menu_icon" => "dashicons-admin-multisite",
            "supports" => [ "title", "editor", "thumbnail", "custom-fields", "author" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "tdcpt_properties", $tdcpt_properties_args );
    }

	// register cptui taxonomies
	function cptui_register_my_taxes() {

        /**
         * Taxonomy: Property types.
         */
        $tdtax_property_types_labels = [
            "name" => esc_html__( "Property types", "newspaper" ),
            "singular_name" => esc_html__( "Property type", "newspaper" ),
        ];
        
        $tdtax_property_types_args = [
            "label" => esc_html__( "Property types", "newspaper" ),
            "labels" => $tdtax_property_types_labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_property_type', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_property_type",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        
        register_taxonomy( "tdtax_property_type", [ "tdcpt_properties" ], $tdtax_property_types_args );


        /**
         * Taxonomy: Transaction types.
         */
        $tdtax_transaction_types_labels = [
            "name" => esc_html__( "Transaction types", "newspaper" ),
            "singular_name" => esc_html__( "Transaction type", "newspaper" ),
        ];

        $tdtax_transaction_types_args = [
            "label" => esc_html__( "Transaction types", "newspaper" ),
            "labels" => $tdtax_transaction_types_labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_property_transaction', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_property_transaction",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        
        register_taxonomy( "tdtax_property_transaction", [ "tdcpt_properties" ], $tdtax_transaction_types_args );


        /**
         * Taxonomy: Locations.
         */
        $tdtax_locations_labels = [
            "name" => esc_html__( "Locations", "newspaper" ),
            "singular_name" => esc_html__( "Location", "newspaper" ),
        ];

        $tdtax_locations_args = [
            "label" => esc_html__( "Locations", "newspaper" ),
            "labels" => $tdtax_locations_labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_property_location', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_property_location",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];

        register_taxonomy( "tdtax_property_location", [ "tdcpt_properties" ], $tdtax_locations_args );

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



