<?php

class tdb_module_template_part extends td_block {

    static $template_obj = null;
	static $template_class = '';
	static $post_obj = null;
	static $post_theme_settings_meta = array();

	static $style_selector = '';
	static $style_atts_uid = '';
	static $template_part_index = 0;

	/**
	 * We override the constructor function to get and set the data of the module
	 * template the current block is a part of
	 */
    function __construct() {

        $in_composer = tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe();

		/* -- Set module template data -- */
		global $tdb_module_template_params;

	    if ( !empty($tdb_module_template_params['template_obj']) ) {

		    self::$template_obj = $tdb_module_template_params['template_obj'];
		    self::$template_class = !$in_composer ? $tdb_module_template_params['template_class'] : '';
		    self::$post_obj = $tdb_module_template_params['post_obj'];

		    self::$post_theme_settings_meta = get_post_meta( self::$post_obj->ID, 'td_post_theme_settings', true );
		    if( empty( self::$post_theme_settings_meta ) ) {
			    self::$post_theme_settings_meta = array();
		    }
	    }
        // create a post obj for the unique posts filter
        $wp_post_obj = new stdClass();
        $wp_post_obj->ID = self::$post_obj->ID; // we add just the id for now @todo if we need other post properties set here..
        apply_filters( "td_wp_booster_module_constructor", $this, new WP_Post( $wp_post_obj ) );

	    // Set the current template part index, used for ensuring uniqueness between template parts of the same type
		self::set_template_part_index();

		// Set the template part unique style vars
		self::set_template_part_style_vars();

		/* -- Disable the loop block features -- */
		parent::disable_loop_block_features();

    }




    /**
	 * Override the parent get_block_classes to get rid of the unnecessary
	 * classes and introduce new specific ones for this type of block
     * @param array additional_classes_array
     * @return string
     */
    protected function get_block_classes( $additional_classes_array = array() ) {

	    $class = $this->get_att('class');
	    $el_class = $this->get_att('el_class');
	    $css = $this->get_att('css');
	    $tdc_css = $this->get_att('tdc_css');

	    $block_class = 'td_block_wrap';

        if ( td_global::get_in_element() && ( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() ) ) {
		    $block_class .= '-composer';
        }


        //add the block wrap and block id class
        $block_classes = array(
            $block_class,
	        get_class($this),
            get_class($this) . '_' . self::$template_part_index
        );


	    // get the design tab css classes
	    $css_classes_array = $this->parse_css_att($css);
	    if ( $css_classes_array !== false ) {
		    $block_classes = array_merge (
			    $block_classes,
			    $css_classes_array
		    );
	    }

	    $css_classes_array = $this->parse_css_att($tdc_css);
	    if ( $css_classes_array !== false ) {
		    $block_classes = array_merge (
			    $block_classes,
			    $css_classes_array
		    );
	    }


	    //add the classes that we receive via shortcode. @17 aug 2016 - this att may be used internally - by ra
        if (!empty($class)) {
            $class_array = explode(' ', $class);
            $block_classes = array_merge (
                $block_classes,
                $class_array
            );
        }

        //marge the additional classes received from blocks code
        if (!empty($additional_classes_array)) {
            $block_classes = array_merge (
                $block_classes,
                $additional_classes_array
            );
        }

	    // this is the field that all the shortcodes have (or at least should have)
	    if (!empty($el_class)) {
		    $el_class_array = explode(' ', $el_class);
		    $block_classes = array_merge (
			    $block_classes,
			    $el_class_array
		    );
	    }


        //remove duplicates
        $block_classes = array_unique($block_classes);

	    return implode(' ', $block_classes);

    }




	/**
	 * Method used to set the template part's index
	 */
	function set_template_part_index() {

		global $tdb_module_template_params;

		if( isset( $tdb_module_template_params['shortcodes'][get_class($this)] ) ) {
			$tdb_module_template_params['shortcodes'][get_class($this)]++;
		} else {
			$tdb_module_template_params['shortcodes'][get_class($this)] = 0;
		}

		self::$template_part_index = $tdb_module_template_params['shortcodes'][get_class($this)];


		/* -- In composer, add an extra random string to ensure uniqueness -- */
		if( tdc_state::is_live_editor_ajax() || tdc_state::is_live_editor_iframe() || is_admin() ) {
			$uniquid = uniqid();
			$newuniquid = '';
			while ( strlen( $newuniquid ) < 3 ) {
				$newuniquid .= $uniquid[rand(0, 12)];
			}

			self::$template_part_index .= '_' . $newuniquid;
		}

	}




	/**
	 * Method used to set the template part's style vars
	 */
	function set_template_part_style_vars() {

		/* -- Set the css selector used for outputing the style generated by -- */
		/* -- the attributes of the template part -- */
		self::$style_selector = !empty( self::$template_class ) ? self::$template_class . ' .' : '';

		$in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
		if( $in_element && $in_composer ) {
			self::$style_selector .= 'tdc-row-composer .';
		} else if( $in_element || $in_composer ) {
			self::$style_selector .= 'tdc-row .';
		}

		self::$style_selector .= get_class($this) . '_' . self::$template_part_index;

        

		/* -- Set uid used by the style attributes, to prevent conflicts -- */
		/* -- between template parts of the same type -- */
		self::$style_atts_uid = ( !empty( self::$template_class ) ? self::$template_class . '_' : '' ) . get_class($this) . '_' . self::$template_part_index;

	}




    /**
	 * Method used to read a post theme settings meta value
     * @param string $key
     * @param string $default the default value if we don't have one
     * @return mixed|string
     */
	function read_post_theme_settings_meta($key, $default = '') {
        if ( !empty( self::$post_theme_settings_meta[$key] ) ) {
            return self::$post_theme_settings_meta[$key];
        }

        return $default;
    }

}