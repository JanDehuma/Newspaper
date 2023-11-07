<?php

class tds_module_real_estate_pro_1 extends td_module {

    function __construct($post_data_array, $module_atts = array()) {
        //run the parrent constructor
        parent::__construct($post_data_array, $module_atts);
    }

    function render($shortcode_class = '', $style_class = '') {
        ob_start();

        $hide_image = $this->get_shortcode_att('hide_image', '', $style_class);
        $image_size = $this->get_shortcode_att('image_size', '', $style_class);
        $title_length = $this->get_shortcode_att('mc1_tl', '', $style_class);
        $title_tag = $this->get_shortcode_att('mc1_title_tag', '', $style_class);
        $location = $this->show_custom_field_value('tdb-location-complete');
        $price = $this->show_custom_field_value('tdcf_price');
        $price_per = $this->show_custom_field_value('tdcf_price_per');

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }

        // Get only the city, state and country from the location field
        $location_address = strtok($location, ',');
        $location = str_replace($location_address . ', ', '', $location);


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
                        <div class="td-custom-fields-price">
                            <?php if ($price != '') { ?>
                                <span class="td-custom-field-price">$<?php echo $price ?></span>
                            <?php } ?>

                            <?php if ($price_per != '') { ?>
                                <span class="td-custom-field-price-per">Per <?php echo $price_per ?></span>
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
