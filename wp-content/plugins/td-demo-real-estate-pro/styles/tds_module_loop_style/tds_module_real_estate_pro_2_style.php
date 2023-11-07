<?php

/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */
class tds_module_real_estate_pro_2_style extends td_style {

    private $unique_block_class;
    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct($atts, $unique_block_class = '', $index_style = '') {
        $this->atts = $atts;
        $this->unique_block_class = $unique_block_class;
        $this->index_style = $index_style;
    }

    private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

        $in_composer = td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax();
        $in_element = td_global::get_in_element();
        $unique_block_class_prefix = '';
        if ($in_element || $in_composer) {
            $unique_block_class_prefix = 'tdc-row .';

            if ($in_element && $in_composer) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->unique_block_class;

        $unique_block_modal_class = $this->unique_block_class . '_m';


        $raw_css =
            "<style>
			
			    /* @style_specific_tds_module_real_estate_pro_2_style */
                .tds_module_real_estate_pro_2_style .td-post-author-name,
                .tds_module_real_estate_pro_2_style .td-post-date,
                .tds_module_real_estate_pro_2_style .td-module-comments {
                  vertical-align: text-top;
                }
                .tds_module_real_estate_pro_2_style .entry-review-stars {
                  margin-left: 6px;
                  vertical-align: text-bottom;
                }
                .tds_module_real_estate_pro_2_style .td-author-photo {
                  display: inline-block;
                  vertical-align: middle;
                }
                .tds_module_real_estate_pro_2_style .td-author-photo img {
                    width: 20px;
                    height: 20px;
                    margin-right: 6px;
                    border-radius: 50%;
                    vertical-align: middle;
                }
                .tds_module_real_estate_pro_2_style .td-module-title {
                  font-family: 'Roboto', sans-serif;
                  font-weight: 400;
                  font-size: 21px;
                  line-height: 25px;
                  margin: 0 0 6px 0;
                }
                @media (min-width: 768px) and (max-width: 1018px) {
                  .tds_module_real_estate_pro_2_style .td-module-title {
                    font-size: 17px;
                    line-height: 22px;
                  }
                }
                .tds_module_real_estate_pro_2_style .td-custom-fields-wrapp {
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field {
                    display: flex;
                    flex-wrap: wrap;
                    width: 33.3333%;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field-value {
                    display: flex;
                    align-items: center;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field-value-icon {
                    display: flex;
                    height: 20px;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field-value-icon svg {
                    display: block;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field-value-text {
                    flex: 1;
                }
                .tds_module_real_estate_pro_2_style .td-custom-field-label {
                    width: 100%;
                }
                .tds_module_real_estate_pro_2_style .td-next-prev-wrap {
                    display: flex;
                    justify-content: space-between;
                }
                .tds_module_real_estate_pro_2_style .td-next-prev-wrap a {
                    margin: 0;
                }
                .tds_module_real_estate_pro_2_style .td-next-prev-wrap i {
                    display: block;
                }
                .tds_module_real_estate_pro_2_style .td-location {
                    display: flex;
                }
                .tds_module_real_estate_pro_2_style .td-location-icon {
                    position: relative;
                    margin-right: 5px;
                }
                .tds_module_real_estate_pro_2_style .td-location-icon svg {
                    display: block;
                    width: 10px;
                    height: auto;
                }
                .tds_module_real_estate_pro_2_style .td-location-txt {
                    flex: 1;
                }
                .tds_module_real_estate_pro_2_style .td-price-wrapp {
                    display: flex;
                    align-items: center;
                }
                .tds_module_real_estate_pro_2_style .td-price {
                    flex: 1;
                }
			    

				/* @container_width */
				.$unique_block_class {
					width: @container_width; float: left;
				}
				.$unique_block_class:after {
				    content: '';
				    display: table;
				    clear: both;    
                }
                
				/* @modules_on_row */
				.$unique_block_class .td_module_wrap {
					width: @modules_on_row;
				}
				/* @clearfix_desktop */
				.$unique_block_class .td_module_wrap:nth-child(@clearfix_desktop) {
					clear: both;
				}
				/* @clearfix */
				.$unique_block_class .td_module_wrap {
					clear: none !important;
				}
				.$unique_block_class .td_module_wrap:nth-child(@clearfix) {
					clear: both !important;
				}
				/* @padding_desktop */
				.$unique_block_class .td_module_wrap:nth-last-child(@padding_desktop) {
					margin-bottom: 0;
					padding-bottom: 0;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding_desktop) .td-module-container:before {
					display: none;
				}
				/* @padding */
				.$unique_block_class .td_module_wrap {
					padding-bottom: @all_modules_space !important;
					margin-bottom: @all_modules_space !important;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding) {
					margin-bottom: 0 !important;
					padding-bottom: 0 !important;
				}
				.$unique_block_class .td_module_wrap .td-module-container:before {
					display: block !important;
				}
				.$unique_block_class .td_module_wrap:nth-last-child(@padding) .td-module-container:before {
					display: none !important;
				}
				/* @modules_gap */
				.$unique_block_class .td_module_wrap {
					padding-left: @modules_gap;
					padding-right: @modules_gap;
				}
				.$unique_block_class .td_block_inner {
					margin-left: -@modules_gap;
					margin-right: -@modules_gap;
				}
				/* @m_padding */
				.$unique_block_class .td-module-container {
					padding: @m_padding;
				}
				/* @all_modules_space */
				.$unique_block_class .td_module_wrap {
					padding-bottom: @all_modules_space;
					margin-bottom: @all_modules_space;
				}
				.$unique_block_class .td-module-container:before {
					bottom: -@all_modules_space;
				}
				/* @modules_border_size */
				.$unique_block_class .td-module-container {
				    border-width: @modules_border_size;
				    border-style: solid;
				    border-color: #000;
				}
				/* @modules_border_style */
				.$unique_block_class .td-module-container {
				    border-style: @modules_border_style;
				}
				/* @m_radius */
				.$unique_block_class .td-module-container {
					border-radius: @m_radius;
				}
				/* @modules_divider */
				.$unique_block_class .td-module-container:before {
					border-width: 0 0 1px 0;
					border-style: @modules_divider;
					border-color: #eaeaea;
				}
				
				/* @m_bg */
				.$unique_block_class .td-module-container {
					background-color: @m_bg;
				}
				/* @shadow */
				.$unique_block_class .td-module-container {
				    box-shadow: @shadow;
				}
				/* @modules_border_color */
				.$unique_block_class .td-module-container {
				    border-color: @modules_border_color;
				}
				/* @modules_divider_color */
				.$unique_block_class .td-module-container:before {
					border-color: @modules_divider_color;
				}
				
				
				/* @image_height */
				.$unique_block_class .td-image-wrap {
					padding-bottom: @image_height;
				}
				/* @image_width */
				.$unique_block_class .td-image-container {
				 	flex: 0 0 @image_width;
				 	width: @image_width;
			    }
				.ie10 .$unique_block_class .td-image-container,
				.ie11 .$unique_block_class .td-image-container {
				 	flex: 0 0 auto;
			    }
				/* @no_float */
				.$unique_block_class .td-module-container {
					flex-direction: column;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 0;
                }
                .ie10 .$unique_block_class .td-module-meta-info,
				.ie11 .$unique_block_class .td-module-meta-info {
				 	flex: auto;
			    }
				/* @float_left */
				.$unique_block_class .td-module-container {
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 0;
                }
                .ie10 .$unique_block_class .td-module-meta-info,
				.ie11 .$unique_block_class .td-module-meta-info {
				 	flex: 1;
			    }
				/* @float_right */
				.$unique_block_class .td-module-container {
					flex-direction: row;
				}
                .$unique_block_class .td-image-container {
                	display: block; order: 1;
                }
                .$unique_block_class .td-module-meta-info {
                	flex: 1;
                }
                /* @hide_desktop */
                .$unique_block_class .td-image-container {
                	display: none;
                }
                .$unique_block_class .entry-thumb {
                	background-image: none !important;
                }
				/* @hide */
				.$unique_block_class .td-image-container {
					display: none;
				}
				/* @image_radius */
				.$unique_block_class .entry-thumb,
				.$unique_block_class .entry-thumb:before,
				.$unique_block_class .entry-thumb:after {
					border-radius: @image_radius;
				}
				
				/* @mix_type */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    content: '';
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    opacity: 1;
                    transition: opacity 1s ease;
                    -webkit-transition: opacity 1s ease;
                    mix-blend-mode: @mix_type;
                }
                /* @color */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    background: @color;
                }
                /* @mix_gradient */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:before {
                    @mix_gradient;
                }
                /* @mix_type_h */
                @media (min-width: 1141px) {
                    html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                        content: '';
                        width: 100%;
                        height: 100%;
                        position: absolute;
                        top: 0;
                        left: 0;
                        opacity: 0;
                        transition: opacity 1s ease;
                        -webkit-transition: opacity 1s ease;
                        mix-blend-mode: @mix_type_h;
                    }
                    html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb:after {
                        opacity: 1;
                    }
                }
                /* @color_h */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                    background: @color_h;
                }
                /* @mix_gradient_h */
                html:not([class*='ie']) .$unique_block_class .entry-thumb:after {
                    @mix_gradient_h;
                }
                /* @mix_type_off */
                html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb:before {
                    opacity: 0;
                }
                /* @effect_on */
                html:not([class*='ie']) .$unique_block_class .entry-thumb {
                    filter: @fe_brightness @fe_contrast @fe_saturate;
                    transition: all 1s ease;
                    -webkit-transition: all 1s ease;
                }
                /* @effect_on_h */
                @media (min-width: 1141px) {
                    html:not([class*='ie']) .$unique_block_class .td-module-container:hover .entry-thumb {
                        filter: @fe_brightness_h @fe_contrast_h @fe_saturate_h;
                    }
                }
                
                
                /* @excl_show */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    display: @excl_show;
                }
                /* @excl_txt */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    content: '@excl_txt';
                }
                /* @excl_margin */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    margin: @excl_margin;
                }
                /* @excl_padd */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    padding: @excl_padd;
                }
                /* @all_excl_border */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border: @all_excl_border @all_excl_border_style @all_excl_border_color;
                }
                /* @excl_radius */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    border-radius: @excl_radius;
                }
                
                /* @excl_color */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    color: @excl_color;
                }
                /* @excl_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    color: @excl_color_h;
                }
                /* @excl_bg */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    background-color: @excl_bg;
                }
                /* @excl_bg_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    background-color: @excl_bg_h;
                }
                /* @excl_border_color_h */
                .$unique_block_class .td-module-exclusive:hover .td-module-title a:before {
                    border-color: @excl_border_color_h;
                }
                
                /* @f_excl */
                .$unique_block_class .td-module-exclusive .td-module-title a:before {
                    @f_excl
                }
                
                /* @meta_info_align */
				.$unique_block_class .td-module-meta-info {
				    display: flex;
				    flex-direction: column;
					justify-content: @meta_info_align;
				}
				.$unique_block_class .td-category-pos-above .td-post-category {
				    align-self: flex-start;
				}
				/* @align_category_top */
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: 0;
					bottom: auto;
				}
				.$unique_block_class .td-post-vid-time {
					top: 0;
					bottom: auto;
				}
				/* @align_category_bottom */
				.$unique_block_class .td-image-container {
				    order: 0;
				}
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					top: auto;
				 	bottom: 0;
			    }
				.$unique_block_class .td-post-vid-time {
					top: auto;
					bottom: 0;
				}
				/* @meta_info_align_top */
				.$unique_block_class .td-image-container {
					order: 1;
				}
				.$unique_block_class .td-module-meta-info {
				    flex: 1;
				}
				/* @meta_horiz_align_center */
				.$unique_block_class .td-module-meta-info {
					text-align: center;
				}
				.$unique_block_class .td-image-container {
					margin-left: auto;
                    margin-right: auto;
				}
				.$unique_block_class .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
					left: 50%;
					transform: translateX(-50%);
					-webkit-transform: translateX(-50%);
				}
				.$unique_block_class.td-h-effect-up-shadow .td_module_wrap:hover .td-category-pos-image .td-post-category:not(.td-post-extra-category) {
				    transform: translate(-50%, -2px);
					-webkit-transform: translate(-50%, -2px);
				}
				/* @meta_horiz_align_right */
				.$unique_block_class .td-module-meta-info {
					text-align: right;
				}
				/* @meta_width */
				.$unique_block_class .td-module-meta-info {
					max-width: @meta_width;
				}
				/* @meta_margin */
				.$unique_block_class .td-module-meta-info {
					margin: @meta_margin;
				}
				/* @meta_padding */
				.$unique_block_class .td-module-meta-info {
					padding: @meta_padding;
				}
                /* @meta_space */
                .$unique_block_class .td-editor-date {
                    margin: @meta_space;
                }
				/* @meta_info_border_size */
				.$unique_block_class .td-module-meta-info {
					border-width: @meta_info_border_size;
				}
				/* @meta_info_border_style */
				.$unique_block_class .td-module-meta-info {
					border-style: @meta_info_border_style;
				}
				/* @meta_info_border_radius */
				.$unique_block_class .td-module-meta-info {
					border-radius: @meta_info_border_radius;
				}
				
				/* @meta_bg_solid */
				.$unique_block_class .td-module-meta-info {
					background-color: @meta_bg_solid;
				}
				/* @meta_bg_gradient */
				.$unique_block_class .td-module-meta-info {
					@meta_bg_gradient;
				}
				/* @shadow_m */
				.$unique_block_class .td-module-meta-info {
				    box-shadow: @shadow_m;
				}
				/* @meta_info_border_color */
				.$unique_block_class .td-module-meta-info {
					border-color: @meta_info_border_color;
				}
				
				/* @f_meta */
				.$unique_block_class .td-author-date,
				.$unique_block_class .td-author-photo,
				.$unique_block_class .td-post-author-name a,
				.$unique_block_class .td-author-date .entry-date,
				.$unique_block_class .td-module-comments a {
					@f_meta
				}
				
				
				/* @art_title */
				.$unique_block_class .entry-title {
					margin: @art_title;
				}
                /* @all_underline_height */
                .$unique_block_class .td-module-container:hover .td-module-title a {
                    box-shadow: inset 0 -@all_underline_height 0 0 @all_underline_color;
                }
                
				/* @title_txt */
				.$unique_block_class .td-module-title a {
					color: @title_txt;
				}
				/* @title_txt_hover */
				.$unique_block_class .td_module_wrap:hover .td-module-title a {
					color: @title_txt_hover;
				}
				/* @all_underline_color */
                @media (min-width: 768px) {
                    .$unique_block_class .td-module-title a {
                        transition: all 0.2s ease;
                        -webkit-transition: all 0.2s ease;
                    }
                }
                .$unique_block_class .td-module-title a {
                    box-shadow: inset 0 0 0 0 @all_underline_color;
                }
                
				/* @f_title */
				.$unique_block_class .entry-title {
					@f_title
				}
                
				
				
				/* @show_loc */
				body .$unique_block_class .td-location {
					display: @show_loc;
				}
				/* @loc_margin */
				body .$unique_block_class .td-location {
					margin: @loc_margin;
				}
				/* @loc_padd */
				body .$unique_block_class .td-location {
					padding: @loc_padd;
				}
				
				/* @loc_ico_size */
				body .$unique_block_class .td-location-icon svg {
					width: @loc_ico_size;
				}
				/* @loc_ico_space */
				body .$unique_block_class .td-location-icon {
					margin-right: @loc_ico_space;
				}
				/* @loc_ico_align */
				body .$unique_block_class .td-location-icon {
					top: @loc_ico_align;
				}
				
				/* @loc_txt_color */
				body .$unique_block_class .td-location {
					color: @loc_txt_color;
				}
				body .$unique_block_class .td-location-icon svg {
					fill: @loc_txt_color;
				}
				/* @loc_ico_color */
				body .$unique_block_class .td-location-icon svg {
					fill: @loc_ico_color;
				}
				
				/* @f_loc */
				body .$unique_block_class .td-location {
					@f_loc
				}
                
				
				
				/* @show_cf */
				body .$unique_block_class .td-custom-fields-wrapp {
					display: @show_cf;
				}
				/* @cf_margin */
				body .$unique_block_class .td-custom-fields-wrapp {
					margin: @cf_margin;
				}
				/* @cf_padd */
				body .$unique_block_class .td-custom-fields-wrapp {
					padding: @cf_padd;
				}
				/* @all_cf_border_size */
				body .$unique_block_class .td-custom-fields-wrapp {
					border-width: @all_cf_border_size;
					border-style: @all_cf_border_style;
					border-color: @all_cf_border_color;
				}
				
				/* @cf_ico_size */
				body .$unique_block_class .td-custom-field-value-icon {
					height: @cf_ico_size;
				}
				/* @cf_ico_space */
				body .$unique_block_class .td-custom-field-value-icon {
					margin-right: @cf_ico_space;
				}
				
				/* @cf_label_space */
				body .$unique_block_class .td-custom-field-label {
					margin-top: @cf_label_space;
				}
				
				/* @cf_ico_space */
				body .$unique_block_class .td-custom-field-value-icon {
					margin-right: @cf_ico_space;
				}
				
				/* @cf_ico_color */
				body .$unique_block_class .td-custom-field-value-icon svg {
					fill: @cf_ico_color;
				}
				/* @cf_val_color */
				body .$unique_block_class .td-custom-field-value-text {
					color: @cf_val_color;
				}
				/* @cf_label_color */
				body .$unique_block_class .td-custom-field-label {
					color: @cf_label_color;
				}
				
				/* @f_cf_val */
				body .$unique_block_class .td-custom-field-value-text {
					@f_cf_val
				}
				/* @f_cf_label */
				body .$unique_block_class .td-custom-field-label {
					@f_cf_label
				}
				
				
				
				/* @show_price */
				body .$unique_block_class .td-price-wrapp {
					display: @show_price;
				}
				/* @price_margin */
				body .$unique_block_class .td-price-wrapp {
					margin: @price_margin;
				}
				/* @price_padd */
				body .$unique_block_class .td-price-wrapp {
					padding: @price_padd;
				}
				/* @all_price_border_size */
				body .$unique_block_class .td-price-wrapp {
					border-width: @all_price_border_size;
					border-style: @all_price_border_style;
					border-color: @all_price_border_color;
				}
				
				/* @star_size */
				body .$unique_block_class .td-user-rev-star {
					font-size: @star_size;
				}
				
				/* @price_color */
				body .$unique_block_class .td-price {
					color: @price_color;
				}
				/* @price_per_color */
				body .$unique_block_class .td-price-per {
					color: @price_per_color;
				}
				/* @star_empty */
				body .$unique_block_class .td-user-rev-star {
				    color: @star_empty;
				}
				/* @star_half */
				body .$unique_block_class .td-user-rev-star-half {
				    color: @star_half;
				}
				/* @star_full */
				body .$unique_block_class .td-user-rev-star-full {
				    color: @star_full;
				}
				
				/* @f_price */
				body .$unique_block_class .td-price {
					@f_price
				}
				/* @f_price_per */
				body .$unique_block_class .td-price-per {
					@f_price_per
				}

			</style>";


        $td_css_res_compiler = new td_css_res_compiler($raw_css);
        $td_css_res_compiler->load_settings(__CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
        return $compiled_css;
    }

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia($res_ctx)
    {

        $res_ctx->load_settings_raw('style_specific_tds_module_real_estate_pro_2_style', 1);


        /*-- GENERAL -- */
        // *- layout -* //
        // container_width
        $container_width = $res_ctx->get_style_att('container_width', __CLASS__);
        if (is_numeric($container_width)) {
            $res_ctx->load_settings_raw('container_width', $container_width . '%');
        } else {
            $res_ctx->load_settings_raw('container_width', $container_width);
        }

        // modules per row
        $modules_on_row = $res_ctx->get_style_att('modules_on_row', __CLASS__);
        $res_ctx->load_settings_raw('modules_on_row', $modules_on_row);
        if ($modules_on_row == '') {
            $modules_on_row = '100%';
        }

        // modules clearfix
        $clearfix = 'clearfix';
        $padding = 'padding';
        if ($res_ctx->is('all')) {
            $clearfix = 'clearfix_desktop';
            $padding = 'padding_desktop';
        }
        switch ($modules_on_row) {
            case '100%':
                $res_ctx->load_settings_raw($padding, '1');
                break;
            case '50%':
                $res_ctx->load_settings_raw($clearfix, '2n+1');
                $res_ctx->load_settings_raw($padding, '-n+2');
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw($clearfix, '3n+1');
                $res_ctx->load_settings_raw($padding, '-n+3');
                break;
            case '25%':
                $res_ctx->load_settings_raw($clearfix, '4n+1');
                $res_ctx->load_settings_raw($padding, '-n+4');
                break;
            case '20%':
                $res_ctx->load_settings_raw($clearfix, '5n+1');
                $res_ctx->load_settings_raw($padding, '-n+5');
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw($clearfix, '6n+1');
                $res_ctx->load_settings_raw($padding, '-n+6');
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw($clearfix, '7n+1');
                $res_ctx->load_settings_raw($padding, '-n+7');
                break;
            case '12.5%':
                $res_ctx->load_settings_raw($clearfix, '8n+1');
                $res_ctx->load_settings_raw($padding, '-n+8');
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw($clearfix, '9n+1');
                $res_ctx->load_settings_raw($padding, '-n+9');
                break;
            case '10%':
                $res_ctx->load_settings_raw($clearfix, '10n+1');
                $res_ctx->load_settings_raw($padding, '-n+10');
                break;
        }

        // modules gap
        $modules_gap = $res_ctx->get_style_att('modules_gap', __CLASS__);
        $res_ctx->load_settings_raw('modules_gap', $modules_gap);
        if ($modules_gap == '') {
            $res_ctx->load_settings_raw('modules_gap', '24px');
        } else if (is_numeric($modules_gap)) {
            $res_ctx->load_settings_raw('modules_gap', $modules_gap / 2 . 'px');
        }

        // modules padding
        $m_padding = $res_ctx->get_style_att('m_padding', __CLASS__);
        $res_ctx->load_settings_raw('m_padding', $m_padding);
        if (is_numeric($m_padding)) {
            $res_ctx->load_settings_raw('m_padding', $m_padding . 'px');
        }

        // modules space
        $modules_space = $res_ctx->get_style_att('all_modules_space', __CLASS__);
        $res_ctx->load_settings_raw('all_modules_space', $modules_space);
        if ($modules_space == '') {
            $res_ctx->load_settings_raw('all_modules_space', '18px');
        } else if (is_numeric($modules_space)) {
            $res_ctx->load_settings_raw('all_modules_space', $modules_space / 2 . 'px');
        }

        // modules border size
        $modules_border_size = $res_ctx->get_style_att('modules_border_size', __CLASS__);
        $res_ctx->load_settings_raw('modules_border_size', $modules_border_size);
        if ($modules_border_size != '' && is_numeric($modules_border_size)) {
            $res_ctx->load_settings_raw('modules_border_size', $modules_border_size . 'px');
        }
        // modules border style
        $res_ctx->load_settings_raw('modules_border_style', $res_ctx->get_style_att('modules_border_style', __CLASS__));
        // modules border radius
        $m_radius = $res_ctx->get_style_att('m_radius', __CLASS__);
        $res_ctx->load_settings_raw('m_radius', $m_radius);
        if (is_numeric($m_radius)) {
            $res_ctx->load_settings_raw('m_radius', $m_radius . 'px');
        }

        // modules divider
        $res_ctx->load_settings_raw('modules_divider', $res_ctx->get_style_att('modules_divider', __CLASS__));


        // *- colors -* //
        $res_ctx->load_settings_raw('m_bg', $res_ctx->get_style_att('m_bg', __CLASS__));
        $res_ctx->load_shadow_settings(0, 0, 0, 0, 'rgba(0, 0, 0, 0.08)', 'shadow', __CLASS__);

        $res_ctx->load_settings_raw('modules_border_color', $res_ctx->get_style_att('modules_border_color', __CLASS__));
        $res_ctx->load_settings_raw('modules_divider_color', $res_ctx->get_style_att('modules_divider_color', __CLASS__));


        /*-- ARTICLE IMAGE -- */
        // *- layout -* //
        // image_height
        $image_height = $res_ctx->get_style_att('image_height', __CLASS__);
        if (is_numeric($image_height)) {
            $res_ctx->load_settings_raw('image_height', $image_height . '%');
        } else {
            $res_ctx->load_settings_raw('image_height', $image_height);
        }

        // image_width
        $image_width = $res_ctx->get_style_att('image_width', __CLASS__);
        if (is_numeric($image_width)) {
            $res_ctx->load_settings_raw('image_width', $image_width . '%');
        } else {
            $res_ctx->load_settings_raw('image_width', $image_width);
        }

        // image_floated
        $image_floated = $res_ctx->get_style_att('image_floated', __CLASS__);
        if ($image_floated == '' || $image_floated == 'no_float') {
            $image_floated = 'no_float';
            $res_ctx->load_settings_raw('no_float', 1);
        }
        if ($image_floated == 'float_left') {
            $res_ctx->load_settings_raw('float_left', 1);
        }
        if ($image_floated == 'float_right') {
            $res_ctx->load_settings_raw('float_right', 1);
        }
        if ($image_floated == 'hidden') {
            if ($res_ctx->is('all') && !$res_ctx->is_responsive_att('image_floated')) {
                $res_ctx->load_settings_raw('hide_desktop', 1);
            } else {
                $res_ctx->load_settings_raw('hide', 1);
            }
        }

        // image radius
        $image_radius = $res_ctx->get_style_att('image_radius', __CLASS__);
        $res_ctx->load_settings_raw('image_radius', $image_radius);
        if (is_numeric($image_radius)) {
            $res_ctx->load_settings_raw('image_radius', $image_radius . 'px');
        }

        // image mix blend
        $mix_type = $res_ctx->get_style_att('mix_type', __CLASS__);
        if ($mix_type != '') {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_style_att('mix_type', __CLASS__));
        }
        $res_ctx->load_color_settings('mix_color', 'color', 'mix_gradient', '', '', __CLASS__);

        $mix_type_h = $res_ctx->get_style_att('mix_type_h', __CLASS__);
        if ($mix_type_h != '') {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_style_att('mix_type_h', __CLASS__));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings('mix_color_h', 'color_h', 'mix_gradient_h', '', '', __CLASS__);

        // image effects
        $res_ctx->load_settings_raw('fe_brightness', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate', 'saturate(1)');

        $fe_brightness = $res_ctx->get_style_att('fe_brightness', __CLASS__);
        if ($fe_brightness != '1') {
            $res_ctx->load_settings_raw('fe_brightness', 'brightness(' . $fe_brightness . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_contrast = $res_ctx->get_style_att('fe_contrast', __CLASS__);
        if ($fe_contrast != '1') {
            $res_ctx->load_settings_raw('fe_contrast', 'contrast(' . $fe_contrast . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        $fe_saturate = $res_ctx->get_style_att('fe_saturate', __CLASS__);
        if ($fe_saturate != '1') {
            $res_ctx->load_settings_raw('fe_saturate', 'saturate(' . $fe_saturate . ')');
            $res_ctx->load_settings_raw('effect_on', 1);
        }

        // image effects hover
        $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(1)');
        $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(1)');
        $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(1)');

        $fe_brightness_h = $res_ctx->get_style_att('fe_brightness_h', __CLASS__);
        $fe_contrast_h = $res_ctx->get_style_att('fe_contrast_h', __CLASS__);
        $fe_saturate_h = $res_ctx->get_style_att('fe_saturate_h', __CLASS__);

        if ($fe_brightness_h != '1') {
            $res_ctx->load_settings_raw('fe_brightness_h', 'brightness(' . $fe_brightness_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_contrast_h != '1') {
            $res_ctx->load_settings_raw('fe_contrast_h', 'contrast(' . $fe_contrast_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        if ($fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('fe_saturate_h', 'saturate(' . $fe_saturate_h . ')');
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }
        // make hover to work
        if ($fe_brightness_h != '1' || $fe_contrast_h != '1' || $fe_saturate_h != '1') {
            $res_ctx->load_settings_raw('effect_on', 1);
        }
        if ($fe_brightness != '1' || $fe_contrast != '1' || $fe_saturate != '1') {
            $res_ctx->load_settings_raw('effect_on_h', 1);
        }


        /*-- EXCLUSIVE LABEL -- */
        if (!empty(has_filter('td_composer_map_exclusive_label_array', 'td_subscription::add_exclusive_label_settings'))) {
            // *- layout -* //
            // show exclusive label
            $excl_show = $res_ctx->get_style_att('excl_show', __CLASS__);
            $res_ctx->load_settings_raw('excl_show', $excl_show);
            if ($excl_show == '') {
                $res_ctx->load_settings_raw('excl_show', 'inline-block');
            }

            // exclusive label text
            $res_ctx->load_settings_raw('excl_txt', $res_ctx->get_style_att('excl_txt', __CLASS__));

            // exclusive label margin
            $excl_margin = $res_ctx->get_style_att('excl_margin', __CLASS__);
            $res_ctx->load_settings_raw('excl_margin', $excl_margin);
            if ($excl_margin != '' && is_numeric($excl_margin)) {
                $res_ctx->load_settings_raw('excl_margin', $excl_margin . 'px');
            }

            // exclusive label padding
            $excl_padd = $res_ctx->get_style_att('excl_padd', __CLASS__);
            $res_ctx->load_settings_raw('excl_padd', $excl_padd);
            if ($excl_padd != '' && is_numeric($excl_padd)) {
                $res_ctx->load_settings_raw('excl_padd', $excl_padd . 'px');
            }

            // exclusive label border size
            $excl_border = $res_ctx->get_style_att('all_excl_border', __CLASS__);
            $res_ctx->load_settings_raw('all_excl_border', $excl_border);
            if ($excl_border != '' && is_numeric($excl_border)) {
                $res_ctx->load_settings_raw('all_excl_border', $excl_border . 'px');
            }
            // exclusive label border style
            $res_ctx->load_settings_raw('all_excl_border_style', $res_ctx->get_style_att('all_excl_border_style', __CLASS__));
            // exclusive label border radius
            $excl_radius = $res_ctx->get_style_att('excl_radius', __CLASS__);
            $res_ctx->load_settings_raw('excl_radius', $excl_radius);
            if ($excl_radius != '' && is_numeric($excl_radius)) {
                $res_ctx->load_settings_raw('excl_radius', $excl_radius . 'px');
            }


            // *- colors -* //
            $res_ctx->load_settings_raw('excl_color', $res_ctx->get_style_att('excl_color', __CLASS__));
            $res_ctx->load_settings_raw('excl_color_h', $res_ctx->get_style_att('excl_color_h', __CLASS__));
            $res_ctx->load_settings_raw('excl_bg', $res_ctx->get_style_att('excl_bg', __CLASS__));
            $res_ctx->load_settings_raw('excl_bg_h', $res_ctx->get_style_att('excl_bg_h', __CLASS__));
            $excl_border_color = $res_ctx->get_style_att('all_excl_border_color', __CLASS__);
            $res_ctx->load_settings_raw('all_excl_border_color', $excl_border_color);
            if ($excl_border_color == '') {
                $res_ctx->load_settings_raw('all_excl_border_color', '#000');
            }
            $res_ctx->load_settings_raw('excl_border_color_h', $res_ctx->get_style_att('excl_border_color_h', __CLASS__));


            // *- fonts -* //
            $res_ctx->load_font_settings('f_excl', __CLASS__);
        }


        /*-- META INFO GENERAL -- */
        // *- layout -* //
        // meta info align
        $meta_info_align = $res_ctx->get_style_att('meta_info_align', __CLASS__);
        $res_ctx->load_settings_raw('meta_info_align', $meta_info_align);
        // meta info align to fix top when no float is selected
        if ($meta_info_align == 'initial' && $image_floated == 'no_float') {
            $res_ctx->load_settings_raw('meta_info_align_top', 1);
        }
        // meta info align top/bottom - align category
        if ($meta_info_align == 'initial') {
            $res_ctx->load_settings_raw('align_category_top', 1);
        }
        if ($meta_info_align == 'flex-end' && $image_floated == 'no_float') {
            $res_ctx->load_settings_raw('align_category_bottom', 1);
        }

        // meta info horizontal align
        $content_align = $res_ctx->get_style_att('meta_info_horiz', __CLASS__);
        if ($content_align == 'content-horiz-center') {
            $res_ctx->load_settings_raw('meta_horiz_align_center', 1);
        } else if ($content_align == 'content-horiz-right') {
            $res_ctx->load_settings_raw('meta_horiz_align_right', 1);
        } else if ($content_align == 'content-horiz-left') {
            $res_ctx->load_settings_raw('meta_horiz_align_left', 1);
        }

        // meta info width
        $meta_info_width = $res_ctx->get_style_att('meta_width', __CLASS__);
        $res_ctx->load_settings_raw('meta_width', $meta_info_width);
        if ($meta_info_width != '' && is_numeric($meta_info_width)) {
            $res_ctx->load_settings_raw('meta_width', $meta_info_width . 'px');
        }

        // meta info margin
        $meta_margin = $res_ctx->get_style_att('meta_margin', __CLASS__);
        $res_ctx->load_settings_raw('meta_margin', $meta_margin);
        if (is_numeric($meta_margin)) {
            $res_ctx->load_settings_raw('meta_margin', $meta_margin . 'px');
        }

        // meta info padding
        $meta_padding = $res_ctx->get_style_att('meta_padding', __CLASS__);
        $res_ctx->load_settings_raw('meta_padding', $meta_padding);
        if (is_numeric($meta_padding)) {
            $res_ctx->load_settings_raw('meta_padding', $meta_padding . 'px');
        }

        // meta container space
        $meta_space = $res_ctx->get_style_att('meta_space', __CLASS__);
        $res_ctx->load_settings_raw('meta_space', $meta_space);
        if ($meta_space != '' && is_numeric($meta_space)) {
            $res_ctx->load_settings_raw('meta_space', $meta_space . 'px');
        }

        // meta_info_border_size
        $meta_info_border_size = $res_ctx->get_style_att('meta_info_border_size', __CLASS__);
        $res_ctx->load_settings_raw('meta_info_border_size', $meta_info_border_size);
        if (is_numeric($meta_info_border_size)) {
            $res_ctx->load_settings_raw('meta_info_border_size', $meta_info_border_size . 'px');
        }
        // meta info border style
        $res_ctx->load_settings_raw('meta_info_border_style', $res_ctx->get_style_att('meta_info_border_style', __CLASS__));
        // meta info border radius
        $meta_info_border_radius = $res_ctx->get_style_att('meta_info_border_radius', __CLASS__);
        $res_ctx->load_settings_raw('meta_info_border_radius', $meta_info_border_radius);
        if (is_numeric($meta_info_border_radius)) {
            $res_ctx->load_settings_raw('meta_info_border_radius', $meta_info_border_radius . 'px');
        }


        // *- colors -* //
        $res_ctx->load_color_settings('meta_bg', 'meta_bg_solid', 'meta_bg_gradient', '', '', __CLASS__);
        $res_ctx->load_shadow_settings(0, 0, 0, 0, 'rgba(0, 0, 0, 0.08)', 'shadow_m', __CLASS__);

        $res_ctx->load_settings_raw('meta_info_border_color', $res_ctx->get_style_att('meta_info_border_color', __CLASS__));


        // *- fonts -* //
        $res_ctx->load_font_settings('f_meta', __CLASS__);


        /*-- ARTICLE TITLE -- */
        // *- layout -* //
        // article title space
        $art_title = $res_ctx->get_style_att('art_title', __CLASS__);
        $res_ctx->load_settings_raw('art_title', $art_title);
        if (is_numeric($art_title)) {
            $res_ctx->load_settings_raw('art_title', $art_title . 'px');
        }

        // underline height
        $underline_height = $res_ctx->get_style_att('all_underline_height', __CLASS__);
        $res_ctx->load_settings_raw('all_underline_height', $underline_height);
        if ($underline_height != '' && is_numeric($underline_height)) {
            $res_ctx->load_settings_raw('all_underline_height', $underline_height . 'px');
        } else {
            $res_ctx->load_settings_raw('all_underline_height', '0');
        }


        // *- colors -* //
        $res_ctx->load_settings_raw('title_txt', $res_ctx->get_style_att('title_txt', __CLASS__));
        $res_ctx->load_settings_raw('title_txt_hover', $res_ctx->get_style_att('title_txt_hover', __CLASS__));

        $underline_color = $res_ctx->get_style_att('all_underline_color', __CLASS__);
        if ($underline_height != 0) {
            if ($underline_color == '') {
                $res_ctx->load_settings_raw('all_underline_color', '#000');
            } else {
                $res_ctx->load_settings_raw('all_underline_color', $res_ctx->get_style_att('all_underline_color', __CLASS__));
            }
        }


        // *- fonts -* //
        $res_ctx->load_font_settings('f_title', __CLASS__);


        /*-- LOCATION -- */
        // *- layout -* //
        // show location
        $res_ctx->load_settings_raw('show_loc', $res_ctx->get_style_att('show_loc', __CLASS__));

        // location space
        $loc_margin = $res_ctx->get_style_att('loc_margin', __CLASS__);
        $res_ctx->load_settings_raw('loc_margin', $loc_margin);
        if ($loc_margin != '' && is_numeric($loc_margin)) {
            $res_ctx->load_settings_raw('loc_margin', $loc_margin . 'px');
        }
        // location padding
        $loc_padd = $res_ctx->get_style_att('loc_padd', __CLASS__);
        $res_ctx->load_settings_raw('loc_padd', $loc_padd);
        if ($loc_padd != '' && is_numeric($loc_padd)) {
            $res_ctx->load_settings_raw('loc_padd', $loc_padd . 'px');
        }

        // location icon size
        $loc_ico_size = $res_ctx->get_style_att('loc_ico_size', __CLASS__);
        $res_ctx->load_settings_raw('loc_ico_size', $loc_ico_size);
        if ($loc_ico_size != '' && is_numeric($loc_ico_size)) {
            $res_ctx->load_settings_raw('loc_ico_size', $loc_ico_size . 'px');
        }
        // location icon space
        $loc_ico_space = $res_ctx->get_style_att('loc_ico_space', __CLASS__);
        $res_ctx->load_settings_raw('loc_ico_space', $loc_ico_space);
        if ($loc_ico_space != '' && is_numeric($loc_ico_space)) {
            $res_ctx->load_settings_raw('loc_ico_space', $loc_ico_space . 'px');
        }
        // location icon vertical align
        $loc_ico_align = $res_ctx->get_style_att('loc_ico_align', __CLASS__);
        $res_ctx->load_settings_raw('loc_ico_align', $loc_ico_align);
        if ($loc_ico_align != '' && is_numeric($loc_ico_align)) {
            $res_ctx->load_settings_raw('loc_ico_align', $loc_ico_align . 'px');
        }


        // *- colors -* //
        $res_ctx->load_settings_raw('loc_ico_color', $res_ctx->get_style_att('loc_ico_color', __CLASS__));
        $res_ctx->load_settings_raw('loc_txt_color', $res_ctx->get_style_att('loc_txt_color', __CLASS__));


        // *- fonts -* //
        $res_ctx->load_font_settings('f_loc', __CLASS__);


        /*-- CUSTOM FIELDS -- */
        // *- layout -* //
        // show custom fields
        $res_ctx->load_settings_raw('show_cf', $res_ctx->get_style_att('show_cf', __CLASS__));

        // custom fields space
        $cf_margin = $res_ctx->get_style_att('cf_margin', __CLASS__);
        $res_ctx->load_settings_raw('cf_margin', $cf_margin);
        if ($cf_margin != '' && is_numeric($cf_margin)) {
            $res_ctx->load_settings_raw('cf_margin', $cf_margin . 'px');
        }
        // custom fields padding
        $cf_padd = $res_ctx->get_style_att('cf_padd', __CLASS__);
        $res_ctx->load_settings_raw('cf_padd', $cf_padd);
        if ($cf_padd != '' && is_numeric($cf_padd)) {
            $res_ctx->load_settings_raw('cf_padd', $cf_padd . 'px');
        }

        // custom fields border size
        $all_cf_border_size = $res_ctx->get_style_att('all_cf_border_size', __CLASS__);
        $res_ctx->load_settings_raw('all_cf_border_size', $all_cf_border_size);
        if ($all_cf_border_size != '' && is_numeric($all_cf_border_size)) {
            $res_ctx->load_settings_raw('all_cf_border_size', $all_cf_border_size . 'px');
        }
        // custom fields border style
        $all_cf_border_style = $res_ctx->get_style_att('all_cf_border_style', __CLASS__);
        if ($all_cf_border_style == '') {
            $all_cf_border_style = 'solid';
        }
        $res_ctx->load_settings_raw('all_cf_border_style', $all_cf_border_style);
        // custom fields border color
        $all_cf_border_color = $res_ctx->get_style_att('all_cf_border_color', __CLASS__);
        if ($all_cf_border_color == '') {
            $all_cf_border_color = '#000';
        }
        $res_ctx->load_settings_raw('all_cf_border_color', $all_cf_border_color);

        // custom fields icon size
        $cf_ico_size = $res_ctx->get_style_att('cf_ico_size', __CLASS__);
        $res_ctx->load_settings_raw('cf_ico_size', $cf_ico_size);
        if ($cf_ico_size != '' && is_numeric($cf_ico_size)) {
            $res_ctx->load_settings_raw('cf_ico_size', $cf_ico_size . 'px');
        }
        // custom fields icon space
        $cf_ico_space = $res_ctx->get_style_att('cf_ico_space', __CLASS__);
        $res_ctx->load_settings_raw('cf_ico_space', $cf_ico_space);
        if ($cf_ico_space != '' && is_numeric($cf_ico_space)) {
            $res_ctx->load_settings_raw('cf_ico_space', $cf_ico_space . 'px');
        }

        // custom fields label space
        $cf_label_space = $res_ctx->get_style_att('cf_label_space', __CLASS__);
        $res_ctx->load_settings_raw('cf_label_space', $cf_label_space);
        if ($cf_label_space != '' && is_numeric($cf_label_space)) {
            $res_ctx->load_settings_raw('cf_label_space', $cf_label_space . 'px');
        }


        // *- colors -* //
        $res_ctx->load_settings_raw('cf_ico_color', $res_ctx->get_style_att('cf_ico_color', __CLASS__));
        $res_ctx->load_settings_raw('cf_val_color', $res_ctx->get_style_att('cf_val_color', __CLASS__));
        $res_ctx->load_settings_raw('cf_label_color', $res_ctx->get_style_att('cf_label_color', __CLASS__));


        // *- fonts -* //
        $res_ctx->load_font_settings('f_cf_val', __CLASS__);
        $res_ctx->load_font_settings('f_cf_label', __CLASS__);




        /*-- PRICE -- */
        // *- layout -* //
        // show price
        $res_ctx->load_settings_raw('show_cf', $res_ctx->get_style_att('show_price', __CLASS__));

        // price space
        $price_margin = $res_ctx->get_style_att('price_margin', __CLASS__);
        $res_ctx->load_settings_raw('price_margin', $price_margin);
        if ($price_margin != '' && is_numeric($price_margin)) {
            $res_ctx->load_settings_raw('price_margin', $price_margin . 'px');
        }
        // price padding
        $price_padd = $res_ctx->get_style_att('price_padd', __CLASS__);
        $res_ctx->load_settings_raw('price_padd', $price_padd);
        if ($price_padd != '' && is_numeric($price_padd)) {
            $res_ctx->load_settings_raw('price_padd', $price_padd . 'px');
        }

        // price border size
        $all_price_border_size = $res_ctx->get_style_att('all_price_border_size', __CLASS__);
        $res_ctx->load_settings_raw('all_price_border_size', $all_price_border_size);
        if ($all_price_border_size != '' && is_numeric($all_price_border_size)) {
            $res_ctx->load_settings_raw('all_price_border_size', $all_price_border_size . 'px');
        }
        // price border style
        $all_price_border_style = $res_ctx->get_style_att('all_price_border_style', __CLASS__);
        if ($all_price_border_style == '') {
            $all_price_border_style = 'solid';
        }
        $res_ctx->load_settings_raw('all_price_border_style', $all_price_border_style);
        // price border color
        $all_price_border_color = $res_ctx->get_style_att('all_price_border_color', __CLASS__);
        if ($all_price_border_color == '') {
            $all_price_border_color = '#000';
        }
        $res_ctx->load_settings_raw('all_price_border_color', $all_price_border_color);

        // user reviews stars size
        $star_size = $res_ctx->get_style_att('star_size', __CLASS__);
        $res_ctx->load_settings_raw('star_size', $star_size);
        if ($star_size != '' && is_numeric($star_size)) {
            $res_ctx->load_settings_raw('star_size', $star_size . 'px');
        }


        // *- colors -* //
        $res_ctx->load_settings_raw('price_color', $res_ctx->get_style_att('price_color', __CLASS__));
        $res_ctx->load_settings_raw('price_per_color', $res_ctx->get_style_att('price_per_color', __CLASS__));
        $res_ctx->load_settings_raw('star_empty', $res_ctx->get_style_att('star_empty', __CLASS__));
        $res_ctx->load_settings_raw('star_half', $res_ctx->get_style_att('star_half', __CLASS__));
        $res_ctx->load_settings_raw('star_full', $res_ctx->get_style_att('star_full', __CLASS__));


        // *- fonts -* //
        $res_ctx->load_font_settings('f_price', __CLASS__);
        $res_ctx->load_font_settings('f_price_per', __CLASS__);

    }

    function render($index_style = '')
    {
        if (!empty($index_style)) {
            $this->index_style = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        return $this->get_style($this->get_css());
    }

    function get_style_att($att_name)
    {
        return $this->get_att($att_name, __CLASS__, $this->index_style);
    }

    function get_atts()
    {
        return $this->atts;
    }
}
