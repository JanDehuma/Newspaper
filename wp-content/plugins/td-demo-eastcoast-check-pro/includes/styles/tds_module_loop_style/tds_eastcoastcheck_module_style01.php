<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_eastcoastcheck_module_style01 extends td_style {

	private $unique_block_class;
    private $unique_style_class;
	private $atts = array();
	private $index_style;

	function __construct( $atts, $unique_block_class = '', $index_style = '') {
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
        if( $in_element || $in_composer ) {
            $unique_block_class_prefix = 'tdc-row .';

            if( $in_element && $in_composer ) {
                $unique_block_class_prefix = 'tdc-row-composer .';
            }
        }
        $unique_block_class = $unique_block_class_prefix . $this->unique_block_class;

        $unique_block_modal_class = $this->unique_block_class . '_m';


		$raw_css =
			"<style>


                /* @modules_on_row */
				.$unique_block_class .td_module_wrap:not(.tdb_module_rec) {
					width: @modules_on_row;
				}
				/* @modules_gap */
				.$unique_block_class .td_module_wrap {
					padding-left: @modules_gap;
					padding-right: @modules_gap;
				}
				.$unique_block_class .td-eastcoast01-amenity-container {
                    display: flex;
                }
                .$unique_block_class .td-eastcoast01-amenities, .td-eastcoast01-mid-amenities {
                    display: flex;
                    align-items: center;   
                }
                .$unique_block_class .td-eastcoast01-amenity-icon {
                    width: 20px;
                }
                .$unique_block_class .td-eastcoast01-phone{
                    display: flex;
                }  
                .$unique_block_class .td-eastcoast01-website {
                    display: flex;
                }
                .$unique_block_class .td-eastcoast01-email {
                    display: flex;
                }
                .td-eastcoast01-amenity06-description, .td-eastcoast01-amenity05-description, .td-eastcoast01-amenity04-description, .td-eastcoast01-amenity03-description, .td-eastcoast01-amenity02-description, .td-eastcoast01-amenity01-description {
                    margin-left: 5px;
                }
                .td-eastcoast01-email-cf, .td-eastcoast01-website-cf {
                    word-break: break-all;
                }
				.$unique_block_class .td_block_inner {
					margin-left: -@modules_gap;
					margin-right: -@modules_gap;
				}
				/* @all_modules_space */
				.$unique_block_class .td_module_wrap {
					padding-bottom: @all_modules_space;
					margin-bottom: @all_modules_space;
				}
				.$unique_block_class .td-module-container:before {
					bottom: -@all_modules_space;
				}
				/* @m_padding */
				.$unique_block_class .td-module-container {
					padding: @m_padding;
				}
				/* @modules_border_size */
				.$unique_block_class .td_module_wrap {
				    border-width: @modules_border_size!important;
				}
				/* @modules_border_style */
				.$unique_block_class .td_module_wrap {
				    border-style: @modules_border_style!important;
				}
				/* @modules_border_color */
				.$unique_block_class .td_module_wrap {
				    border-color: @modules_border_color!important;
				}
				.$unique_block_class .td_module_wrap:last-child {
				    border: none;
				}
				
                
                .$unique_block_class .tds_eastcoastcheck_module01 {
                padding-bottom: 0;
                }
                
                /* @image_height */
				.$unique_block_class .td-image-wrap {
					padding-bottom: @image_height;
				}
				/* @image_width */
				.$unique_block_class .td-image-container {
				 	width: @image_width;
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
                
                /* east coast settings */
                
                /* @ecoast1_3_columns */
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container {
                    display: flex;
                    flex-direction: row;
                    position: relative;
                    column-gap: 20px;
                }
                /* @ecoast1_2_columns */
                 body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container {
                    display: flex;
                    flex-direction: row;
                    position: relative;
                    column-gap: 20px;
                    flex-wrap: wrap;
                }
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container .td-eastcoast01-image-container {
                    order: 2;
                }
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container .td-eastcoast01-contact-prev {
                    order: 3;
                }
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container .td-eastcoast01-meta-info-container {
                width: 100%;
                margin-bottom: 20px;
                }
                /* @ecoast1_none */
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container {
                    display: flex;
                    flex-direction: column;
                    position: relative;
                }
                body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container .td-eastcoast01-meta-info-container {
                width: 100%;
                margin: 20px 0;
                }
                .body .$unique_block_class .tds_eastcoastcheck_module01 .td-module-container .td-eastcoast01-contact-prev {
                width: 100%!important;
                }
                
                /* @td_column1_width_1ecoast */
                body .$unique_block_class .td-eastcoast01-meta-info-container {
				 	flex: 0 0 auto;
			    }
				body .$unique_block_class .td-eastcoast01-meta-info-container {
				 	width: @td_column1_width_1ecoast;
			    }
				body .$unique_block_class .td-eastcoast01-contact-prev {
				flex-grow: 1;
				flex-shrink: 1;
			    }
                
			    /* @td_ecoast1_icon_width */
                .$unique_block_class .td-eastcoast01-amenity-icon {
                width: @td_ecoast1_icon_width;
                }
                .$unique_block_class .td-eastcoast01-amenity-icon-cont {
                min-height: 30px;
                min-width: 30px;
                }
                .$unique_block_class .td-eastcoast01-phone-cf, .td-eastcoast01-website-cf, .td-eastcoast01-email-cf {
                margin-left: 5px;
                }
			    
			    /* fonts here */
			    /* @f_art_title_1ecoast */
                .$unique_block_class .td-eastcoast01-title a {
                    @f_art_title_1ecoast;
                }
                /* @f_description_1ecoast */
                body .$unique_block_class .td-eastcoast01-meta-info-container .td-ecoast1-description {
                    @f_description_1ecoast;
                }
                /* @f_wifi_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity01-description {
                    @f_wifi_1ecoast;
                }
                /* @f_schedule_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity02-description {
                    @f_schedule_1ecoast;
                }
                /* @f_aircon_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity03-description {
                    @f_aircon_1ecoast;
                }
                /* @f_smoking_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity04-description {
                    @f_smoking_1ecoast;
                }
                /* @f_parking_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity05-description {
                    @f_parking_1ecoast;
                }
                /* @f_payment_1ecoast */
                .$unique_block_class .td-eastcoast01-amenity06-description {
                    @f_payment_1ecoast;
                }
                /* @f_emaillabel_1ecoast */
                .$unique_block_class .td-eastcoast01-email-description {
                    @f_emaillabel_1ecoast;
                }
                /* @f_email_1ecoast */
                .$unique_block_class .td-eastcoast01-email-cf {
                    @f_email_1ecoast;
                }
                /* @f_websitelabel_1ecoast */
                .$unique_block_class .td-eastcoast01-website-description {
                    @f_websitelabel_1ecoast;
                }
                /* @f_website_1ecoast */
                .$unique_block_class .td-eastcoast01-website-cf {
                    @f_website_1ecoast;
                }
                /* @f_phonelabel_1ecoast */
                .$unique_block_class .td-eastcoast01-phone-description {
                    @f_phonelabel_1ecoast;
                }
                /* @f_phone_1ecoast */
                .$unique_block_class .td-eastcoast01-phone-cf {
                    @f_phone_1ecoast;
                }
                
                /* margins and paddings */
                /* @td_ecoast1_title_ma */
                .$unique_block_class .td-eastcoast01-title {
                    margin: @td_ecoast1_title_ma;
                }
                /* @td_ecoast1_amenities_ma */
                .$unique_block_class .td-eastcoast01-amenities-firstrow {
                    margin: @td_ecoast1_amenities_ma;
                }
                /* @td_ecoast1_mid_amenities_ma */
                .$unique_block_class .td-eastcoast01-mid-amenities {
                    margin: @td_ecoast1_mid_amenities_ma;
                }
                /* @td_ecoast1_amenicon_pa */
                .$unique_block_class .td-eastcoast01-amenity-icon-cont {
                    padding: @td_ecoast1_amenicon_pa;
                }
                /* @td_ecoast1_amenicon_br */
                .$unique_block_class .td-eastcoast01-amenity-icon-cont {
                    border-radius: @td_ecoast1_amenicon_br;
                }
                /* @td_ecoast1_contact_ma */
                .$unique_block_class .td-eastcoast01-website {
                    margin: @td_ecoast1_contact_ma;
                }

                
                /* colors here */
                /* @td_eastcoast1_title_co */
                .$unique_block_class .td-eastcoast01-title a {
                    color: @td_eastcoast1_title_co;
                }
                /* @td_eastcoast1_title_coho */
                .$unique_block_class .td-eastcoast01-title a:hover {
                    color: @td_eastcoast1_title_coho;
                }
                /* @td_eastcoast1_description_co */
                .$unique_block_class .td-ecoast1-description {
                    color: @td_eastcoast1_description_co;
                }
                 /* @td_eastcoast1_icon_co */
                .$unique_block_class .td-eastcoast01-amenity-icon {
                    fill: @td_eastcoast1_icon_co;
                }
                /* @td_eastcoast1_bg_icon_co */
                .$unique_block_class .td-eastcoast01-amenity-icon-cont {
                    background-color: @td_eastcoast1_bg_icon_co;
                }
                /* @td_eastcoast1_amenities_co */
                .$unique_block_class .td-eastcoast01-amenity06-description, .td-eastcoast01-amenity05-description, .td-eastcoast01-amenity04-description, .td-eastcoast01-amenity03-description, .td-eastcoast01-amenity02-description, .td-eastcoast01-amenity01-description {
                    color: @td_eastcoast1_amenities_co;
                }
                /* @td_eastcoast1_contla_co */
                .$unique_block_class .td-eastcoast01-phone-description, .td-eastcoast01-website-description, .td-eastcoast01-email-description {
                    color: @td_eastcoast1_contla_co;
                }
                /* @td_eastcoast1_contact_co */
                .$unique_block_class .td-eastcoast01-phone-cf, .td-eastcoast01-website-cf, .td-eastcoast01-email-cf {
                    color: @td_eastcoast1_contact_co;
                }
               
                
			     
			    
			</style>";


        $td_css_res_compiler = new td_css_res_compiler( $raw_css );
        $td_css_res_compiler->load_settings( __CLASS__ . '::cssMedia', $this->atts);

        $compiled_css .= $td_css_res_compiler->compile_css();
		return $compiled_css;
	}

    /**
     * Callback pe media
     *
     * @param $responsive_context td_res_context
     * @param $atts
     */
    static function cssMedia( $res_ctx ) {

        $res_ctx->load_settings_raw( 'style_specific_tds_module_loop_custom_style', 1 );
        $res_ctx->load_settings_raw( 'description', 1 );


        /*-- GENERAL -- */
        // modules per row
        $modules_on_row = $res_ctx->get_style_att('modules_on_row', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_on_row', $modules_on_row );
        if ( $modules_on_row == '' ) {
            $modules_on_row = '100%';
        }

        // modules clearfix
        $clearfix = 'clearfix';
        $padding = 'padding';
        if ( $res_ctx->is( 'all' ) ) {
            $clearfix = 'clearfix_desktop';
            $padding = 'padding_desktop';
        }
        switch ($modules_on_row) {
            case '100%':
                $res_ctx->load_settings_raw( $padding,  '1' );
                break;
            case '50%':
                $res_ctx->load_settings_raw( $clearfix,  '2n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+2' );
                break;
            case '33.33333333%':
                $res_ctx->load_settings_raw( $clearfix,  '3n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+3' );
                break;
            case '25%':
                $res_ctx->load_settings_raw( $clearfix,  '4n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+4' );
                break;
            case '20%':
                $res_ctx->load_settings_raw( $clearfix,  '5n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+5' );
                break;
            case '16.66666667%':
                $res_ctx->load_settings_raw( $clearfix,  '6n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+6' );
                break;
            case '14.28571428%':
                $res_ctx->load_settings_raw( $clearfix,  '7n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+7' );
                break;
            case '12.5%':
                $res_ctx->load_settings_raw( $clearfix,  '8n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+8' );
                break;
            case '11.11111111%':
                $res_ctx->load_settings_raw( $clearfix,  '9n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+9' );
                break;
            case '10%':
                $res_ctx->load_settings_raw( $clearfix,  '10n+1' );
                $res_ctx->load_settings_raw( $padding,  '-n+10' );
                break;
        }

        // modules gap
        $modules_gap = $res_ctx->get_style_att('modules_gap', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_gap', $modules_gap );
        if ( $modules_gap == '' ) {
            $res_ctx->load_settings_raw( 'modules_gap', '24px');
        } else if ( is_numeric( $modules_gap ) ) {
            $res_ctx->load_settings_raw( 'modules_gap', $modules_gap / 2 .'px' );
        }

        // modules padding
        $m_padding = $res_ctx->get_style_att('m_padding', __CLASS__);
        $res_ctx->load_settings_raw( 'm_padding', $m_padding );
        if ( is_numeric( $m_padding ) ) {
            $res_ctx->load_settings_raw( 'm_padding', $m_padding . 'px' );
        }

        // modules space
        $modules_space = $res_ctx->get_style_att('all_modules_space', __CLASS__);
        $res_ctx->load_settings_raw( 'all_modules_space', $modules_space );
        if ( $modules_space == '' ) {
            $res_ctx->load_settings_raw( 'all_modules_space', '18px');
        } else if ( is_numeric( $modules_space ) ) {
            $res_ctx->load_settings_raw( 'all_modules_space', $modules_space / 2 .'px' );
        }

        // modules border size
        $modules_border_size = $res_ctx->get_style_att('modules_border_size', __CLASS__);
        $res_ctx->load_settings_raw( 'modules_border_size', $modules_border_size );
        if( $modules_border_size != '' && is_numeric( $modules_border_size ) ) {
            $res_ctx->load_settings_raw( 'modules_border_size', $modules_border_size . 'px' );
        }
        // modules border style
        $res_ctx->load_settings_raw( 'modules_border_style', $res_ctx->get_style_att('modules_border_style', __CLASS__) );
        $res_ctx->load_settings_raw( 'modules_border_color', $res_ctx->get_style_att('modules_border_color', __CLASS__) );
        // modules border radius
//        $m_radius = $res_ctx->get_style_att('m_radius', __CLASS__);
//        $res_ctx->load_settings_raw( 'm_radius', $m_radius );
//        if ( is_numeric( $m_radius ) ) {
//            $res_ctx->load_settings_raw( 'm_radius', $m_radius . 'px' );
//        }
//        $res_ctx->load_settings_raw( 'modules_border_color', $res_ctx->get_style_att('modules_border_color', __CLASS__) );


        /*-- ARTICLE IMAGE -- */
        // *- layout -* //
        // image_height
        $image_height = $res_ctx->get_style_att('image_height', __CLASS__);
        if ( is_numeric( $image_height ) ) {
            $res_ctx->load_settings_raw( 'image_height', $image_height . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_height', $image_height );
        }

        // image_width
        $image_width = $res_ctx->get_style_att('image_width', __CLASS__);
        if ( is_numeric( $image_width ) ) {
            $res_ctx->load_settings_raw( 'image_width', $image_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'image_width', $image_width );
        }

//        // image_floated
//        $image_floated = $res_ctx->get_style_att('image_floated', __CLASS__);
//        if ( $image_floated == '' ||  $image_floated == 'no_float' ) {
//            $image_floated = 'no_float';
//            $res_ctx->load_settings_raw( 'no_float',  1 );
//        }
//        if ( $image_floated == 'float_left' ) {
//            $res_ctx->load_settings_raw( 'float_left',  1 );
//        }
//        if ( $image_floated == 'float_right' ) {
//            $res_ctx->load_settings_raw( 'float_right',  1 );
//        }
//        if ( $image_floated == 'hidden' ) {
//            if ( $res_ctx->is( 'all' ) && !$res_ctx->is_responsive_att( 'image_floated' ) ) {
//                $res_ctx->load_settings_raw( 'hide_desktop',  1 );
//            } else {
//                $res_ctx->load_settings_raw( 'hide',  1 );
//            }
//        }
//
//        // image radius
//        $image_radius = $res_ctx->get_style_att('image_radius', __CLASS__);
//        $res_ctx->load_settings_raw( 'image_radius', $image_radius );
//        if ( is_numeric( $image_radius ) ) {
//            $res_ctx->load_settings_raw( 'image_radius', $image_radius . 'px' );
//        }

        // image mix blend
        $mix_type = $res_ctx->get_style_att('mix_type', __CLASS__);
        if ( $mix_type != '' ) {
            $res_ctx->load_settings_raw('mix_type', $res_ctx->get_style_att('mix_type', __CLASS__));
        }
        $res_ctx->load_color_settings( 'mix_color', 'color', 'mix_gradient', '', '', __CLASS__ );

        $mix_type_h = $res_ctx->get_style_att('mix_type_h', __CLASS__);
        if ( $mix_type_h != '' ) {
            $res_ctx->load_settings_raw('mix_type_h', $res_ctx->get_style_att('mix_type_h', __CLASS__));
        } else {
            $res_ctx->load_settings_raw('mix_type_off', 1);
        }
        $res_ctx->load_color_settings( 'mix_color_h', 'color_h', 'mix_gradient_h', '', '', __CLASS__ );

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
        if( !empty( has_filter('td_composer_map_exclusive_label_array', 'td_subscription::add_exclusive_label_settings') ) ) {
            // *- layout -* //
            // show exclusive label
            $excl_show = $res_ctx->get_style_att('excl_show', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_show', $excl_show );
            if( $excl_show == '' ) {
                $res_ctx->load_settings_raw( 'excl_show', 'inline-block' );
            }

            // exclusive label text
            $res_ctx->load_settings_raw( 'excl_txt', $res_ctx->get_style_att('excl_txt', __CLASS__) );

            // exclusive label margin
            $excl_margin = $res_ctx->get_style_att('excl_margin', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_margin', $excl_margin );
            if( $excl_margin != '' && is_numeric( $excl_margin ) ) {
                $res_ctx->load_settings_raw( 'excl_margin', $excl_margin . 'px' );
            }

            // exclusive label padding
            $excl_padd = $res_ctx->get_style_att('excl_padd', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_padd', $excl_padd );
            if( $excl_padd != '' && is_numeric( $excl_padd ) ) {
                $res_ctx->load_settings_raw( 'excl_padd', $excl_padd . 'px' );
            }

            // exclusive label border size
            $excl_border = $res_ctx->get_style_att('all_excl_border', __CLASS__);
            $res_ctx->load_settings_raw( 'all_excl_border', $excl_border );
            if( $excl_border != '' && is_numeric( $excl_border ) ) {
                $res_ctx->load_settings_raw( 'all_excl_border', $excl_border . 'px' );
            }
            // exclusive label border style
            $res_ctx->load_settings_raw( 'all_excl_border_style', $res_ctx->get_style_att('all_excl_border_style', __CLASS__) );
            // exclusive label border radius
            $excl_radius = $res_ctx->get_style_att('excl_radius', __CLASS__);
            $res_ctx->load_settings_raw( 'excl_radius', $excl_radius );
            if( $excl_radius != '' && is_numeric( $excl_radius ) ) {
                $res_ctx->load_settings_raw( 'excl_radius', $excl_radius . 'px' );
            }


            // *- colors -* //
            $res_ctx->load_settings_raw( 'excl_color', $res_ctx->get_style_att('excl_color', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_color_h', $res_ctx->get_style_att('excl_color_h', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_bg', $res_ctx->get_style_att('excl_bg', __CLASS__) );
            $res_ctx->load_settings_raw( 'excl_bg_h', $res_ctx->get_style_att('excl_bg_h', __CLASS__) );
            $excl_border_color = $res_ctx->get_style_att('all_excl_border_color', __CLASS__);
            $res_ctx->load_settings_raw( 'all_excl_border_color', $excl_border_color );
            if( $excl_border_color == '' ) {
                $res_ctx->load_settings_raw( 'all_excl_border_color', '#000' );
            }
            $res_ctx->load_settings_raw( 'excl_border_color_h', $res_ctx->get_style_att('excl_border_color_h', __CLASS__) );


            // *- fonts -* //
            $res_ctx->load_font_settings( 'f_excl', __CLASS__ );
        }

        //eastcoast1 settings

        // columns
        $td_ecoast1_flex = $res_ctx->get_style_att('td_ecoast1_flex', __CLASS__);
        if ( $td_ecoast1_flex == '' ||  $td_ecoast1_flex == 'ecoast1_3_columns' ) {
            $td_ecoast1_flex = 'ecoast1_3_columns';
            $res_ctx->load_settings_raw( 'ecoast1_3_columns',  1 );
        }
        if ( $td_ecoast1_flex == 'ecoast1_2_columns' ) {
            $res_ctx->load_settings_raw( 'ecoast1_2_columns',  1 );
        }
        if ( $td_ecoast1_flex == 'ecoast1_none' ) {
            $res_ctx->load_settings_raw( 'ecoast1_none',  1 );
        }

        // column1 width
        $td_column1_width_1ecoast = $res_ctx->get_style_att('td_column1_width_1ecoast', __CLASS__);
        if ( is_numeric( $td_column1_width_1ecoast ) ) {
            $res_ctx->load_settings_raw( 'td_column1_width_1ecoast', $td_column1_width_1ecoast . '%' );
        } else {
            $res_ctx->load_settings_raw( 'td_column1_width_1ecoast', $td_column1_width_1ecoast );
        }
        // icon width
        $td_ecoast1_icon_width = $res_ctx->get_style_att('td_ecoast1_icon_width', __CLASS__);
        if ( is_numeric( $td_ecoast1_icon_width ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_icon_width', $td_ecoast1_icon_width . '%' );
        } else {
            $res_ctx->load_settings_raw( 'td_ecoast1_icon_width', $td_ecoast1_icon_width );
        }

        //fonts here
        $res_ctx->load_font_settings( 'f_art_title_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_description_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_wifi_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_schedule_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_aircon_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_smoking_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_parking_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_payment_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_emaillabel_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_email_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_websitelabel_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_website_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_phonelabel_1ecoast', __CLASS__ );
        $res_ctx->load_font_settings( 'f_phone_1ecoast', __CLASS__ );

        //paddings and margins
        // title margins
        $td_ecoast1_title_ma = $res_ctx->get_style_att('td_ecoast1_title_ma', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_title_ma', $td_ecoast1_title_ma );
        if( $td_ecoast1_title_ma != '' && is_numeric( $td_ecoast1_title_ma ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_title_ma', $td_ecoast1_title_ma . 'px' );
        }
        // amenities margins
        $td_ecoast1_amenities_ma = $res_ctx->get_style_att('td_ecoast1_amenities_ma', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_amenities_ma', $td_ecoast1_amenities_ma );
        if( $td_ecoast1_amenities_ma != '' && is_numeric( $td_ecoast1_amenities_ma ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_amenities_ma', $td_ecoast1_amenities_ma . 'px' );
        }
        // mid amenities margins
        $td_ecoast1_mid_amenities_ma = $res_ctx->get_style_att('td_ecoast1_mid_amenities_ma', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_mid_amenities_ma', $td_ecoast1_mid_amenities_ma );
        if( $td_ecoast1_mid_amenities_ma != '' && is_numeric( $td_ecoast1_mid_amenities_ma ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_mid_amenities_ma', $td_ecoast1_mid_amenities_ma . 'px' );
        }
        // icon paddings
        $td_ecoast1_amenicon_pa = $res_ctx->get_style_att('td_ecoast1_amenicon_pa', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_amenicon_pa', $td_ecoast1_amenicon_pa );
        if( $td_ecoast1_amenicon_pa != '' && is_numeric( $td_ecoast1_amenicon_pa ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_amenicon_pa', $td_ecoast1_amenicon_pa . 'px' );
        }
        // icon border radius
        $td_ecoast1_amenicon_br = $res_ctx->get_style_att('td_ecoast1_amenicon_br', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_amenicon_br', $td_ecoast1_amenicon_br );
        if( $td_ecoast1_amenicon_br != '' && is_numeric( $td_ecoast1_amenicon_br ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_amenicon_br', $td_ecoast1_amenicon_br . 'px' );
        }
        // contact margins
        $td_ecoast1_contact_ma = $res_ctx->get_style_att('td_ecoast1_contact_ma', __CLASS__);
        $res_ctx->load_settings_raw( 'td_ecoast1_contact_ma', $td_ecoast1_contact_ma );
        if( $td_ecoast1_contact_ma != '' && is_numeric( $td_ecoast1_contact_ma ) ) {
            $res_ctx->load_settings_raw( 'td_ecoast1_contact_ma', $td_ecoast1_contact_ma . 'px' );
        }

        //colors here
        $res_ctx->load_settings_raw( 'td_eastcoast1_title_co', $res_ctx->get_style_att('td_eastcoast1_title_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_title_coho', $res_ctx->get_style_att('td_eastcoast1_title_coho', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_description_co', $res_ctx->get_style_att('td_eastcoast1_description_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_icon_co', $res_ctx->get_style_att('td_eastcoast1_icon_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_bg_icon_co', $res_ctx->get_style_att('td_eastcoast1_bg_icon_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_amenities_co', $res_ctx->get_style_att('td_eastcoast1_amenities_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_contla_co', $res_ctx->get_style_att('td_eastcoast1_contla_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_eastcoast1_contact_co', $res_ctx->get_style_att('td_eastcoast1_contact_co', __CLASS__) );






    }

	function render( $index_style = '' ) {
		if ( ! empty( $index_style ) ) {
			$this->index_style = $index_style;
		}
        $this->unique_style_class = td_global::td_generate_unique_id();

		return $this->get_style($this->get_css());
	}

	function get_style_att( $att_name ) {
		return $this->get_att( $att_name ,__CLASS__, $this->index_style );
	}

	function get_atts() {
		return $this->atts;
	}
}
