<?php get_header(); ?>

<h1 class="temp">taxonomy-property-type.php</h1>

<main id="site-content">
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

		<header class="devs--header">
			
			<div class="devs--trigger">
				<div class="devs--heading">
					<h1 class="devs--h1">Our Developments</h1>
					<p class="h4 trigger-label">filter by location and property type <i class="svg-chevron" aria-hidden="true"></i></p>
				</div>

				<!-- <input type="checkbox" class="visuallyhidden checkbox--trigger" /> -->

				<section class="devs--filters">
					<div class="filter-categories">
						<p class="h4 filter--title">property - </p>
						<p class="filters">
							<span class="property-filter filter-cat is-default selected" data-ptype-id="-1">all types</span>

							<?php
								if( $terms = get_terms( 
									array( 'taxonomy' => 'property-type', 'orderby' => 'name' )
								) ) { 
									foreach ( $terms as $term ) {
										if($term->name !== 'All Properties (required)') {
										echo '<span class="property-filter filter-cat" data-ptype-id="'. $term->term_id .'">' . $term->name . '</span>';
										}
									}
									
								}
							?>
						</p>
					</div>
					<div class="filter-categories">
						<p class="h4 filter--title">area - </p>
						<p class="filters">
							<span class="area-filter filter-cat selected is-default" data-atype-id="-1">All areas</span>
							<?php
								if( $terms = get_terms( 
									array( 'taxonomy' => 'area-type', 'orderby' => 'name' )
								) ) { 
									foreach ( $terms as $term ) {
										if($term->name !== 'All Areas (required)') {
										echo '<span class="area-filter filter-cat" data-atype-id="'. $term->term_id .'">' . $term->name . '</span>';
										}
									}
									
								}
							?>
<!-- 							<span class="area-filter filter-cat" data-atype-id="1">seaham</span>
							<span class="area-filter filter-cat" data-atype-id="2">murton</span>
							<span class="area-filter filter-cat" data-atype-id="3">consett</span>
							<span class="area-filter filter-cat" data-atype-id="4">chester-le-street</span>
							<span class="area-filter filter-cat" data-atype-id="5">durham city</span>
							<span class="area-filter filter-cat" data-atype-id="6">peterlee</span>
							<span class="area-filter filter-cat" data-atype-id="7">brandon</span>
							<span class="area-filter filter-cat" data-atype-id="8">bowburn</span>
							<span class="area-filter filter-cat" data-atype-id="9">chilton</span> -->
						</p>
					</div>
				</section>
			</div>
		</header>



		
		



			<button>Apply filter</button>
			<input type="hidden" name="action" value="myfilter">

			<section id="response">
				
				<?php 
					/* we need this here, so we display all properties before they're replaced with the filter */

					$s_array = array( 
						'posts_per_page' => -1,
						'post_type' => 'property',
					);
					$cpt_query = array_merge( $s_array, (array) $wp->query_vars );

					// The Query
					$the_query = new WP_Query( $cpt_query );

					// The Loop
					if ( $the_query->have_posts() ) {

						echo '<div class="row expanded devs--row">';

							while ( $the_query->have_posts() ) {
								$the_query->the_post();
					
								get_template_part( 'template-parts/property-excerpt' );

							} //endwhile
							wp_reset_postdata();

						echo '</div>';

					} else {
					
					get_template_part( 'template-parts/content', 'none' );

				 } //End have_posts() check.

				?>
			</section><!-- // #reponse -->

		</div><!-- // row -->

	</form>
</main>


<?php get_footer();