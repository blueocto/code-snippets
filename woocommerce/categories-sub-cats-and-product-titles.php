<?php 
    $taxonomy = 'product_cat'; 
    $orderby = 'name'; 
    $show_count = 0; // 1 for yes, 0 for no 
    $pad_counts = 0; // 1 for yes, 0 for no 
    $hierarchical = 1; // 1 for yes, 0 for no 
    $title = ''; 
    $empty = 0; 
    $args = array( 
        'taxonomy' => $taxonomy, 
        'orderby' => $orderby, 
        'show_count' => $show_count, 
        'pad_counts' => $pad_counts, 
        'hierarchical' => $hierarchical, 
        'title_li' => $title, 
        'hide_empty' => $empty
    );

    $all_categories = get_categories( $args ); 
    foreach ($all_categories as $cat) { 
        if($cat->category_parent == 0) { 
            $category_id = $cat->term_id; 
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
            $image = wp_get_attachment_url( $thumbnail_id ); 
            echo "<ul class='category'><li>".$cat->name; 
            $args2 = array( 
                'taxonomy' => $taxonomy, 
                'child_of' => 0, 
                'parent' => $category_id, 
                'orderby' => $orderby, 
                'show_count' => $show_count, 
                'pad_counts' => $pad_counts, 
                'hierarchical' => $hierarchical, 
                'title_li' => $title, 
                'hide_empty' => $empty
            ); 
            $sub_cats = get_categories( $args2 ); 
            if($sub_cats) { 
                foreach($sub_cats as $sub_category) { 
                    echo "<ul class='subcategory'>"; 
                    if($sub_cats->$sub_category == 0) { 
                        echo "<li>".$sub_category->cat_name;

                        /*echo "<pre>"; 
                        print_r($sub_category); 
                        echo "</pre>";*/ 

                        $args = array( 'post_type' => 'product','product_cat' => $sub_category->slug); 
                        $loop = new WP_Query( $args ); 
                        echo "<ul class='products'>"; 
                        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>

                        <li>
                            <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?></a>
                        </li>

                    <?php endwhile; ?>
                    </ul>

                <?php wp_reset_query(); ?>
                <?php
                    } else { 
                        echo "</li></ul></li>"; 
                    } 
                    echo "</ul>"; 
                } 
            } else { 
                $args = array( 'post_type' => 'product', 'product_cat' => $cat->slug ); 
                $loop = new WP_Query( $args ); 
                echo "<ul class='products'>"; 
                while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
            ?>

            <li>
                <a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?></a>
            </li>

        <?php endwhile; ?>
        </ul>
    </li>
</ul>
<?php 
        wp_reset_query(); 
    } 
        } else { 
            echo "</li></ul>"; 
        } 
    } 
?>