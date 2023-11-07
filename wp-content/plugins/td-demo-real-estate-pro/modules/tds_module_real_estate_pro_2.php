<?php

class tds_module_real_estate_pro_2 extends td_module {

    function __construct($post_data_array, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post_data_array, $module_atts);
    }

    function render($shortcode_class = '', $style_class = '') {
        ob_start();

        $hide_image = $this->get_shortcode_att('hide_image', '', $style_class);
        $image_size = $this->get_shortcode_att('image_size', '', $style_class);
        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }
        $title_length = $this->get_shortcode_att('mc1_tl', '', $style_class);
        $title_tag = $this->get_shortcode_att('mc1_title_tag', '', $style_class);


        // Custom fields
        $location = $this->show_custom_field_value('tdb-location-complete');
        $price = $this->show_custom_field_value('tdcf_price');
        $price_per = $this->show_custom_field_value('tdcf_price_per');
        $bedrooms = $this->show_custom_field_value('tdcf_bedrooms');
        $bathrooms = $this->show_custom_field_value('tdcf_bathrooms');
        $living_area_surface = $this->show_custom_field_value('tdcf_living_area_surface');


        // Get only the city, state and country from the location field
        $location_address = strtok($location, ',');
        $location = str_replace($location_address . ', ', '', $location);


        // Additional classes
        $additional_classes_array = array('tdb_module_loop');
        $additional_classes_array = apply_filters('td_composer_module_exclusive_class', $additional_classes_array, $this->post);

        $h_effect = $this->get_shortcode_att('h_effect', '', $style_class);
        if ($h_effect != '') {
            $additional_classes_array[] = 'td-h-effect-' . $h_effect;
        }


        ?>

        <div class="<?php echo $this->get_module_classes($additional_classes_array); ?>">
            <div class="td-module-container">
                <?php if ($hide_image == '') { ?>
                    <div class="td-image-container">
                        <?php echo $this->get_image($image_size, true); ?>
                        <?php echo $this->get_video_duration(); ?>
                    </div>
                <?php } ?>

                <div class="td-module-meta-info">
                    <?php echo $this->get_title($title_length, $title_tag); ?>

                    <?php if ($location != '') { ?>
                        <div class="td-location">
                            <?php echo td_util::get_custom_svg_icon('real_estate_location', 'td-location-icon') ?>
                            <div class="td-location-txt">
                                <?php echo $location ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="td-custom-fields-wrapp">
                        <?php if ($bedrooms != '') { ?>
                            <div class="td-custom-field td-custom-field-bedrooms">
                                <div class="td-custom-field-value">
                                    <?php echo td_util::get_custom_svg_icon('real_estate_bedrooms', 'td-custom-field-value-icon') ?>
                                    <div class="td-custom-field-value-text">
                                        <?php echo $bedrooms ?>
                                    </div>
                                </div>

                                <div class="td-custom-field-label">Bedrooms</div>
                            </div>
                        <?php } ?>

                        <?php if ($bathrooms != '') { ?>
                            <div class="td-custom-field td-custom-field-bathrooms">
                                <div class="td-custom-field-value">
                                    <?php echo td_util::get_custom_svg_icon('real_estate_bathrooms', 'td-custom-field-value-icon') ?>
                                    <div class="td-custom-field-value-text">
                                        <?php echo $bathrooms ?>
                                    </div>
                                </div>

                                <div class="td-custom-field-label">Bathrooms</div>
                            </div>
                        <?php } ?>

                        <?php if ($living_area_surface != '') { ?>
                            <div class="td-custom-field td-custom-field-area-surface">
                                <div class="td-custom-field-value">
                                    <?php echo td_util::get_custom_svg_icon('real_estate_living_area', 'td-custom-field-value-icon') ?>
                                    <div class="td-custom-field-value-text">
                                        <?php echo $living_area_surface ?> m2
                                    </div>
                                </div>

                                <div class="td-custom-field-label">Living area</div>
                            </div>
                        <?php } ?>

                        <!--                        <div class="td-custom-fields-price">-->
                        <!--                            --><?php //if( $price != '' ) { ?>
                        <!--                                <span class="td-custom-field-price">$-->
                        <?php //echo $price ?><!--</span>-->
                        <!--                            --><?php //} ?>
                        <!---->
                        <!--                            --><?php //if( $price_per != '' ) { ?>
                        <!--                                <span class="td-custom-field-price-per">Per -->
                        <?php //echo $price_per ?><!--</span>-->
                        <!--                            --><?php //} ?>
                        <!--                        </div>-->
                        <!---->
                        <!--                        --><?php //echo $this->show_user_ratings_stars('', '', '', true); ?>
                    </div>

                    <div class="td-price-wrapp">
                        <div class="td-price">
                            <?php if ($price != '') { ?>
                                <span class="td-price-value">$<?php echo $price ?></span>
                            <?php } ?>

                            <?php if ($price_per != '') { ?>
                                <span class="td-price-per">Per <?php echo $price_per ?></span>
                            <?php } ?>
                        </div>

                        <?php echo $this->show_user_ratings_stars('', '', '', true); ?>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
