<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_compass_module_style04 extends td_style {

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

                /* @image_height */
				.$unique_block_class .td-image-wrap {
					padding-bottom: @image_height;
				}
				.$unique_block_class .td-compass-meta-4info {
                    color: white;
                }
                .$unique_block_class .td-compass-button-4link {
                    color: white;
                    display: flex;
                    justify-content: center;

                }
                .$unique_block_class .td-compass-buy-4album {
                    z-index: 23435;
                }
				/* @image_width */
				.$unique_block_class .td-compass-image-container-3  {
				 	flex: 0 0 @image_width;
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
                
                
			
			    /* @f_art_title */
				.$unique_block_class .td-module-title {
					@f_art_title;
				}
				/* @article_title_color */
				.$unique_block_class .td-module-title a {
					color: @article_title_color;
				}
				/* @article_title_color_h */
				.$unique_block_class .td-module-title a:hover {
					color: @article_title_color_h;
				}
				/* @art_tit_margin */
				.$unique_block_class .td-module-title {
					margin: @art_tit_margin;
				}
				/* @release_date_color */
				.$unique_block_class .tdcf-release-date {
					color: @release_date_color;
				}
				/* @f_release_date */
				.$unique_block_class .tdcf-release-date {
					@f_release_date;
				}
				/* @release_date_margin */
				.$unique_block_class .tdcf-release-date {
					margin: @release_date_margin;
				}
				/* @f_rating_text */
				.$unique_block_class .td-ratings .td-ratings-score .score {
					@f_rating_text;
				}
				/* @f_rating_label */
				.$unique_block_class .td-ratings .td-ratings-score .score-name {
					@f_rating_label;
				}
				/* @ratings_label_margin */
				.$unique_block_class .td-ratings .td-ratings-score .score-name {
					margin: @ratings_label_margin;
				}
				/* @rating_text_color */
				.$unique_block_class .td-ratings-score .score {
					color: @rating_text_color;
				}
				/* @border_color */
				.$unique_block_class .td-ratings-score .score .border {
					background: @border_color;
				}
				/* @border_height */
				.$unique_block_class .td-ratings-score .score .border {
					height: @border_height;
				}
				/* @rating_label_color */
				.$unique_block_class .td-ratings-score .score-name {
					color: @rating_label_color;
				}
				/* @f_list_title */
				.$unique_block_class .td-track-list .td-track-list_title {
					@f_list_title;
				}
				/* @f_list_items */
				.$unique_block_class .td-track-list .td-track-list_content p {
					@f_list_items;
				}
				/* @list_title_margin */
				.$unique_block_class .td-track-list .td-track-list_title {
					margin: @list_title_margin;
				}
				/* @list_title_color */
				.$unique_block_class .td-track-list .td-track-list_title {
					color: @list_title_color;
				}
				/* @list_items_color */
				.$unique_block_class .td-track-list .td-track-list_content p {
					color: @list_items_color;
				}
				
				
				/* @modules_on_row */
				.$unique_block_class .td_module_wrap:not(.tdb_module_rec) {
					width: @modules_on_row;
				}
				/* @modules_gap */
				.$unique_block_class .td_module_wrap {
					padding-left: @modules_gap;
					padding-right: @modules_gap;
				}
				/* @m_padding */
				.$unique_block_class .td-module-container {
					padding: @m_padding;
				}
				/* @modules_border_size */
				.$unique_block_class .td_module_wrap {
				    border-width: @modules_border_size;
				    border-style: solid;
				    border-color: #000;
				}
				/* @modules_border_style */
				.$unique_block_class .td_module_wrap {
				    border-style: @modules_border_style;
				}
				/* @modules_border_color */
				.$unique_block_class .td_module_wrap {
				    border-color: @modules_border_color;
				}
				.$unique_block_class .td_module_wrap:last-child {
				    border: none;
				}
				.$unique_block_class .td-next-prev-wrap {
                    position: absolute;
                    bottom: 50%;
                    width: 100%;
                }
                .$unique_block_class .td-ajax-next-page{
                    position: absolute;
                    right: 0;
                    margin-right: -40px;
                }
                
                .$unique_block_class .td-ajax-prev-page{
                    margin-left: -40px;
                }
                @media (max-width:765px) {
                    .tds_compass_module_style04 .td-next-prev-wrap {
                        position: relative!important;
                        display: flex;
                        justify-content: center;
                    }
                }
                @media (max-width:765px) {
                    .tds_compass_module_style04 .td-ajax-next-page{
                        position: relative;
                        right: 0;
                        margin-right: 0;
                    }
                }
                @media (max-width:765px) {
                    .tds_compass_module_style04 .td-ajax-prev-page{
                        margin-left: 0;
                    }
                }
                .$unique_block_class .tds_compass_module04 {
                padding-bottom: 0;
                }
                
                /* container bottom padding */
                .$unique_block_class .td-module-container {
                margin: 0 0 20px 0;
                }
                
                /* @td_compass_buy_padding_4 */
                .$unique_block_class .td-compass-buy-4album a {
                padding: @td_compass_buy_padding_4;
                }
                /* @td_compass_buy_album_margin_4 */
                .$unique_block_class .td-compass-buy-4album a {
                margin: @td_compass_buy_album_margin_4;
                }
                /* @td_compass_title_4 */
                .$unique_block_class .td-compass-meta-4info .td-compass-title4-header {
                margin: @td_compass_title_4;
                }
                /* @f_compass_buy_album_4 */
                .$unique_block_class .td-module-container .td-compass-buy-4album .td-compass-button-4link {
                    @f_compass_buy_album_4;
                }
                /* @f_compass_art_title_4 */
                .$unique_block_class .td-compass-meta-4info .td-compass-title4-header .entry-title {
                    @f_compass_art_title_4;
                }
                /* @f_compass_release_date_4 */
                .$unique_block_class .td-compass-release44-date {
                    @f_compass_release_date_4;
                }
                
                /* @td_compass_buy_album_co */
                .$unique_block_class .td-compass-button-4link {
                    color: @td_compass_buy_album_co;
                }
                /* @td_compass_buy_album_co_ho */
                .$unique_block_class .td-compass-button-4link:hover {
                    color: @td_compass_buy_album_co_ho;
                }
                /* @td_compass_title_co */
                .$unique_block_class .td-compass-title4-header a {
                    color: @td_compass_title_co;
                }
                /* @td_compass_title_co_ho */
                .$unique_block_class .td-compass-title4-header a:hover {
                    color: @td_compass_title_co_ho;
                }
                /* @td_compass_release_date_co */
                .$unique_block_class .td-compass-release44-date {
                    color: @td_compass_release_date_co;
                }
                
                /* @compass_img4_shadow */
				.$unique_block_class .td-module-container .td-compass-image4-container {
				    box-shadow: @compass_img4_shadow;
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

        // image radius
        $image_radius = $res_ctx->get_style_att('image_radius', __CLASS__);
        $res_ctx->load_settings_raw( 'image_radius', $image_radius );
        if ( is_numeric( $image_radius ) ) {
            $res_ctx->load_settings_raw( 'image_radius', $image_radius . 'px' );
        }


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

        // stuff for compasssssss
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

        //padding for buy album
        $td_compass_buy_padding_4 = $res_ctx->get_style_att('td_compass_buy_padding_4', __CLASS__);
        $res_ctx->load_settings_raw( 'td_compass_buy_padding_4', $td_compass_buy_padding_4 );
        if ( is_numeric( $td_compass_buy_padding_4 ) ) {
            $res_ctx->load_settings_raw( 'td_compass_buy_padding_4', $td_compass_buy_padding_4 . 'px' );
        }

        // buy album margin
        $td_compass_buy_album_margin_4 = $res_ctx->get_style_att('td_compass_buy_album_margin_4', __CLASS__);
        $res_ctx->load_settings_raw( 'td_compass_buy_album_margin_4', $td_compass_buy_album_margin_4 );
        if ( is_numeric( $td_compass_buy_album_margin_4 ) ) {
            $res_ctx->load_settings_raw( 'td_compass_buy_album_margin_4', $td_compass_buy_album_margin_4 . 'px' );
        }
        // title margin
        $td_compass_title_4 = $res_ctx->get_style_att('td_compass_title_4', __CLASS__);
        $res_ctx->load_settings_raw( 'td_compass_title_4', $td_compass_title_4 );
        if ( is_numeric( $td_compass_title_4 ) ) {
            $res_ctx->load_settings_raw( 'td_compass_title_4', $td_compass_title_4 . 'px' );
        }

        //fonts
        $res_ctx->load_font_settings( 'f_compass_buy_album_4', __CLASS__ );
        $res_ctx->load_font_settings( 'f_compass_art_title_4', __CLASS__ );
        $res_ctx->load_font_settings( 'f_compass_release_date_4', __CLASS__ );

        //colors
        $res_ctx->load_settings_raw( 'td_compass_buy_album_co', $res_ctx->get_style_att('td_compass_buy_album_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_compass_buy_album_co_ho', $res_ctx->get_style_att('td_compass_buy_album_co_ho', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_compass_title_co', $res_ctx->get_style_att('td_compass_title_co', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_compass_title_co_ho', $res_ctx->get_style_att('td_compass_title_co_ho', __CLASS__) );
        $res_ctx->load_settings_raw( 'td_compass_release_date_co', $res_ctx->get_style_att('td_compass_release_date_co', __CLASS__) );

        $res_ctx->load_shadow_settings( 0, 0, 0, 0, 'rgba(0, 0, 0, 0.08)', 'compass_img4_shadow', __CLASS__ );






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
