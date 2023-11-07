<?php

class tds_eastcoastcheck_module01 extends td_module {

    function __construct( $post_data_array, $module_atts = array() ) {
        //run the parrent constructor
        parent::__construct( $post_data_array, $module_atts );
    }

    function render( $shortcode_class = '', $style_class = '' ) {
        ob_start();
        $image_size = $this->get_shortcode_att('image_size', '', $style_class);

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }


        $additional_classes_array = array('tdb_module_loop');
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        $title_length = $this->get_shortcode_att('mc1_tl', '', $style_class);
        $title_tag = $this->get_shortcode_att('mc1_title_tag', '', $style_class);
        $excerpt_length = $this->get_shortcode_att('mc1_el', '', $style_class);

        $free_wifi = $this->show_custom_field_value('tdcf_free_wifi');
        $open_247 = $this->show_custom_field_value('tdcf_open_247');
        $air_conditioning = $this->show_custom_field_value('tdcf_air_conditioning');
        $smoking_area = $this->show_custom_field_value('tdcf_smoking_area');
        $private_parking = $this->show_custom_field_value('tdcf_private_parking');
        $cash_credit = $this->show_custom_field_value('tdcf_cash_credit');
        $email_address = $this->show_custom_field_value('tdcf_email_address');
        $website = $this->show_custom_field_value('tdcf_website');
        $phone_number = $this->show_custom_field_value('tdcf_phone_number');

        ?>
        <style>


        </style>
        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container">
                <div class="td-eastcoast01-image-container td-image-container">
                    <?php echo $this->get_image($image_size, true);?>
                </div>
                <div class="td-eastcoast01-meta-info-container">
                    <div class="td-eastcoast01-title"><?php echo $this->get_title($title_length, $title_tag); ?></div>
                    <div class="td-ecoast1-description"><?php echo $this->get_excerpt($excerpt_length); ?></div>
                    <div class="td-eastcoast01-amenities-firstrow">
                        <div class="td-eastcoast01-amenity-container">
                            <div class="td-eastcoast01-amenities">
                                <div class="td-eastcoast01-amenity-icon-cont">
                                    <div class="td-eastcoast01-amenity-icon">
                                        <?php echo td_util::get_custom_svg_icon('eastcoast-wifi'); ?>
                                    </div>
                                </div>
                                <div class="td-eastcoast01-amenity01-description">
                                    <?php if ( $free_wifi != '' ) {
                                        echo $free_wifi;
                                    } ?>
                                </div>
                            </div>
                            <div class="td-eastcoast01-mid-amenities">
                                <div class="td-eastcoast01-amenity-icon-cont">
                                    <div class="td-eastcoast01-amenity-icon">
                                        <?php echo td_util::get_custom_svg_icon('eastcoast-schedule'); ?>
                                    </div>
                                </div>
                                <div class="td-eastcoast01-amenity02-description">
                                    <?php if ( $open_247 != '' ) {
                                        echo $open_247;
                                    } ?>
                                </div>
                            </div>
                            <div class="td-eastcoast01-amenities">
                                <div class="td-eastcoast01-amenity-icon-cont">
                                    <div class="td-eastcoast01-amenity-icon">
                                        <?php echo td_util::get_custom_svg_icon('eastcoast-aircon'); ?>
                                    </div>
                                </div>
                                <div class="td-eastcoast01-amenity03-description">
                                    <?php if ( $air_conditioning != '' ) {
                                        echo $air_conditioning;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="td-eastcoast01-amenities-secondrow">
                            <div class="td-eastcoast01-amenity-container">
                                <div class="td-eastcoast01-amenities">
                                    <div class="td-eastcoast01-amenity-icon-cont">
                                        <div class="td-eastcoast01-amenity-icon">
                                            <?php echo td_util::get_custom_svg_icon('eastcoast-smoking'); ?>
                                        </div>
                                    </div>
                                    <div class="td-eastcoast01-amenity04-description">
                                        <?php if ( $smoking_area != '' ) {
                                            echo $smoking_area;
                                        } ?>
                                    </div>
                                </div>
                                <div class="td-eastcoast01-mid-amenities">
                                    <div class="td-eastcoast01-amenity-icon-cont">
                                        <div class="td-eastcoast01-amenity-icon">
                                            <?php echo td_util::get_custom_svg_icon('eastcoast-parking'); ?>
                                        </div>
                                    </div>
                                    <div class="td-eastcoast01-amenity05-description">
                                        <?php if ( $private_parking != '' ) {
                                            echo $private_parking;
                                        } ?>
                                    </div>
                                </div>
                                <div class="td-eastcoast01-amenities">
                                    <div class="td-eastcoast01-amenity-icon-cont">
                                        <div class="td-eastcoast01-amenity-icon">
                                            <?php echo td_util::get_custom_svg_icon('eastcoast-payment'); ?>
                                        </div>
                                    </div>
                                    <div class="td-eastcoast01-amenity06-description">
                                        <?php if ( $cash_credit != '' ) {
                                            echo $cash_credit;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="td-eastcoast01-contact-prev">
                    <div class="td-eastcoast01-contact">
                        <div class="td-eastcoast01-email">
                            <div class="td-eastcoast01-email-description">
                                Email:
                            </div>
                            <div class="td-eastcoast01-email-cf">
                                <?php if ( $email_address != '' ) {
                                    echo $email_address;
                                } ?>
                            </div>
                        </div>
                        <div class="td-eastcoast01-website">
                            <div class="td-eastcoast01-website-description">
                                Website:
                            </div>
                            <div class="td-eastcoast01-website-cf">
                                <?php if ( $website != '' ) {
                                    echo $website;
                                } ?>
                            </div>
                        </div>
                        <div class="td-eastcoast01-phone">
                            <div class="td-eastcoast01-phone-description">
                                Phone:
                            </div>
                            <div class="td-eastcoast01-phone-cf">
                                <?php if ( $phone_number != '' ) {
                                    echo $phone_number;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
