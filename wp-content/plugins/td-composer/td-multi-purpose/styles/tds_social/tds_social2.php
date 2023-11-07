<?php
/**
 * Created by PhpStorm.
 * User: tagdiv
 * Date: 13.07.2017
 * Time: 9:38
 */

class tds_social2 extends td_style {

    private $unique_style_class;
    private $atts = array();
    private $index_style;

    function __construct( $atts, $index_style = '') {
        $this->atts = $atts;
        $this->index_style = $index_style;
    }

	private function get_css() {

        $compiled_css = '';

        $unique_style_class = $this->unique_style_class;

		$raw_css =
			"<style>

                /* @style_general_social2 */
                .tds-social2 .tdm-social-item-wrap i,
                .tds-social2 .tdm-social-item-wrap .tdm-social-text {
                  color: #000;
                }
                .tds-social2 .tdm-social-item-wrap:hover i,
                .tds-social2 .tdm-social-item-wrap:hover .tdm-social-text {
                  color: var(--td_theme_color, #4db2ec);
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-behance {
                  color: #000000;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-blogger {
                  color: #ffa900;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-dribbble {
                  color: #ea4c89;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-facebook {
                  color: #3B5998;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-flickr {
                  color: #ff0084;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-instagram {
                  color: #3f729b;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-lastfm {
                  color: #ce2127;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-linkedin {
                  color: #007bb6;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-pinterest {
                  color: #cb2027;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-rss {
                  color: #f36f24;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-soundcloud {
                  color: #ff5500;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-tumblr {
                  color: #32506d;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-twitter {
                  color: #00aced;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-vimeo {
                  color: #5289cc;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-youtube {
                  color: #bb0000;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-vk {
                  color: #507299;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-naver {
                  color: #3ec729;
                }
                .tds-social2 .tdm-social-item-wrap:hover .td-icon-discord {
                  color: #7289DA;
                }

                
                
                /* @icons_size */
				.$unique_style_class .tdm-social-item i {
					font-size: @icons_size;
					vertical-align: middle;
				}
				.$unique_style_class .tdm-social-item i.td-icon-linkedin,
				.$unique_style_class .tdm-social-item i.td-icon-pinterest,
				.$unique_style_class .tdm-social-item i.td-icon-blogger,
				.$unique_style_class .tdm-social-item i.td-icon-vimeo {
					font-size: @icons_size_fix;
				}
				/* @icons_padding */
				.$unique_style_class .tdm-social-item {
					width: @icons_padding;
					height: @icons_padding;
				}
				.$unique_style_class .tdm-social-item i {
					line-height: @icons_padding;
				}
				/* @icons_margin_right */
				.$unique_style_class .tdm-social-item {
				    margin: @icons_margin_top_bottom @icons_margin_right @icons_margin_top_bottom 0;
				}
				/* @icon_last_margin_none */
				.$unique_style_class .tdm-social-item-wrap:last-child .tdm-social-item {
				    margin-right: 0 !important;
				}
                /* @icons_color */
				body .$unique_style_class.tds-social2 .tdm-social-item i,
				body .tds-team-member2 .$unique_style_class.tds-social2 .tdm-social-item i {
					color: @icons_color;
				}
				/* @icons_hover_color */
				body .$unique_style_class.tds-social2 .tdm-social-item-wrap:hover i {
					color: @icons_hover_color;
				}
				
				
				/* @show_names */
				.$unique_style_class .tdm-social-text {
					display: @show_names;
				}
				
                /* @name_space_left */
				.$unique_style_class .tdm-social-text {
					margin-left: @name_space_left;
				}
                /* @name_space_right */
				.$unique_style_class .tdm-social-text {
					margin-right: @name_space_right;
				}
				
                /* @name_color */
				body .$unique_style_class .tdm-social-item-wrap .tdm-social-text {
					color: @name_color;
				}
                /* @name_color_h */
				body .$unique_style_class .tdm-social-item-wrap:hover .tdm-social-text {
					color: @name_color_h;
				}
				
				
				
                /* @f_name */
				.$unique_style_class .tdm-social-text{
				    @f_name
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

        $res_ctx->load_settings_raw( 'style_general_social2', 1 );

        /*-- ICON -- */
        // icons size
        $icons_size = $res_ctx->get_shortcode_att( 'icons_size' );
        $res_ctx->load_settings_raw( 'icons_size',  $icons_size . 'px' );
        $res_ctx->load_settings_raw(  'icons_size_fix', $icons_size * 0.8  . 'px');

        // icons padding
        $res_ctx->load_settings_raw( 'icons_padding', $icons_size * $res_ctx->get_shortcode_att( 'icons_padding' ) . 'px' );

        // icons spacing
        $icons_spacing = $res_ctx->get_shortcode_att( 'icons_spacing' );
        if( $icons_spacing != '' ) {
            if ( is_numeric( $icons_spacing ) ) {
                $res_ctx->load_settings_raw( 'icons_margin_right',  $icons_spacing . 'px' );
                $res_ctx->load_settings_raw( 'icons_margin_top_bottom',  $icons_spacing / 2 . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'icons_margin_right', '10px' );
            $res_ctx->load_settings_raw( 'icons_margin_top_bottom', '5px' );
        }

        // icons color
        $res_ctx->load_settings_raw( 'icons_color', $res_ctx->get_style_att( 'icons_color', __CLASS__ ) );

        // icons hover color
        $res_ctx->load_settings_raw( 'icons_hover_color', $res_ctx->get_style_att( 'icons_hover_color', __CLASS__ ) );



        /*-- NAME -- */
        // show names
        $show_names = $res_ctx->get_shortcode_att('show_names');
        $res_ctx->load_settings_raw( 'show_names', $show_names );
        if( $show_names == '' || $show_names == 'none' ) {
            $res_ctx->load_settings_raw( 'icon_last_margin_none', 1 );
        }

        // name left space
        $name_space_left = $res_ctx->get_shortcode_att( 'name_space_left' );
        $res_ctx->load_settings_raw( 'name_space_left', $name_space_left );
        if( $name_space_left != '' ) {
            if( is_numeric( $name_space_left ) ) {
                $res_ctx->load_settings_raw( 'name_space_left', $name_space_left . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'name_space_left', '2px' );
        }

        // name right space
        $name_space_right = $res_ctx->get_shortcode_att( 'name_space_right' );
        $res_ctx->load_settings_raw( 'name_space_right', $name_space_right );
        if( $name_space_right != '' ) {
            if( is_numeric( $name_space_right ) ) {
                $res_ctx->load_settings_raw( 'name_space_right', $name_space_right . 'px' );
            }
        } else {
            $res_ctx->load_settings_raw( 'name_space_right', '18px' );
        }

        // name color
        $res_ctx->load_settings_raw( 'name_color', $res_ctx->get_style_att( 'name_color', __CLASS__ ) );

        // name hover color
        $res_ctx->load_settings_raw( 'name_color_h', $res_ctx->get_style_att( 'name_color_h', __CLASS__ ) );


        /*-- FONTS -- */
        $res_ctx->load_font_settings( 'f_name', __CLASS__ );

    }

    function render( $index_style = '' ) {
        if ( ! empty( $index_style ) ) {
            $this->index_template = $index_style;
        }
        $this->unique_style_class = td_global::td_generate_unique_id();

        // social open in new window
        $target = '';
        if ( '' !== $this->get_shortcode_att( 'open_in_new_window' ) ) {
            $target = ' target="_blank" ';
        }

        //set rel on link
        $td_social_rel = '';
        if ('' !== $this->get_shortcode_att('social_rel')) {
            $td_social_rel = ' rel="' . $this->get_shortcode_att('social_rel') . '" ';
        }

        $show_names = $this->get_shortcode_att('show_names');
        if ( $show_names == '' || $show_names == 'none' ) {
            $show_names = 'hide';
        }

        // extra input for youtube
        $td_youtube_add_input = '';
        if ('' !== $this->get_shortcode_att('youtube_add_input')) {
            $td_youtube_add_input = rawurldecode( base64_decode( strip_tags( $this->get_shortcode_att('youtube_add_input') ) ) );
        }

        // extra social icon
        $extra_social_icon = $this->get_icon_att('extra_social_tdicon');
        $data_icon = '';
        if ( td_util::tdc_is_live_editor_iframe() || td_util::tdc_is_live_editor_ajax() ) {
            $data_icon = 'data-td-svg-icon="' . $this->get_att('extra_social_tdicon') . '"';
        }

        $svg_code = '';
        if ( base64_encode( base64_decode( $extra_social_icon ) ) == $extra_social_icon ) {
            $svg_code = base64_decode( $extra_social_icon );
        }

        // extra social name
        $extra_social_name = '';
        if ('' !== $this->get_shortcode_att('extra_social_name')) {
            $extra_social_name = $this->get_shortcode_att('extra_social_name') ;
        }
        // extra social url
        $extra_social_url = '#';
        if ('' !== $this->get_shortcode_att('extra_social_url')) {
            $extra_social_url = td_util::get_custom_field_value_from_string($this->get_shortcode_att('extra_social_url')) ;
        }

        //socials in order of input
        $social_ordered_array = array();
        if( '' !== $this->get_shortcode_att('social_order') ) {
            $social_ordered_array = array_map( 'trim', explode( ',' , $this->get_shortcode_att('social_order') ) );
        }

        $buffy = $this->get_style($this->get_css());
        $buffy .= '<div class="tdm-social-wrapper ' . self::get_class_style(__CLASS__) . ' ' . $this->unique_style_class . '">';

            $social_array = array();

            //in order of input
            if ( !empty($social_ordered_array) ) {
                foreach ( $social_ordered_array as $index => $social_id ) {
                    if( $social_id == 'mail' ) {
                        $social_id = 'mail-1';
                    }

                    if ( array_key_exists ( strtolower($social_id), td_social_icons::$td_social_icons_array ) ) {
                        $social_array[$social_id] = array($this->get_shortcode_att(strtolower($social_id)), ucfirst($social_id));
                    }
                }
            } else { //get all
                foreach ( td_social_icons::$td_social_icons_array as $social_id => $social_name ) {
                    $social_array[$social_id] = array( $this->get_shortcode_att( $social_id ), $social_name );
                }
            }

            //display only the socials with url
            foreach ( $social_array as $social_key => $social_value ) {
                $social_url = td_util::get_custom_field_value_from_string( $social_value[0] );

                if( !empty( $social_url ) ) {

                    if ( $social_key === 'youtube') {
                        $social_url = $td_youtube_add_input . $social_url;
                    }

                    $buffy .= '<div class="tdm-social-item-wrap">';
                        $buffy .= '<a href="' . $social_url . '" ' . $target . $td_social_rel . ' title="' . $social_value[1] . '" class="tdm-social-item">';
                            $buffy .= '<i class="td-icon-font td-icon-' . strtolower($social_key) . '"></i>';
                            $buffy .= '<span style="display: none">' . $social_value[1] . '</span>';
                        $buffy .= '</a>';

                        if ( $show_names !== 'hide' ) {
                            $buffy .= '<a href="' . $social_url . '" ' . $target . $td_social_rel . ' class="tdm-social-text">' . ($social_value[1] == 'Mail-1' ? 'Mail' : $social_value[1]) . '</a>';
                        }

                        $buffy .= '</div>';
                }
            }
            if ( $extra_social_icon != '' ) {

                $buffy .= '<div class="tdm-social-item-wrap">';
                $buffy .= '<a href="' . $extra_social_url . '" ' . $target . $td_social_rel . ' title="' . $extra_social_name . '" class="tdm-social-item">';
                if ( $svg_code == '' ) {
                    $buffy .= '<i class="' . self::get_group_style( __CLASS__ ) . ' ' . $extra_social_icon . ' ' . $this->unique_style_class . ' td-fix-index"></i>';
                } else {
                    $buffy .= '<div class="' . self::get_group_style( __CLASS__ ) . ' tds-icon-svg-wrap ' . $this->unique_style_class . ' td-fix-index"><div class="tds-icon-svg" ' . $data_icon . '>' . $svg_code . '</div></div>';
                }
                $buffy .= '<span style="display: none">' . $extra_social_name . '</span>';
                $buffy .= '</a>';
                if ( $extra_social_name !== '' ) {
                    $buffy .= '<a href="' . $extra_social_url . '" class="tdm-social-text" ' . $target . $td_social_rel . ' >' . $extra_social_name . '</a>';
                }
                $buffy .= '</div>';

            }
        $buffy .= '</div>';

		return $buffy;
	}

    function get_style_att( $att_name ) {
        return $this->get_att( $att_name ,__CLASS__, $this->index_style );
    }

    function get_atts() {
        return $this->atts;
    }
}
