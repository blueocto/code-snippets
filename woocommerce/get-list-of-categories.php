<!-- Need this to pull out the product categories -->

<?php //list terms in a given taxonomy using wp_list_categories
$taxonomy     = 'product_cat';
$orderby      = 'name'; 
$show_count   = 0;      // 1 for yes, 0 for no
$pad_counts   = 0;      // 1 for yes, 0 for no
$hierarchical = 1;      // 1 for yes, 0 for no
$title        = '';
$args = array(
'taxonomy'     => $taxonomy,
'orderby'      => $orderby,
'show_count'   => $show_count,
'pad_counts'   => $pad_counts,
'hierarchical' => $hierarchical,
'title_li'     => $title,
// 'child_of'   => 47 //Device Type
); ?>
<?php wp_list_categories( $args ); ?>