<?php
/*
Plugin Name: Momentum PRO Plugin
Plugin URI: http://tagdiv.com
Description: tagDiv plugin for demos with custom post types & taxonomies
Author: tagDiv
Version: 1.0.0
Author URI: http://tagdiv.com
*/

defined( 'ABSPATH' ) || exit;

add_action( 'tdc_init', function() {
	new td_momentum_pro_demo_plugin();
}, 11 );

class td_momentum_pro_demo_plugin {

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
         * Post Type: case studies.
         */

        $labels = [
            "name" => esc_html__( "case studies", "newspaper" ),
            "singular_name" => esc_html__( "case_study", "newspaper" ),
            "menu_name" => esc_html__( "Case Studies", "newspaper" ),
            "all_items" => esc_html__( "All case studies", "newspaper" ),
            "add_new" => esc_html__( "Add new", "newspaper" ),
            "add_new_item" => esc_html__( "Add new case_study", "newspaper" ),
            "edit_item" => esc_html__( "Edit case_study", "newspaper" ),
            "new_item" => esc_html__( "New case_study", "newspaper" ),
            "view_item" => esc_html__( "View case_study", "newspaper" ),
            "view_items" => esc_html__( "View case studies", "newspaper" ),
            "search_items" => esc_html__( "Search case studies", "newspaper" ),
            "not_found" => esc_html__( "No case studies found", "newspaper" ),
            "not_found_in_trash" => esc_html__( "No case studies found in trash", "newspaper" ),
            "parent" => esc_html__( "Parent case_study:", "newspaper" ),
            "featured_image" => esc_html__( "Featured image for this case_study", "newspaper" ),
            "set_featured_image" => esc_html__( "Set featured image for this case_study", "newspaper" ),
            "remove_featured_image" => esc_html__( "Remove featured image for this case_study", "newspaper" ),
            "use_featured_image" => esc_html__( "Use as featured image for this case_study", "newspaper" ),
            "archives" => esc_html__( "case_study archives", "newspaper" ),
            "insert_into_item" => esc_html__( "Insert into case_study", "newspaper" ),
            "uploaded_to_this_item" => esc_html__( "Upload to this case_study", "newspaper" ),
            "filter_items_list" => esc_html__( "Filter case studies list", "newspaper" ),
            "items_list_navigation" => esc_html__( "case studies list navigation", "newspaper" ),
            "items_list" => esc_html__( "case studies list", "newspaper" ),
            "attributes" => esc_html__( "case studies attributes", "newspaper" ),
            "name_admin_bar" => esc_html__( "case_study", "newspaper" ),
            "item_published" => esc_html__( "case_study published", "newspaper" ),
            "item_published_privately" => esc_html__( "case_study published privately.", "newspaper" ),
            "item_reverted_to_draft" => esc_html__( "case_study reverted to draft.", "newspaper" ),
            "item_scheduled" => esc_html__( "case_study scheduled", "newspaper" ),
            "item_updated" => esc_html__( "case_study updated.", "newspaper" ),
            "parent_item_colon" => esc_html__( "Parent case_study:", "newspaper" ),
        ];

        $args = [
            "label" => esc_html__( "case studies", "newspaper" ),
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
            "hierarchical" => true,
            "can_export" => false,
            "rewrite" => [ "slug" => "tdcpt_case_studies", "with_front" => true ],
            "query_var" => true,
            "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "author", "page-attributes" ],
            "show_in_graphql" => false,
        ];

        register_post_type( "tdcpt_case_studies", $args );



	}

	// register cptui taxonomies
	function cptui_register_my_taxes() {
        /**
         * Taxonomy: Services.
         */

        $labels = [
            "name" => esc_html__( "Services", "newspaper" ),
            "singular_name" => esc_html__( "Service", "newspaper" ),
        ];


        $args = [
            "label" => esc_html__( "Services", "newspaper" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
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
        register_taxonomy( "tdtax_services", [ "tdcpt_case_studies" ], $args );

	}
}
