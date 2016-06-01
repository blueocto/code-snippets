<!-- for your sidebar.php related file -->

<!-- retrieve all posts in Case Studies -->
<div class="widget widget_cases" id="case-categories">
	<h3>Categories</h3>
	<ul>
		<?php
			//for a given post type, return all
			$post_type = 'cases';
			$tax = 'case-studies';
			$tax_terms = get_terms($tax);
			if ($tax_terms) {
				foreach ($tax_terms as $tax_term) {       
				//var_dump($tax_term);
				echo '<li><a href="/faqs/category/'.$tax_term->slug.'" title="'.$tax_term->name.'">'.$tax_term->name.'</li>';
			} // END foreach $tax_terms
		} // END if $tax_terms ?>
	</ul>
</div><!-- ///widget widget_cases -->