<?php
/*
Plugin Name: Cali Sight Plugin
Plugin URI: http://tagdiv.com
Description: tagDiv plugin for demos with custom post types & taxonomies
Author: tagDiv
Version: 1.0.0
Author URI: http://tagdiv.com
*/

defined( 'ABSPATH' ) || exit;

add_action( 'tdc_init', function() {
	new td_cali_sight_demo_plugin();
}, 11 );

class td_cali_sight_demo_plugin {

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
             * Post Type: Tourism.
             */

            $labels = [
                "name" => esc_html__( "Tourism", "newspaper" ),
                "singular_name" => esc_html__( "Tourism", "newspaper" ),
                "menu_name" => esc_html__( "My Tourism", "newspaper" ),
                "all_items" => esc_html__( "All Tourism", "newspaper" ),
                "add_new" => esc_html__( "Add new", "newspaper" ),
                "add_new_item" => esc_html__( "Add new Tourism", "newspaper" ),
                "edit_item" => esc_html__( "Edit Tourism", "newspaper" ),
                "new_item" => esc_html__( "New Tourism", "newspaper" ),
                "view_item" => esc_html__( "View Tourism", "newspaper" ),
                "view_items" => esc_html__( "View Tourism", "newspaper" ),
                "search_items" => esc_html__( "Search Tourism", "newspaper" ),
                "not_found" => esc_html__( "No Tourism found", "newspaper" ),
                "not_found_in_trash" => esc_html__( "No Tourism found in trash", "newspaper" ),
                "parent" => esc_html__( "Parent Tourism:", "newspaper" ),
                "featured_image" => esc_html__( "Featured image for this Tourism", "newspaper" ),
                "set_featured_image" => esc_html__( "Set featured image for this Tourism", "newspaper" ),
                "remove_featured_image" => esc_html__( "Remove featured image for this Tourism", "newspaper" ),
                "use_featured_image" => esc_html__( "Use as featured image for this Tourism", "newspaper" ),
                "archives" => esc_html__( "Tourism archives", "newspaper" ),
                "insert_into_item" => esc_html__( "Insert into Tourism", "newspaper" ),
                "uploaded_to_this_item" => esc_html__( "Upload to this Tourism", "newspaper" ),
                "filter_items_list" => esc_html__( "Filter Tourism list", "newspaper" ),
                "items_list_navigation" => esc_html__( "Tourism list navigation", "newspaper" ),
                "items_list" => esc_html__( "Tourism list", "newspaper" ),
                "attributes" => esc_html__( "Tourism attributes", "newspaper" ),
                "name_admin_bar" => esc_html__( "Tourism", "newspaper" ),
                "item_published" => esc_html__( "Tourism published", "newspaper" ),
                "item_published_privately" => esc_html__( "Tourism published privately.", "newspaper" ),
                "item_reverted_to_draft" => esc_html__( "Tourism reverted to draft.", "newspaper" ),
                "item_scheduled" => esc_html__( "Tourism scheduled", "newspaper" ),
                "item_updated" => esc_html__( "Tourism updated.", "newspaper" ),
                "parent_item_colon" => esc_html__( "Parent Tourism:", "newspaper" ),
            ];

            $args = [
                "label" => esc_html__( "Tourism", "newspaper" ),
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
                "rewrite" => [ "slug" => "tdcpt_tourism", "with_front" => true ],
                "query_var" => true,
                "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions" ],
                "show_in_graphql" => false,
            ];

            register_post_type( "tdcpt_tourism", $args );
    }


	// register cptui taxonomies
    function cptui_register_my_taxes() {

        /**
         * Taxonomy: Attractions.
         */

        $labels = [
            "name" => esc_html__( "Attractions", "newspaper" ),
            "singular_name" => esc_html__( "Attraction", "newspaper" ),
            "menu_name" => esc_html__( "Attractions", "newspaper" ),
            "all_items" => esc_html__( "All Attractions", "newspaper" ),
            "edit_item" => esc_html__( "Edit Attraction", "newspaper" ),
            "view_item" => esc_html__( "View Attraction", "newspaper" ),
            "update_item" => esc_html__( "Update Attraction name", "newspaper" ),
            "add_new_item" => esc_html__( "Add new Attraction", "newspaper" ),
            "new_item_name" => esc_html__( "New Attraction name", "newspaper" ),
            "parent_item" => esc_html__( "Parent Attraction", "newspaper" ),
            "parent_item_colon" => esc_html__( "Parent Attraction:", "newspaper" ),
            "search_items" => esc_html__( "Search Attractions", "newspaper" ),
            "popular_items" => esc_html__( "Popular Attractions", "newspaper" ),
            "separate_items_with_commas" => esc_html__( "Separate Attractions with commas", "newspaper" ),
            "add_or_remove_items" => esc_html__( "Add or remove Attractions", "newspaper" ),
            "choose_from_most_used" => esc_html__( "Choose from the most used Attractions", "newspaper" ),
            "not_found" => esc_html__( "No Attractions found", "newspaper" ),
            "no_terms" => esc_html__( "No Attractions", "newspaper" ),
            "items_list_navigation" => esc_html__( "Attractions list navigation", "newspaper" ),
            "items_list" => esc_html__( "Attractions list", "newspaper" ),
            "back_to_items" => esc_html__( "Back to Attractions", "newspaper" ),
            "name_field_description" => esc_html__( "The name is how it appears on your site.", "newspaper" ),
            "parent_field_description" => esc_html__( "Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "newspaper" ),
            "slug_field_description" => esc_html__( "The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "newspaper" ),
            "desc_field_description" => esc_html__( "The description is not prominent by default; however, some themes may show it.", "newspaper" ),
        ];


        $args = [
            "label" => esc_html__( "Attractions", "newspaper" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'tdtax_attractions', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "show_tagcloud" => false,
            "rest_base" => "tdtax_attractions",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "rest_namespace" => "wp/v2",
            "show_in_quick_edit" => false,
            "sort" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "tdtax_attractions", [ "tdcpt_tourism" ], $args );
    }

}
