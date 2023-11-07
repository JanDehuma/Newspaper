<?php

class tds_compass_module01 extends td_module {

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

        $average_rating = ('' != td_util::get_overall_post_rating($this->post->ID)) ? td_util::get_overall_post_rating($this->post->ID) : '-';

        $additional_classes_array = array('tdb_module_loop');
        $additional_classes_array = apply_filters( 'td_composer_module_exclusive_class', $additional_classes_array, $this->post );
        $title_length = $this->get_shortcode_att('mc1_tl', '', $style_class);
        $title_tag = $this->get_shortcode_att('mc1_title_tag', '', $style_class);

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

                <div class="td-header-row" style="display: flex; flex-direction: row;">
                    <div class="td-image-container" style="width: 30%;">
                        <?php echo $this->get_image($image_size, true);?>
                    </div>
                    <div class="td-module-meta-info" style="padding: 0; padding-left: 10px;">
                        <?php echo $this->get_title($title_length, $title_tag); ?>
                        <div class="tdcf-release-date"><span class="label">Release Date: </span>
                            <?php if ( $release_date != '' ) {
                                echo $release_date;
                            } ?>
                        </div>
                        <div class="td-ratings">
                            <div class="td-ratings-score td-average-score">
                                <div class="score">
                                    <?php if ( $average_score != '' ) {
                                        echo $average_score;
                                    } ?>
                                    <div class="border"></div>
                                </div>
                                <div class="score-name">Average score</div>
                            </div>
                            <div class="td-ratings-score td-review-score">
                                <div class="score">
                                    <?php echo $average_rating; ?>
                                    <div class="border"></div>
                                </div>
                                <div class="score-name">Review score</div>
                            </div>
                        </div>

                    </div>
                </div> <!-- .td-header-row -->

                <?php
                /**
                Category / tags lists
                 */
                if (!empty($categories_arr)) {
                    foreach ($categories_arr as $value) {
                        $post_cat_set = get_the_terms($this->post->ID, $value);
                        if ( false !== $post_cat_set && !is_wp_error($post_cat_set)) {
                            echo '<div class="td-modc-tax-list">';

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

                <div class="td-track-list">
		            <?php $tdcf_track_list = function_exists('get_field_object') ?? get_field_object('tdcf_track_list', $this->post->ID ); ?>
		            <?php

		            //print_r($tdcf_track_list);
		            $tdcf_track_list_label = !empty( $tdcf_track_list['label'] ) ? $tdcf_track_list['label'] : 'Track List';
//		            $tdcf_track_list_content = wpautop( get_field('tdcf_track_list', $this->post->ID ) );

		            ?>
                    <h3 class="td-track-list_title"><?php echo $tdcf_track_list_label; ?></h3>
                    <div class="td-track-list_content">
			            <?php //echo $tdcf_track_list_content; ?>
                        <?php if (function_exists('get_field')) {
                            echo get_field('tdcf_track_list', $this->post->ID);
                        }?>
                    </div>
                </div>

            </div>
        </div>

        <?php return ob_get_clean();
    }
}
