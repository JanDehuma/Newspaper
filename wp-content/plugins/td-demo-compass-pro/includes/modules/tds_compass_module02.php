<?php

class tds_compass_module02 extends td_module {

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

        $average_score = $this->show_custom_field_value('tdcf_average_score');
        ?>

            <style>

            </style>

        <div class="<?php echo $this->get_module_classes($additional_classes_array);?>">
            <div class="td-module-container">

                <div class="td-compass-image-wrap-style" style="color: #fff;">

                     <?php echo $this->get_image($image_size, true);?>

                    <div class="td-compass-meta-info-table">
                        <div class="td-compass-average-score-label">Average score</div>
                        <div class="td-compass-average-score-container">
                            <div class="td-compass-average-score">
                                <?php if ( $average_score != '' ) {
                                    echo $average_score;
                                } ?>
                            </div>
                        </div>
                        <div class="td-compass-title-header"><?php echo $this->get_title($title_length, $title_tag); ?></div>
                        <div class="td-compass-review-score-container"><div class="td-compass-review-score"><?php echo $average_rating;?></div></div>
                        <div class="td-compass-review-score-label">Review score</div>
                    </div>
                </div>
            </div>
        </div>

        <?php return ob_get_clean();
    }
}
