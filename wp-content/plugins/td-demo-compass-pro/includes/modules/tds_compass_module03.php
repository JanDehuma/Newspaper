<?php

class tds_compass_module03 extends td_module {

    function __construct( $post_data_array, $module_atts = array() ) {
        //run the parrent constructor
        parent::__construct( $post_data_array, $module_atts );
    }

    function render( $shortcode_class = '', $style_class = '' ) {

        ob_start();

//        $curr_template_type = tdb_state_template::get_template_type();
//
//            global $tdb_state_single;
//            $post_user_reviews_data = $tdb_state_single->post_user_reviews->__invoke();
//
//            $reviews_average = $post_user_reviews_data['reviews_average'];
//
//        echo '<span style="color: #fff;">';
//        var_dump($reviews_average);
//        echo '</span>';

        $average_rating = ('' != td_util::get_overall_post_rating($this->post->ID)) ? td_util::get_overall_post_rating($this->post->ID) : '-';

        $image_size = $this->get_shortcode_att('image_size', '', $style_class);

        if (empty($image_size)) {
            $image_size = 'td_696x0';
        }


        $additional_classes_array = array('tdb_module_loop');
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        $title_length = $this->get_shortcode_att('mc1_tl', '', $style_class);
        $title_tag = $this->get_shortcode_att('mc1_title_tag', '', $style_class);

        $label = $this->show_custom_field_value('tdcf_label');
        $release_date = $this->show_custom_field_value('tdcf_release_date');
        $average_score = $this->show_custom_field_value('tdcf_average_score');

        /** Get the taxonomies*/
        $categories = $this->get_shortcode_att('categories', '', $style_class);
        $cat_limit = $this->get_shortcode_att('cat_limit', '', $style_class);
        if ('' !== $categories) {
            $categories_arr = explode(',', $categories);
            $categories_arr = array_map('trim', $categories_arr);
        }
        ?>

            <style>


            </style>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container">
                <div class="td-compass-title-flex3"><?php echo $this->get_title($title_length, $title_tag); ?></div>
                <div class="td-meta-info-compass-3">
                    <div class="td-compass-image-container-3"> <?php echo $this->get_image($image_size, true);?> </div>
                    <div class="td-compass-meta-info-container-3">
                        <div class="td-compass-label-container-3">
                            <div class="td-compass-label-3">Label:</div>
                            <div class="td-compass-label-name-3">
                                <?php if ( $label != '' ) {
                                    echo $label;
                                } ?>
                            </div>
                        </div>
                        <div class="td-compass-release-date-container-3">
                            <div class="td-compass-release-date-3">Release date:</div>
                            <div class="td-compass-release-date-name-3">
                                <?php if ( $release_date != '' ) {
                                    echo $release_date;
                                } ?>
                            </div>
                        </div>
                        <div class="td-compass-average-score-container-3">
                            <div class="td-compass-average-score-3">Average Score:</div>
                            <div class="td-compass-average-score-name-3">
                                <?php if ( $average_score != '' ) {
                                    echo $average_score;
                                } ?>
                            </div>
                        </div>
                        <div class="td-compass-review-score-container-3">
                            <div class="td-compass-review-score-3">Review Score:</div>
                            <div class="td-compass-review-score-name-3"><?php echo $average_rating; ?></div>
                        </div>
                    </div>
                </div>
<!--                <div class="td-compass-tags-taxonomies-3">Rock</div>-->
                <?php
                /**
                Category / tags lists
                 */
                if (!empty($categories_arr)) {
                    foreach ($categories_arr as $value) {
                        $post_cat_set = get_the_terms($this->post->ID, $value);
                        if ( false !== $post_cat_set && !is_wp_error($post_cat_set)) {
                            echo '<div class="td-modc-tax-list td-compass-tags-taxonomies-3">';

                            // Limit the taxonomies
                            if ('' !== $cat_limit) {
                                $post_cat_set = array_slice($post_cat_set, 0, $cat_limit);
                            }

                            foreach ($post_cat_set as $cat_set) {
                                $term_link = get_term_link($cat_set->term_id);
                                echo "<a href='$term_link'>$cat_set->name</a>";
                            }
                            echo '</div>';
                        }

                    }

                }
                ?>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
